<?php

namespace App\Http\Controllers;

use App\Area;
use App\Post;
use Illuminate\Http\Request;
use CyrildeWit\EloquentViewable\Support\Period;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        // $post->increment('views');
        views($post)->record();
        // $count = views($post)->count();
        // $count = views($post)->period(Period::pastWeeks(1))->count();
        //   return Post::orderByViews()->get();


        return view('posts.index', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filter(Request $request){
        $posts = Post::inRandomOrder()->take(8)->get();
        $searchPosts = Post::
                        where('name','like','%'.$request->input('name').'%')->
                        orWhere('review','like','%'.$request->input('name').'%')->
                        orWhere('detail','like','%'.$request->input('name').'%')->get();
        $topPosts = Post::orderByViews()->take(10)->get();

        return view('searchIndex',compact('posts','topPosts','searchPosts'));
    }

    public function area(Request $request){
        $posts = Post::inRandomOrder()->take(8)->get();
        $id = $request->input('area');

        $area = Area::find($id);

        $searchPosts = $area->posts()->get();
        // dd($searchPosts);
        // return $searchPosts;
        // return Post::all();
        return view('areaIndex', compact('searchPosts', 'posts'));
    }
}
