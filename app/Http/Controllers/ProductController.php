<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('businesses-organizations');
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedProducts = Product::active()
            ->where('id', '!=', $product->id)
            ->ordered()
            ->limit(4)
            ->get();
        
        return view('shop.show-redesign', compact('product', 'relatedProducts'));
    }
}
