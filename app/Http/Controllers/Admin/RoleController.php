<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('users')->orderBy('name')->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRole($request);

        $validated['slug'] = Str::slug($validated['name'], '_');
        $validated['permissions'] = $request->input('permissions', []);
        $validated['is_system'] = false;

        Role::create($validated);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully!');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $this->validateRole($request, $role);
        $validated['permissions'] = $request->input('permissions', []);

        // A system role's slug stays fixed — every isDoctor()/isAdmin()-style
        // check and the seeded dashboard scopes depend on it.
        if ($role->is_system) {
            unset($validated['dashboard_scope']);
        }

        $role->update($validated);

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully!');
    }

    public function destroy(Role $role)
    {
        if ($role->is_system) {
            return redirect()->route('admin.roles.index')->with('error', 'Built-in roles can\'t be deleted.');
        }

        if ($role->users()->exists()) {
            return redirect()->route('admin.roles.index')->with('error', 'Reassign every staff member with this role before deleting it.');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully!');
    }

    private function validateRole(Request $request, ?Role $role = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->ignore($role?->id)],
            'dashboard_scope' => ['required', Rule::in(['full', 'clinical', 'frontdesk'])],
        ]);
    }
}
