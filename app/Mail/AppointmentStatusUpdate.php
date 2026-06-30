<?php

namespace App\Mail;

use App\Models\ClinicAppointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $oldStatus;

    /**
     * Create a new message instance.
     */
    public function __construct(ClinicAppointment $appointment, $oldStatus)
    {
        $this->appointment = $appointment;
        $this->oldStatus = $oldStatus;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $statusMessages = [
            'pending' => 'Your appointment is pending confirmation',
            'confirmed' => 'Your appointment has been confirmed',
            'completed' => 'Your appointment has been completed',
            'cancelled' => 'Your appointment has been cancelled',
        ];

        $subject = 'Appointment Status Update - Metro Health Hospital';
        
        return $this->subject($subject)
                    ->view('emails.appointment-status-update')
                    ->with([
                        'patientName' => $this->appointment->full_name,
                        'serviceName' => $this->appointment->service_name,
                        'appointmentDay' => $this->appointment->appointment_day,
                        'appointmentTime' => $this->appointment->appointment_time,
                        'serviceFee' => $this->appointment->service_fee,
                        'oldStatus' => ucfirst($this->oldStatus),
                        'newStatus' => ucfirst($this->appointment->status ?? 'pending'),
                        'statusMessage' => $statusMessages[$this->appointment->status ?? 'pending'] ?? 'Status updated',
                    ]);
    }
}
