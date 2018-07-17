<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{

    public function __construct() {

        //$this->middleware('guest', ['only']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ime_choveka' => 'required|string|max:30',
            'prezime_choveka' => 'required|string|max:30',
            'emil_choveka' => 'required|string|email|max:150|unique:customers_table',
            'password' => 'required|string|min:6|confirmed',
            'ulica_i_broj_choveka' => 'required|string|max:30',
            'grad_choveka' => 'required|string|max:30',
            'post_broj_choveka' => 'required|string|max:30',
        ]);
    }

    public function showRegisterForm() {

        return view('register');
    }

    public function register(Request $request) {

        \Log::debug(request()->first_name);
        $validator = $this->validator(request()->except(['_token']));
        if ($validator->fails()) {
            //dd(response()->json($validator->errors(), 422));
            return response()->json($validator->errors(), 422);
        };

        $user = new User();

        $user->ime_choveka = $request->ime_choveka;
        $user->prezime_choveka = $request->prezime_choveka;
        $user->emil_choveka = $request->emil_choveka;
        $user->ulica_i_broj_choveka = $request->ulica_i_broj_choveka;
        $user->grad_choveka = $request->grad_choveka;
        $user->post_broj_choveka = $request->post_broj_choveka;
        $user->user_name = explode('@', $request->emil_choveka)[0];
        $user->user_pwd = bcrypt($request->password);  // kolona u bazi suvise kratka za hashovani passwd  // razlicita imena u bazi i na formi zbog validacije passworda

        $user->save();

        auth()->login($user);

        return redirect('catalog');
    }

    public function showLoginForm() {

        return view('login');
    }

    public function login() {

        $credentials = ['emil_choveka' => request()->emil_choveka, 'password' => request()->user_pwd];
        if(!auth()->attempt($credentials)) {  //request(['emil_choveka', 'user_pwd'])
            //dd(request());
            return redirect('/register');
        }

        return redirect('/catalog');
    }

    public function logout(Request $request) {

        auth()->logout();

        return redirect('/home');
    }
}
