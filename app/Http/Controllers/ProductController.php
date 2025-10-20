<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $category_id = $request->get('category_id');
        
        $products = Product::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('products.name', 'like', '%' . $search . '%')
                        ->orWhere('products.description', 'like', '%' . $search . '%');
                });
            })
            ->when($category_id, function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $categories = Category::all();

        return view('products.index', compact('products', 'categories', 'search', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'image'=> 'required|mimes:webp,jpg,bmp,png',
            'category_id' => 'required'
        ]);

        $product = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $fileName = time() . '_' . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();

            // Korrigjim: përdor $fileName në vend të $filename
            $image->storeAs('products', $fileName, 'public');

            // Korrigjim: 'image' në vend të 'iamge'
            $product['image'] = $fileName;
        }

        Product::create($product);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Korrigjim: findOrFail në vend të faindOrFail
        return view('products.edit', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all() // Duhet të kalojmë edhe kategoritë për editim
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'image'=> 'sometimes|mimes:webp,jpg,bmp,png', // Ndryshuar në 'sometimes' nëse imazhi nuk është gjithmonë i nevojshëm për update
            'category_id' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $data = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $fileName = time() . '_' . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('products', $fileName, 'public');

            $data['image'] = $fileName;
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}