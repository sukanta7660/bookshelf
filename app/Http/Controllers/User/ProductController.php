<?php

namespace App\Http\Controllers\User;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $product_cat = ProductCategory::orderBy('categoryID','ASC')->get();
        return view('user.product')->with(['product_cat'=>$product_cat]);
    }
    public function product_cat($id){
        $table = Product::where('status','accepted')->where('categoryID',$id)->get();
        return response()->json($table);
    }
    public function all_product(){
        $table = Product::where('status','accepted')->orderBy('title', 'ASC')->get();
        return response()->json($table);
    }
    public function itemSearch(Request $request){
        $search = $request->search;
        $table = Product::orderBy('title', 'ASC')->where('status','accepted')->search($search)->get();
        return response()->json($table);
    }
}
