<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;

class CategoryController extends Controller
{



    public function index() {
    //     $categories = Category::where('father', '=', '')
    //                             ->where('base', '=', 'TIP')
    //                             ->where('meny_order', '!=', '')
    //                             ->groupBy('meny_order')
    //                             ->get();
    //   // $categories = $categories->map
    //     //dd($categories);

        $categories = Category::getCategories();
        //dd($categories);
        return view('categories', compact('categories'));
    }
}
