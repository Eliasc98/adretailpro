<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'featured' => 'boolean',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Add user_id
        $validated['user_id'] = Auth::id();

        $product = Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
}
