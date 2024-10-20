<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Models\{Item, Subcategory, Quantity_type};
use Illuminate\Http\Request;
use App\Services\{FileService, SearchService};

class ItemController extends Controller
{
    protected FileService $fileService;
    protected SearchService $searchService;

    public function __construct()
    {
        $this->middleware('auth');        
        $this->fileService = new FileService();
        $this->searchService = new SearchService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $quantity_types = Quantity_type::all();
        return view('item.create', compact('subcategories', 'quantity_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $input['image'] =  'images/' . $imageName;
        }

        Item::create($input);

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('item.show', compact(('item')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $subcategories = Subcategory::all();
        $quantity_types = Quantity_type::all();
        return view('item.edit', compact('item', 'subcategories', 'quantity_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreItemRequest $request, Item $item)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) 
        {
            //delete old image
            if ($item->image)
            {
                $filePath = public_path($item->image);
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

        if ($request->has('delete_photo') && $item->image) {
            //delete old image
            if ($item->image)
            {
                $filePath = public_path($item->image);
                $this->fileService->deleteFileFromPublicStorage($filePath);
            }
            
            // Set the photo path in the database to null or remove the path
            $input['image'] = null;
        }

        $item->update($input);

        return to_route('item.index')->with('message', 'Item was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if ($item->image) {
            $filePath = public_path($item->image);
            $this->fileService->deleteFileFromPublicStorage($filePath);
        }

        $item->delete();
        return to_route('item.index')->with('message', 'Item was deleted');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $items = $this->searchService->search(new Item(), $searchTerm);

        return view('item.index', compact('items'));
    }
}
