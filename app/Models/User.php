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
     * Check if user is clinical staff (doctor or nurse) — scoped to their own service(s)
     */
    public function isClinicalStaff()
    {
        return in_array($this->role, ['doctor', 'nurse']);
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
     * Check if user has a specific permission
     */
    public function hasPermission($permission)
    {
        // Admin has all permissions
        if ($this->isAdmin()) {
            return true;
        }

        // Check if permission exists in user's permissions array
        $permissions = $this->permissions ?? [];
        return in_array($permission, $permissions);
    }

    /**
     * Get all available permissions
     */
    public static function getAvailablePermissions()
    {
        return [
            'manage_blog' => 'Manage Blog Posts',
            'manage_sermons' => 'Manage Sermons',
            'manage_videos' => 'Manage Videos',
            'manage_gallery' => 'Manage Gallery',
            'manage_ministries' => 'Manage Ministries',
            'manage_leadership' => 'Manage Leadership',
            'manage_events' => 'Manage Events',
            'manage_prayers' => 'Manage Prayer Requests',
            'manage_contact' => 'Manage Contact Messages',
            'manage_users' => 'Manage Users',
            'view_logs' => 'View Activity Logs',
        ];
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
