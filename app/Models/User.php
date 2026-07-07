<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'profile_picture',
        'password',
        'role',
        'doctor_id',
        'permissions',
        'is_active',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'permissions' => 'array',
        'last_login_at' => 'datetime',
    ];

    /**
     * Mutator to hash password when setting it
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is editor
     */
    public function isEditor()
    {
        return $this->role === 'editor' || $this->isAdmin();
    }

    /**
     * Check if user is a doctor
     */
    public function isDoctor()
    {
        return $this->role === 'doctor';
    }

    /**
     * Check if user is a nurse
     */
    public function isNurse()
    {
        return $this->role === 'nurse';
    }

    /**
     * Check if user is a receptionist
     */
    public function isReceptionist()
    {
        return $this->role === 'receptionist';
    }

    /**
     * Front-desk-style access: full Patients/Appointments across all services,
     * but not the purely administrative sections (Doctors, Clinic Services,
     * Bulk SMS, Email Campaigns, Reviews, Blog, Contact Messages, Staff Accounts)
     * unless the role has been granted the matching permission.
     */
    public function isFrontDeskStaff()
    {
        return $this->dashboardScope() === 'frontdesk';
    }

    /**
     * Clinical staff (doctor, and any admin-created clinical role such as a
     * Physician Assistant or Sonographer) — locked to their own mini-dashboard,
     * scoped to their assigned clinic service(s).
     */
    public function isClinicalStaff()
    {
        return $this->dashboardScope() === 'clinical';
    }

    /**
     * The role record (built-in or admin-created) matching this user's role slug.
     */
    public function roleRecord()
    {
        return $this->belongsTo(Role::class, 'role', 'slug');
    }

    /**
     * 'full' (admin-like, unrestricted), 'clinical' (doctor-like, locked to own
     * dashboard), or 'frontdesk' (nurse/receptionist-like, broad non-admin access).
     * Defaults to 'full' if the role string doesn't match any row in `roles` —
     * matches the historical behavior of unrecognized roles passing through unrestricted.
     */
    public function dashboardScope(): string
    {
        return $this->roleRecord?->dashboard_scope ?? 'full';
    }

    /**
     * Check if user is active
     */
    public function isActive()
    {
        return $this->is_active === true;
    }

    /**
     * Get user's activity logs
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    /**
     * Clinic service(s) this staff member (doctor/nurse) is assigned to.
     */
    public function clinicServices()
    {
        return $this->belongsToMany(ClinicService::class, 'staff_clinic_service');
    }

    /**
     * The public Doctor directory entry linked to this login, if any.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Check if this user's role has been granted a specific permission.
     * Admins (dashboard_scope 'full') always pass.
     */
    public function hasPermission($permission)
    {
        if ($this->dashboardScope() === 'full') {
            return true;
        }

        $permissions = $this->roleRecord?->permissions ?? [];
        return in_array($permission, $permissions);
    }

    /**
     * Get all available permissions a role can be granted.
     */
    public static function getAvailablePermissions()
    {
        return Role::availablePermissions();
    }

    /**
     * Get role badge color
     */
    public function getRoleBadgeColor()
    {
        return match($this->role) {
            'admin' => 'danger',
            'editor' => 'primary',
            'viewer' => 'secondary',
            'doctor' => 'success',
            'nurse' => 'info',
            'receptionist' => 'warning',
            'physician_assistant' => 'success',
            'sonographer' => 'info',
            default => 'secondary',
        };
    }

    /**
     * Record login activity
     */
    public function recordLogin()
    {
        $this->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->ip(),
        ]);

        ActivityLog::log('logged_in', 'User logged in');
    }
}
