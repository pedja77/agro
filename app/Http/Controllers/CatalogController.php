<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CatalogController extends Controller
{
    public function setCatalog() {

        $categories = Category::getCategories();

        return view('catalog', compact('categories'));
    }

    public function showProduct($id) {

        $categories = Category::getCategories();
        $product = Product::findOrFail($id);

        return view('catalog-product', compact(['product', 'categories']));
    }
}
