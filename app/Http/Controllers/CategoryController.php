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

        //$categories = Category::getCategories();
        //dd($categories);

         $categories = Category::where('BASE', 'TIP')
                            ->distinct('MENY_ORDER')
                            ->where('BASE', 'TIP')
                            ->where('FILE','!=', 'NULL')
                            ->where('FILE','!=', '')
                            ->where('FATHER', '')
                            ->orderByRaw('MENY_ORDER * 1 ASC')
                            ->get();
        //dd($categories[0]);
        $categories = $categories->map(function($item, $key) {
            $item["NAME"] = mb_convert_encoding($item['NAME'],'CP1252','UTF-8');
            return $item;
        });
        return response()->json(compact('categories')); //view('categories', compact('categories'));
    }
}
