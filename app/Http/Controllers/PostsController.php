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
    }

    public function index(){
        $posts = Post::where('user_id',Auth::user()->id)->paginate(1);
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
}
