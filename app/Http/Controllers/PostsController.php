<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index() {
        //$posts = Post::take(5)->get() ;
        $posts = Post::orderBy('id', 'desc')->paginate(5) ;
        $count = Post::count();
        return view('posts.index', compact('posts','count'));
    }
    public function show($id) {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:20',
            'body'  => 'required|max:30'
        ]);
        $post = new Post();
        $post->title = $request->title ;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('status','Post was created !');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:20',
            'body'  => 'required|max:30'
        ]);
        $post = Post::find($id);
        $post->title = $request->title ;
        $post->body = $request->body;
        $post->save();
        return redirect('/posts')->with('status','Post was update !');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('status','Post was deleted !');
    }
    
}
