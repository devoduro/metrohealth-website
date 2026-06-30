<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'address',
        'service_name',
        'appointment_day',
        'appointment_time',
        'service_fee',
        'status',
        'notes',
    ];

    protected $casts = [
        'service_fee' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get service schedules configuration
     */
    public static function getServiceSchedules()
    {
        return [
            'Obstetrics & Gynaecology' => [
                'days' => ['Wednesday', 'Friday', 'Saturday'],
                'time_range' => '8:00 AM - 2:00 PM',
                'slots' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM'],
                'fee' => 150.00,
            ],
            'Pediatric Clinic' => [
                'days' => ['Saturday'],
                'time_range' => '8:00 AM - 2:00 PM',
                'slots' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM'],
                'fee' => 120.00,
            ],
            'Ear, Nose & Throat (ENT)' => [
                'days' => ['Wednesday'],
                'time_range' => '4:00 PM - 6:00 PM',
                'slots' => ['4:00 PM', '5:00 PM', '6:00 PM'],
                'fee' => 100.00,
            ],
            'Urology' => [
                'days' => ['By Appointment'],
                'time_range' => 'Contact: +233 24 571 7681',
                'slots' => ['Morning', 'Afternoon', 'Evening'],
                'fee' => 200.00,
            ],
            'Geriatric / Elderly Care' => [
                'days' => ['Tuesday', 'Thursday'],
                'time_range' => 'Tuesday: 2:00 PM - 5:00 PM, Thursday: 8:00 AM - 4:00 PM',
                'slots' => [
                    'Tuesday' => ['2:00 PM', '3:00 PM', '4:00 PM'],
                    'Thursday' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM'],
                ],
                'fee' => 180.00,
            ],
            'Orthopedics' => [
                'days' => ['Tuesday'],
                'time_range' => '2:00 PM - 8:00 PM',
                'slots' => ['2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM'],
                'fee' => 250.00,
            ],
        ];
    }

    /**
     * Get time slots for a specific service and day
     */
    public static function getTimeSlotsForService($serviceName, $day = null)
    {
        $schedules = self::getServiceSchedules();
        
        if (!isset($schedules[$serviceName])) {
            return [];
        }

        $schedule = $schedules[$serviceName];
        
        // Handle Geriatric care with different slots per day
        if ($serviceName === 'Geriatric / Elderly Care' && $day) {
            return $schedule['slots'][$day] ?? [];
        }
        
        return is_array($schedule['slots']) && !isset($schedule['slots']['Tuesday']) 
            ? $schedule['slots'] 
            : [];
    }
}
