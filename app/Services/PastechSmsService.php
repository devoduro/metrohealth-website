<?php

namespace App\Services;

use App\Models\SmsLog;
use Illuminate\Support\Facades\Log;

class PastechSmsService
{
    /**
     * Send an SMS via the Pastech gateway and log the attempt.
     */
    public function send(string $phone, string $message, ?int $patientId = null, string $type = 'confirmation'): array
    {
        $normalizedPhone = $this->normalizePhone($phone);

        $params = [
            'key' => env('PASTECH_SMS_API_KEY'),
            'sender_id' => env('PASTECH_SMS_SENDER_ID'),
            'to' => $normalizedPhone,
            'msg' => $message,
        ];

        $rawResponse = $this->get(env('PASTECH_SMS_ENDPOINT'), $params);

        $decoded = json_decode($rawResponse['body'] ?? '', true);
        $success = $rawResponse['error'] === null
            && is_array($decoded)
            && in_array($decoded['code'] ?? null, [1000, '1000'], true);

        SmsLog::create([
            'patient_id' => $patientId,
            'phone' => $normalizedPhone,
            'message' => $message,
            'type' => $type,
            'status' => $success ? 'sent' : 'failed',
            'response' => $rawResponse['error'] ?? ($rawResponse['body'] ?? null),
        ]);

        if (!$success) {
            Log::error('Pastech SMS send failed', ['phone' => $normalizedPhone, 'response' => $rawResponse]);
        }

        return ['success' => $success, 'response' => $rawResponse['body'] ?? $rawResponse['error']];
    }

    /**
     * Get the current SMS account balance (raw numeric string, per gateway response).
     */
    public function getBalance(): ?string
    {
        $rawResponse = $this->get(env('PASTECH_SMS_BALANCE_ENDPOINT'), [
            'key' => env('PASTECH_SMS_API_KEY'),
        ]);

        if ($rawResponse['error'] !== null) {
            return null;
        }

        return trim($rawResponse['body']);
    }

    /**
     * Normalize a Ghanaian phone number to the gateway's expected 233XXXXXXXXX format.
     */
    public static function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/[^0-9]/', '', $phone);

        if (str_starts_with($digits, '0')) {
            $digits = '233' . substr($digits, 1);
        } elseif (!str_starts_with($digits, '233')) {
            $digits = '233' . $digits;
        }

        return $digits;
    }

    /**
     * Perform a GET request via cURL (no Guzzle dependency installed in this app).
     */
    private function get(string $url, array $params): array
    {
        $ch = curl_init($url . '?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        $body = curl_exec($ch);
        $error = curl_errno($ch) ? curl_error($ch) : null;
        curl_close($ch);

        return ['body' => $body, 'error' => $error];
    }
}
