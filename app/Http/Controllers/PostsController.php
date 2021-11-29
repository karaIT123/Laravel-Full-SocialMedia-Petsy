<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner', ['except' => ['index','store','create','show']]);
    }

    public function getResource($id)
    {
        #dd($id);
        #$id = $post['post'];
        return Post::findOrFail($id);
    }

    public function index(){
        $posts = Post::where('user_id',Auth::user()->id)->paginate(4);
        return view('posts.index',compact('posts'));
    }


    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create(){
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    public function store(PostRequest $request){
        $data = $request->only(['name','content','image','pets_id']);
        $data['user_id'] = Auth::user()->id;
        $post = Post::create($data);
        return redirect(route('posts.show',$post))->with('success',"L'image a été ajoutée avec succès");
    }

    public function edit($post){
        return view('posts.edit', compact('post'));
    }

    public function update($post, PostRequest $request){
        $post->update($request->only(['name','content','image','pets_id']));
        return redirect(route('posts.show',$post))->with('success',"La publication a été ajoutée avec succès");
    }
}
