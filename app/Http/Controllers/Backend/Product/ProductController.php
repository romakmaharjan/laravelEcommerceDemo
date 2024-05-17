<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $pagePath = "backend.pages.";

    public function index()
    {
        $data['productData'] = Product::all();
        return view($this->pagePath . 'product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categoryData'] = Category::where('parent_id', null)->get();
        $data['brandData'] = Brand::all();
        return view($this->pagePath . 'product.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:products',
            'code' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $validation['color'] = $request->color;
        $validation['weight'] = $request->weight;
        $validation['discount'] = $request->discount;
        $validation['brand_id'] = $request->brand_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('uploads/products/'), $fileName);
            $validation['image'] = "/uploads/products/" . $fileName;
        }

        Product::create($validation);
        return redirect()->route('manage-product.create')->with('success', 'Product created successfully');

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