<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    public function index()
    {
        $settings = CompanySetting::all()->pluck('value', 'key');
        return view('dashboard.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        foreach ($data as $key => $value) {
            CompanySetting::set($key, $value);
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}
