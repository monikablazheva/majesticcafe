<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Subcategory, Item};

class MenuController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesWithSubcat = Category::with(['subcategories'])->get();
        return view('menu.index', compact('categoriesWithSubcat'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
