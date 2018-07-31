<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    private function getCategories() {

        $categories = Category::getCategories();
        return $categories;
    }

    private function getNewProducts() {

        $newProducts = Product::where('novi_proizvod', '!=', '')->orderBy('SIFRA_PROIZVODA', 'desc')->paginate(20); //take(12)->get();
        return $newProducts;
    }

    public function setHome() {

        $categories = $this->getCategories();
        $newProducts = $this->getNewProducts();

        return view('home', compact(['categories', 'newProducts']));
    }

}
