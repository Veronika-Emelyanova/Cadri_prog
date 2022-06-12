<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use App\Models\User;

class PostController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $posts = Post::all();
        $users = User::all();

 return view('post.index', compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function update(Post $post){
        $data = request()->validate([
            'name' => 'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }
}
