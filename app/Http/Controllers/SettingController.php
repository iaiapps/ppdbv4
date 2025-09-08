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
    public function contactstore(Request $request, Setting $setting)
    {
        $id = $request->id;
        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'value' => $request->value,
        ];
        Setting::where('id', $id)->update($data);
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
        $setting->update([
            'desc' => $request->desc,
            'value' => $request->value,
        ]);

        return redirect()->route('landset.setting')->with('success', 'Setting berhasil diperbarui!');
    }
}
