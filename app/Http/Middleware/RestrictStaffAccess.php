<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictStaffAccess
{
    /**
     * Routes a doctor account is allowed to reach. Doctors are scoped to their
     * own service only — anything else in /admin/* redirects them back to
     * their own dashboard. (Nurses are NOT locked down this way — see below.)
     */
    private const DOCTOR_ALLOWED_ROUTES = [
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
     * Route name prefixes front-desk staff (receptionist/nurse) may not access —
     * purely administrative or configuration sections, not day-to-day duties.
     */
    private const RESTRICTED_SECTION_PREFIXES = [
        'admin.doctors.',
        'admin.clinic-services.',
        'admin.sms.',
        'admin.emails.',
        'admin.reviews.',
        'admin.blog.',
        'admin.contact-messages.',
        'admin.staff.',
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

        // Staff account management is sensitive — true admins only, regardless of role.
        if ($routeName && str_starts_with($routeName, 'admin.staff.') && !$user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('error', 'Unauthorized. Admin access required.');
        }

        if ($user->isDoctor()) {
            if (!in_array($routeName, self::DOCTOR_ALLOWED_ROUTES, true)) {
                return redirect()->route('admin.dashboard')->with('info', 'Please use your dashboard.');
            }

            return $next($request);
        }

        if ($user->isFrontDeskStaff() && $routeName) {
            foreach (self::RESTRICTED_SECTION_PREFIXES as $prefix) {
                if (str_starts_with($routeName, $prefix)) {
                    return redirect()->route('admin.dashboard')->with('error', 'Not authorized for this section.');
                }
            }
        }

        return $next($request);
    }
}
