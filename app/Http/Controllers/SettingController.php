<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    //setting contact
    public function contact()
    {
        $contacts = Setting::where('type', 'kontak')->get();
        return view('admin.setting.contact.index', compact('contacts'));
    }
    public function contactedit(Request $request)
    {
        $id = $request->id;
        $contact = Setting::find($id);
        return view('admin.setting.contact.edit', compact('contact'));
    }
    public function contactstore(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        Setting::where('id', $id)->update($validated);
        return redirect()->route('setting.contact');
    }

    // setting landing page
    public function landset()
    {
        $settings = Setting::whereIn('type', ['tagline', 'jadwal', 'early', 'onoff', 'countdown'])
            ->get();
        return view('admin.setting.landing.index', compact('settings'));
    }
    public function landsetedit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.setting.landing.edit', compact('setting'));
    }
    public function landsetupdate(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $validated = $request->validate([
            'desc' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        $setting->update($validated);

        return redirect()->route('landset.setting')->with('success', 'Setting berhasil diperbarui!');
    }
}
