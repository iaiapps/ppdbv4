<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Timeline;
use App\Models\CostCategory;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $landing = Setting::whereIn('type', ['tagline', 'jadwal', 'early', 'onoff', 'countdown', 'landing'])
            ->get()
            ->keyBy('name');
        $contacts = Setting::where('type', 'kontak')->get();
        $pelayanans = Setting::where('type', 'pelayanan')->get();
        $timelines = Timeline::all();
        $costcats = CostCategory::all();

        return view('admin.setting.index', compact('landing', 'contacts', 'pelayanans', 'timelines', 'costcats'));
    }

    // inline update setting
    public function updateInline(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:settings,id',
            'value' => 'nullable|string',
        ]);

        Setting::where('id', $request->id)->update(['value' => $request->value]);

        return response()->json(['success' => true]);
    }

    // toggle on/off
    public function toggleOnOff(Request $request)
    {
        $setting = Setting::where('name', 'onoff')->first();
        if ($setting) {
            $setting->update(['value' => $request->value]);
        }
        return response()->json(['success' => true]);
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

    // Inline update contact
    public function updateContact(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:settings,id',
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        Setting::where('id', $request->id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'value' => $request->value,
        ]);

        return response()->json(['success' => true]);
    }

    // Delete contact
    public function deleteContact(Request $request)
    {
        $request->validate(['id' => 'required|exists:settings,id']);
        Setting::where('id', $request->id)->delete();
        return response()->json(['success' => true]);
    }

    // Add contact
    public function addContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        Setting::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'value' => $request->value,
            'type' => 'kontak',
        ]);

        return response()->json(['success' => true]);
    }

    // Inline update pelayanan
    public function updatePelayanan(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:settings,id',
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        Setting::where('id', $request->id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'value' => $request->value,
        ]);

        return response()->json(['success' => true]);
    }

    // Delete pelayanan
    public function deletePelayanan(Request $request)
    {
        $request->validate(['id' => 'required|exists:settings,id']);
        Setting::where('id', $request->id)->delete();
        return response()->json(['success' => true]);
    }

    // Add pelayanan
    public function addPelayanan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        Setting::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'value' => $request->value,
            'type' => 'pelayanan',
        ]);

        return response()->json(['success' => true]);
    }
}
