<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'dashboard_scope',
        'permissions',
        'is_system',
    ];

    protected $casts = [
        'permissions' => 'array',
        'is_system' => 'boolean',
    ];

    /**
     * Users currently holding this role (matched on the users.role slug string).
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role', 'slug');
    }

    /**
     * The permission keys an admin can grant to a role, and the section each
     * one unlocks for 'frontdesk'/'clinical' scoped roles (ignored for 'full').
     */
    public static function availablePermissions(): array
    {
        return [
            'manage_doctors' => 'Manage Doctors',
            'manage_clinic_services' => 'Manage Clinic Services',
            'manage_sms' => 'Manage Bulk SMS',
            'manage_emails' => 'Manage Email Campaigns',
            'manage_reviews' => 'Manage Reviews',
            'manage_blog' => 'Manage News & Articles',
            'manage_contact_messages' => 'Manage Contact Messages',
        ];
    }

    public static function dashboardScopes(): array
    {
        return [
            'full' => 'Full Access — sees everything an admin does (except Staff Accounts/Roles)',
            'clinical' => 'Clinical — locked to their own mini-dashboard, scoped to assigned clinic service(s)',
            'frontdesk' => 'Front Desk — broad Patients/Appointments access, admin sections opt-in via permissions',
        ];
    }
}
