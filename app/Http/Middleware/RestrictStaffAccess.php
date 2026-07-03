<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictStaffAccess
{
    /**
     * Routes a clinical staff (doctor/nurse) account is allowed to reach.
     * Anything else in /admin/* redirects them back to their own dashboard.
     */
    private const CLINICAL_STAFF_ALLOWED_ROUTES = [
        'admin.dashboard',
        'admin.logout',
        'admin.staff-dashboard',
        'admin.staff-dashboard.quick-add',
    ];

    /**
     * Route name prefixes a receptionist may not access — purely administrative
     * or configuration sections, not front-desk duties.
     */
    private const RECEPTIONIST_BLOCKED_PREFIXES = [
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

        if ($user->isClinicalStaff()) {
            if (!in_array($routeName, self::CLINICAL_STAFF_ALLOWED_ROUTES, true)) {
                return redirect()->route('admin.dashboard')->with('info', 'Please use your dashboard.');
            }

            return $next($request);
        }

        if ($user->isReceptionist() && $routeName) {
            foreach (self::RECEPTIONIST_BLOCKED_PREFIXES as $prefix) {
                if (str_starts_with($routeName, $prefix)) {
                    return redirect()->route('admin.dashboard')->with('error', 'Not authorized for this section.');
                }
            }
        }

        return $next($request);
    }
}
