<?php

namespace App\Http\Controllers;

use App\Area;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::inRandomOrder()->take(8)->get();
        $postsOther = Post::orderBy('id','desc')->paginate(4);
        $topPosts = Post::orderByViews()->take(10)->get();
        return view('home',compact('posts','postsOther','topPosts'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
