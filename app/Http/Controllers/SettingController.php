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
        $contacts = Setting::where('name', 'kontak')->get();
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
}
