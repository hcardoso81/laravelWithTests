<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('products.index');
    }

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product, Request $request): RedirectResponse
    {
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('products.index');
    }
}
