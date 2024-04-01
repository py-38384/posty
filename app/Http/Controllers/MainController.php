<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(10);
        return view("index",[
            "posts" => $posts,
        ]);
    }
    public function dashboard(){
        $posts = auth()->user()->posts()->latest()->paginate(10);
        return view("post/posts",[
            "posts" => $posts,
        ]);
    }
}
