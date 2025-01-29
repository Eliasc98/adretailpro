<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
