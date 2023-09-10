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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CostCategory $costCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CostCategory $costCategory)
    {
        //
    }
}
