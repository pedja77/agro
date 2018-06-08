<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class SaleController extends Controller
{
    public function setSale() {

        $categories = Category::getCategories();

        return view('sale', compact('categories'));
    }

}
