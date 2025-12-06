<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        if (!auth()->user() || !auth()->user()->hasPermission('manage_settings')) {
            abort(403, 'Unauthorized');
        }
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        if (!auth()->user() || !auth()->user()->hasPermission('manage_settings')) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'site_name'      => 'nullable|string|max:255',
            'company_name'   => 'nullable|string|max:255',
            'owner_name'     => 'nullable|string|max:255',
            'locations'      => 'nullable|string',
            'logo'           => 'nullable|image|max:2048',
            'favicon'        => 'nullable|mimes:jpeg,png,jpg,gif,ico|max:1024',
            'contact_email'  => 'nullable|email',
            'contact_phone'  => 'nullable|string|max:50',
            'address'        => 'nullable|string|max:500',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        // Handle file uploads
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        } else if ($setting->logo) {
            $validated['logo'] = $setting->logo;
        }

        if ($request->hasFile('favicon') && $request->file('favicon')->isValid()) {
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        } else if ($setting->favicon) {
            $validated['favicon'] = $setting->favicon;
        }

        // Convert locations textarea to array
        if (isset($validated['locations'])) {
            $validated['locations'] = array_filter(array_map('trim', preg_split('/\r?\n/', $validated['locations'])));
        }

        $setting->fill($validated);
        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
