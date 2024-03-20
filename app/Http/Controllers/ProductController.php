<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

// Model
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // Get Data Product
        $product = Product::with('galleries','category')->get();

        return view('pages.dashboard',compact('product'));
    }

    public function showProduct ($id){
        // find data by product id
        $product = Product::find($id);

        // get data similar product by categories_id
        $similarProduct = Product::with('galleries', 'category')->where('categories_id',$product->categories_id)->get();

        return view('pages.detail',compact('product','similarProduct'));
    }
}
