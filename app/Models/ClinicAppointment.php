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
            'General Practice' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'time_range' => '8:00 AM - 5:00 PM',
                'slots' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM'],
                'fee' => 100.00,
            ],
            'General Surgery' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'time_range' => '8:00 AM - 4:00 PM',
                'slots' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '1:00 PM', '2:00 PM', '3:00 PM'],
                'fee' => 200.00,
            ],
            'Obstetrics & Gynaecology' => [
                'days' => ['Wednesday', 'Friday', 'Saturday'],
                'time_range' => '8:00 AM - 2:00 PM',
                'slots' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM'],
                'fee' => 150.00,
            ],
            'Geriatric Care' => [
                'days' => ['Tuesday', 'Thursday'],
                'time_range' => 'Tuesday: 2:00 PM - 5:00 PM, Thursday: 8:00 AM - 4:00 PM',
                'slots' => [
                    'Tuesday' => ['2:00 PM', '3:00 PM', '4:00 PM'],
                    'Thursday' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM'],
                ],
                'fee' => 180.00,
            ],
            'Paediatrics' => [
                'days' => ['Saturday'],
                'time_range' => '8:00 AM - 2:00 PM',
                'slots' => ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM'],
                'fee' => 120.00,
            ],
            'Urology' => [
                'days' => ['By Appointment'],
                'time_range' => 'Contact: +233 24 571 7681',
                'slots' => ['Morning', 'Afternoon', 'Evening'],
                'fee' => 200.00,
            ],
            'Orthopaedic' => [
                'days' => ['Tuesday'],
                'time_range' => '2:00 PM - 8:00 PM',
                'slots' => ['2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM'],
                'fee' => 250.00,
            ],
            'ENT Care' => [
                'days' => ['Wednesday'],
                'time_range' => '4:00 PM - 6:00 PM',
                'slots' => ['4:00 PM', '5:00 PM', '6:00 PM'],
                'fee' => 100.00,
            ],
            'Eye Care' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'time_range' => '9:00 AM - 4:00 PM',
                'slots' => ['9:00 AM', '10:00 AM', '11:00 AM', '1:00 PM', '2:00 PM', '3:00 PM'],
                'fee' => 150.00,
            ],
            'Plastic Surgery' => [
                'days' => ['By Appointment'],
                'time_range' => 'Contact: +233 24 185 0091',
                'slots' => ['Morning', 'Afternoon', 'Evening'],
                'fee' => 300.00,
            ],
            'Pharmacy' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'time_range' => '8:00 AM - 8:00 PM',
                'slots' => ['Morning', 'Afternoon', 'Evening'],
                'fee' => 0.00,
            ],
            'General Lab' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'time_range' => '7:00 AM - 5:00 PM',
                'slots' => ['Morning', 'Afternoon', 'Evening'],
                'fee' => 80.00,
            ],
            'Physician\'s Clinic' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'time_range' => '9:00 AM - 4:00 PM',
                'slots' => ['9:00 AM', '10:00 AM', '11:00 AM', '1:00 PM', '2:00 PM', '3:00 PM'],
                'fee' => 200.00,
            ],
            'Dietetics' => [
                'days' => ['By Appointment'],
                'time_range' => 'Contact: +233 24 185 0091',
                'slots' => ['Morning', 'Afternoon', 'Evening'],
                'fee' => 120.00,
            ],
            'Endoscopy' => [
                'days' => ['By Appointment'],
                'time_range' => 'Contact: +233 24 185 0091',
                'slots' => ['Morning', 'Afternoon'],
                'fee' => 350.00,
            ],
            'Radiology & Medical Imaging' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'time_range' => '8:00 AM - 6:00 PM',
                'slots' => ['Morning', 'Afternoon', 'Evening'],
                'fee' => 250.00,
            ],
            'Ambulance Service' => [
                'days' => ['Any Day'],
                'time_range' => '24 Hours — Call: +233 24 185 0091',
                'slots' => ['Anytime'],
                'fee' => 0.00,
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

        // Handle Geriatric Care, whose slots differ per day.
        if ($serviceName === 'Geriatric Care' && $day) {
            return $schedule['slots'][$day] ?? [];
        }

        return is_array($schedule['slots']) && !isset($schedule['slots']['Tuesday'])
            ? $schedule['slots']
            : [];
    }
}
