<?php

namespace App\Http\Controllers;

use App\Area;
use App\Post;
use App\Role;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddPostRequest;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->paginate(7);

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $areas = Area::all();

        return view('admin.posts.create', compact('categories','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPostRequest $request)
    {
        $input = $request->all();

        if($file = $request->file('file')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/posts', $name);
            $image = Photo::create(['filename'=>$name]);
            $input['photo_id'] = $image->id;
        }

        $input['user_id'] = Auth::user()->id;
        Post::create($input);
        Session::flash('flash_admin','レビュー投稿が完了しました！');
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $areas = Area::all();

        return view('admin.posts.edit', compact('post','categories','areas'));
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
        $post = Post::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('file')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/posts', $name);
            $image = Photo::create(['filename'=>$name]);
            $input['photo_id'] = $image->id;
        }

        $post->update($input);
        Session::flash('flash_admin','レビュー編集が完了しました！');
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        Session::flash('flash_admin','レビュー削除が完了しました！');
        return redirect('admin/posts');
    }
    public function filter(Request $request){
        $posts = Post::
                       where('name','like','%'.$request->input('name').'%')->
                       orWhere('review','like','%'.$request->input('name').'%')->
                       orWhere('detail','like','%'.$request->input('name').'%')->get();

        return view('admin.posts.search',compact('posts'));
    }
}
