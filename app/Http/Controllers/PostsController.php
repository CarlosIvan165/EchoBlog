<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(){
        /* Gate::authorize('create', Vacante::class); */
        return view('post.create');
    }

    public function edit(Post $post){
        return view('post.edit', [
            'post' => $post
        ]);
    }

    public function show(Post $post){
        return view('post.show', [
            'post' => $post
        ]);
    }
}
