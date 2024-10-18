<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubcategoryRequest;
use App\Models\{Subcategory, Category};
use Illuminate\Http\Request;
use App\Services\{FileService, SearchService};

class SubcategoryController extends Controller
{
    protected FileService $fileService;
    protected SearchService $searchService;

    public function __construct()
    {
        //$this->middleware('auth');        
        $this->fileService = new FileService();
        $this->searchService = new SearchService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::paginate(10);
        return view('subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $input['image'] =  'images/' . $imageName;
        }

        Subcategory::create($input);

        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        return view('subcategory.show', compact(('subcategory')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //validate

        $categories = Category::all();
        return view('subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubcategoryRequest $request, Subcategory $subcategory)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) 
        {
            //delete old image
            if ($subcategory->image)
            {
                $filePath = public_path($subcategory->image);
                $this->fileService->deleteFileFromPublicStorage($filePath);
            }

            //set new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $input['image'] =  'images/' . $imageName;

        } 
        else 
        {
            unset($input['image']);
        }

        if ($request->has('delete_photo') && $subcategory->image) {
            //delete old image
            if ($subcategory->image)
            {
                $filePath = public_path($subcategory->image);
                $this->fileService->deleteFileFromPublicStorage($filePath);
            }
            
            // Set the photo path in the database to null or remove the path
            $input['image'] = null;
        }

        $subcategory->update($input);

        return to_route('subcategory.index')->with('message', 'Subcategory was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        if ($subcategory->image) {
            $filePath = public_path($subcategory->image);
            $this->fileService->deleteFileFromPublicStorage($filePath);
        }

        $subcategory->delete();
        return to_route('subcategory.index')->with('message', 'Subcategory was deleted');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $subcategories = $this->searchService->search(new Subcategory(), $searchTerm);

        return view('subcategory.index', compact('subcategories'));
    }
}
