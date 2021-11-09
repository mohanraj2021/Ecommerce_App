<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

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
            'cost_price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $request->file('image')->store('uploads', 'public');
        $product = new Product();

        $product->product_name = $request->name;
        $product->cost_price = (int)$request->cost_price;
        $product->selling_price = (int)$request->selling_price;
        $product->file_path = $request->file('image')->hashName();
        
        $product->save();
        return redirect(route('admin.dashboard'));        
    }
}
