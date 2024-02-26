<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function myPage(){
        $user = Auth::user();
        $profile = Profile::get();
        $articles = Article::get();
        // ビューを表示
        return view('myPage', compact('user','profile','articles'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
