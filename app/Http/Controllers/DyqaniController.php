<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DyqaniController extends Controller
{
    public function index(Request $request)
    {
        // Merr parametrat e search dhe filter
        $search = $request->get('search');
        $category_id = $request->get('category_id');
        
        // Query bazë për produktet
        $productsQuery = Product::with('category')
            ->where('price', '>', 0); // Sigurohu që produktet kanë çmim pozitiv

        // Search - kërkon në emër dhe përshkrim
        if ($search) {
            $productsQuery->where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // Filter sipas kategorisë
        if ($category_id) {
            $productsQuery->where('category_id', $category_id);
        }

        // Merr produktet me pagination - 20 produkte per faqe
        $products = $productsQuery->orderBy('created_at', 'desc')
                                ->paginate(20);

        // Merr të gjitha kategoritë për dropdown
        $categories = Category::orderBy('name')->get();

        return view('dyqani.index', compact('products', 'categories', 'search', 'category_id'));
    }

    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        
        // Kthe view-n e dyqanit publik per shfaqjen e produktit
        return view('dyqani.show', compact('product'));
    }

    public function kategorite(Request $request)
    {
        $search = $request->get('search');

        $categories = Category::with(['products' => function($query) use ($search) {
            $query->orderBy('created_at', 'desc');

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }
        }])->get();

        $paginated = [];

        foreach ($categories as $category) {
            $products = $category->products;
            $pageName = 'page_' . $category->id;
            $page = request()->query($pageName, 1);
            $perPage = 20;

            $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
                $products->forPage($page, $perPage),
                $products->count(),
                $perPage,
                $page,
                ['pageName' => $pageName]
            );

            $paginated[$category->id] = $paginatedProducts;
        }

        return view('dyqani.kategorite', compact('categories', 'paginated', 'search'));
    }

    public function searchAjax(Request $request)
    {
        $term = $request->get('q');

        $products = Product::with('category')
            ->where('name', 'LIKE', "%{$term}%")
            ->orWhere('description', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get();

        return response()->json($products);
    }

}