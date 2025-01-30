<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category; // Added Category model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(12);
        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->with('category')
            ->get();

        if ($request->wantsJson()) {
            return response()->json($products);
        }

        return view('products.search', compact('products', 'query'));
    }

    public function getFeatured()
    {
        $featuredProducts = Product::where('featured', true)
            ->with('category')
            ->take(6)
            ->get();

        return response()->json($featuredProducts);
    }

    public function getDeals()
    {
        $deals = Product::where('discount', '>', 0)
            ->with('category')
            ->orderBy('discount', 'desc')
            ->take(6)
            ->get();

        return response()->json($deals);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        // Fetch all categories
        $categories = Category::all();

        // If no categories exist, create some default categories
        if ($categories->isEmpty()) {
            $defaultCategories = [
                ['name' => 'Electronics', 'description' => 'Electronic devices and gadgets'],
                ['name' => 'Clothing', 'description' => 'Apparel and fashion items'],
                ['name' => 'Home & Kitchen', 'description' => 'Home appliances and kitchen tools'],
                ['name' => 'Books', 'description' => 'Books and reading materials'],
                ['name' => 'Sports & Outdoors', 'description' => 'Sports equipment and outdoor gear']
            ];

            foreach ($defaultCategories as $categoryData) {
                Category::create($categoryData);
            }

            $categories = Category::all();
        }

        return view('products.create', compact('categories'));
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Display analytics for the specified product.
     */
    public function analytics(Product $product)
    {
        // Fetch product-specific analytics
        $sales = Order::whereHas('items', function($query) use ($product) {
            $query->where('product_id', $product->id);
        })->count();

        $revenue = Order::whereHas('items', function($query) use ($product) {
            $query->where('product_id', $product->id);
        })->sum('total_amount');

        return view('products.analytics', compact('product', 'sales', 'revenue'));
    }
}
