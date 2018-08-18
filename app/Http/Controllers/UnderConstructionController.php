<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UnderConstructionController extends Controller
{
    public function create() {
        return view('construction');
    }

    public function check(Request $request) {

        if ($request->invitation_pass === 'monolith') {
            //dd('pass works');
            \Log::info($_COOKIE);
            Cookie::queue(Cookie::make('invitation', 'You are invited', 1000000));
            return redirect('/home');
        } else {
            return redirect('/under-construction');
        }
    }
}
