<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ServicesController extends Controller
{
    public function setServices() {

        $categories = Category::getCategories();

        return view('services', compact('categories'));
    }
}
