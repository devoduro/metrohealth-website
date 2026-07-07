<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictStaffAccess
{
    /**
     * Routes a 'clinical' scoped account is allowed to reach (doctor, and any
     * admin-created equivalent such as Physician Assistant or Sonographer).
     * They're scoped to their own service only — anything else in /admin/*
     * redirects them back to their own dashboard.
     */
    private const CLINICAL_ALLOWED_ROUTES = [
        'admin.dashboard',
        'admin.logout',
        'admin.staff-dashboard',
        'admin.staff-dashboard.quick-add',
        'admin.profile.edit',
        'admin.profile.update',
        'admin.profile.password',
        'admin.appointments.patient-search',
        'admin.appointments.past',
        'admin.appointments.edit',
        'admin.appointments.update',
    ];

    /**
     * Route name prefixes blocked for 'frontdesk' scoped accounts (nurse,
     * receptionist, or any admin-created equivalent) — purely administrative
     * or configuration sections, not day-to-day duties — unless the role has
     * been explicitly granted the matching permission.
     */
    private const RESTRICTED_SECTION_PERMISSIONS = [
        'admin.doctors.' => 'manage_doctors',
        'admin.clinic-services.' => 'manage_clinic_services',
        'admin.service-categories.' => 'manage_clinic_services',
        'admin.sms.' => 'manage_sms',
        'admin.emails.' => 'manage_emails',
        'admin.reviews.' => 'manage_reviews',
        'admin.blog.' => 'manage_blog',
        'admin.contact-messages.' => 'manage_contact_messages',
    ];

    /**
     * Route name prefixes that are always admin-only, regardless of scope or
     * permission — managing staff accounts and the roles they can hold.
     */
    private const ADMIN_ONLY_PREFIXES = [
        'admin.staff.',
        'admin.roles.',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request);
        }

        $routeName = $request->route()?->getName();

        foreach (self::ADMIN_ONLY_PREFIXES as $prefix) {
            if ($routeName && str_starts_with($routeName, $prefix) && !$user->isAdmin()) {
                return redirect()->route('admin.dashboard')->with('error', 'Unauthorized. Admin access required.');
            }
        }

        $scope = $user->dashboardScope();

        if ($scope === 'clinical') {
            if (!in_array($routeName, self::CLINICAL_ALLOWED_ROUTES, true)) {
                return redirect()->route('admin.dashboard')->with('info', 'Please use your dashboard.');
            }

            return $next($request);
        }

        if ($scope === 'frontdesk' && $routeName) {
            foreach (self::RESTRICTED_SECTION_PERMISSIONS as $prefix => $permission) {
                if (str_starts_with($routeName, $prefix) && !$user->hasPermission($permission)) {
                    return redirect()->route('admin.dashboard')->with('error', 'Not authorized for this section.');
                }
            }
        }

        return $next($request);
    }
}
