<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicService;
use App\Models\Doctor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    /**
     * 'editor' and 'viewer' are left over from this app's original non-hospital
     * template and aren't assignable from the Staff Accounts screen — every
     * other role (built-in or admin-created) is fair game.
     */
    private const EXCLUDED_ROLE_SLUGS = ['editor', 'viewer'];

    public function index()
    {
        $staff = User::with(['clinicServices', 'doctor'])
            ->whereIn('role', $this->assignableRoles()->pluck('slug'))
            ->orderBy('name')
            ->get();

        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        $clinicServices = ClinicService::active()->ordered()->get();
        $doctors = Doctor::active()->orderBy('name')->get();
        $roles = $this->assignableRoles();

        return view('admin.staff.create', compact('clinicServices', 'doctors', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateStaff($request);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => $validated['password'],
            'role' => $validated['role'],
            'doctor_id' => $validated['role'] === 'doctor' ? ($validated['doctor_id'] ?? null) : null,
            'is_active' => $validated['is_active'],
        ]);

        $user->clinicServices()->sync($this->resolveServiceIds($validated));

        return redirect()->route('admin.staff.index')->with('success', 'Staff account created successfully!');
    }

    public function edit(User $staff)
    {
        $clinicServices = ClinicService::active()->ordered()->get();
        $doctors = Doctor::active()->orderBy('name')->get();
        $roles = $this->assignableRoles();
        $staff->load('clinicServices');

        return view('admin.staff.edit', compact('staff', 'clinicServices', 'doctors', 'roles'));
    }

    public function update(Request $request, User $staff)
    {
        $validated = $this->validateStaff($request, $staff);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $staff->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
            'doctor_id' => $validated['role'] === 'doctor' ? ($validated['doctor_id'] ?? null) : null,
            'is_active' => $validated['is_active'],
        ]);

        if (!empty($validated['password'])) {
            $staff->update(['password' => $validated['password']]);
        }

        $staff->clinicServices()->sync($this->resolveServiceIds($validated));

        return redirect()->route('admin.staff.index')->with('success', 'Staff account updated successfully!');
    }

    public function destroy(User $staff)
    {
        if ($staff->id === Auth::id()) {
            return redirect()->route('admin.staff.index')->with('error', 'You cannot delete your own account.');
        }

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff account removed successfully!');
    }

    private function assignableRoles()
    {
        return Role::whereNotIn('slug', self::EXCLUDED_ROLE_SLUGS)->orderBy('name')->get();
    }

    private function validateStaff(Request $request, ?User $staff = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($staff?->id)],
            'phone' => 'nullable|string|max:20',
            'password' => $staff ? 'nullable|string|min:8' : 'required|string|min:8',
            'role' => ['required', Rule::in($this->assignableRoles()->pluck('slug'))],
            'doctor_id' => 'nullable|exists:doctors,id',
            'clinic_service_ids' => 'nullable|array',
            'clinic_service_ids.*' => 'exists:clinic_services,id',
        ]);
    }

    /**
     * Clinical and front-desk scoped roles can each be assigned one or more
     * clinic services; fully-scoped roles (admin-like) get none.
     */
    private function resolveServiceIds(array $validated): array
    {
        $scope = Role::where('slug', $validated['role'])->value('dashboard_scope');

        if (in_array($scope, ['clinical', 'frontdesk'], true)) {
            return $validated['clinic_service_ids'] ?? [];
        }

        return [];
    }
}
