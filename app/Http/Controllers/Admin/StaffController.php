<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicService;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    private const ASSIGNABLE_ROLES = ['admin', 'doctor', 'nurse', 'receptionist'];

    public function index()
    {
        $staff = User::with(['clinicServices', 'doctor'])
            ->whereIn('role', self::ASSIGNABLE_ROLES)
            ->orderBy('name')
            ->get();

        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        $clinicServices = ClinicService::active()->ordered()->get();
        $doctors = Doctor::active()->orderBy('name')->get();

        return view('admin.staff.create', compact('clinicServices', 'doctors'));
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
        $staff->load('clinicServices');

        return view('admin.staff.edit', compact('staff', 'clinicServices', 'doctors'));
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

    private function validateStaff(Request $request, ?User $staff = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($staff?->id)],
            'phone' => 'nullable|string|max:20',
            'password' => $staff ? 'nullable|string|min:8' : 'required|string|min:8',
            'role' => ['required', Rule::in(self::ASSIGNABLE_ROLES)],
            'doctor_id' => 'nullable|exists:doctors,id',
            'clinic_service_ids' => 'nullable|array',
            'clinic_service_ids.*' => 'exists:clinic_services,id',
        ]);
    }

    /**
     * Doctors and nurses can each be assigned one or more clinic services
     * (clinic_service_ids[]); admin/receptionist get none.
     */
    private function resolveServiceIds(array $validated): array
    {
        if (in_array($validated['role'], ['doctor', 'nurse'])) {
            return $validated['clinic_service_ids'] ?? [];
        }

        return [];
    }
}
