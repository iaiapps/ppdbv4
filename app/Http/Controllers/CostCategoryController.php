<?php

namespace App\Http\Controllers;

use App\Models\CostCategory;
use Illuminate\Http\Request;

class CostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costcats = CostCategory::all();
        return view('admin.setting.costcat.index', compact('costcats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.costcat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'gedung' => 'required|integer|min:0',
            'perpustakaan' => 'required|integer|min:0',
            'kegiatan' => 'required|integer|min:0',
            'bukumedia' => 'required|integer|min:0',
            'seragam' => 'required|integer|min:0',
            'jilbab' => 'required|integer|min:0',
            'ipp' => 'required|integer|min:0',
            'total' => 'required|integer|min:0',
        ]);

        CostCategory::create($validated);
        return redirect()->route('costCategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CostCategory $costCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CostCategory $costCategory)
    {
        return view('admin.setting.costcat.edit', compact('costCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CostCategory $costCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'gedung' => 'required|integer|min:0',
            'perpustakaan' => 'required|integer|min:0',
            'kegiatan' => 'required|integer|min:0',
            'bukumedia' => 'required|integer|min:0',
            'seragam' => 'required|integer|min:0',
            'jilbab' => 'required|integer|min:0',
            'ipp' => 'required|integer|min:0',
            'total' => 'required|integer|min:0',
        ]);

        $costCategory->update($validated);
        return redirect()->route('costCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CostCategory $costCategory)
    {
        $costCategory->delete();
        return redirect()->route('costCategory.index');
    }
}
