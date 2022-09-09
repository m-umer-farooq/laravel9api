<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show()
    {
            $products = Product::all();
            return $products;
    }

    public function create(Request $request)
    {
        $request->validate([
                        'name' => 'required',
                        'slug' => 'required',
                        'description' => 'required',
                        'price' => 'required',
                     ]);

       return  Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            ]);
    }


    public function find(Request $request)
    {
         return Product::find($request->id);
    }


    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->update($request->all());
        return $product;

    }

    public function delete(Request $request)
    {
        return Product::destroy($request->id);
    }

    public function search(Request $request)
    {

        return Product::where('name', 'like', '%'.$request->name.'%')->get();
    }
}
