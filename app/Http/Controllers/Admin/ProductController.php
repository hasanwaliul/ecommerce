<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.product.index', compact('categories'));
    }

    public function productDataAdd(Request $request){
        dd($request->all());
    }
}
