<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CatalogController extends Controller
{
    public function setCatalog() {

        $categories = Category::getCategories();

        return view('catalog', compact('categories'));
    }
}
