<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $Product_validate = $request->validate([
            'name' => 'required | max:255',
            'selling_price' => 'required',
            'cost_price' => 'required'
        ]);

        $product = new Product();

        $product->product_name = $request->name;
        $product->cost_price = (int)$request->cost_price;
        $product->selling_price = (int)$request->selling_price;

        $product->save();

        return redirect(route('admin.dashboard'));
    }
}
