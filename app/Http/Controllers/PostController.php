<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "post index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "post" => "required",
        ]);
        auth()->user()->posts()->create($data);
        return redirect()->route("dashboard")->with('message','Post Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if($post->user_id == auth()->id()){
            $posts = auth()->user()->posts()->latest()->paginate(10);
            return view('post.update', ['current_post'=> $post,'posts'=>$posts]);
        }
        return back()->with('message','You are not authorized to edit this post');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if($post->user_id != auth()->id()){
            abort(403,'Unauthorized Access');
        }
        $data = $request->validate([
            "post" => "required",
        ]);
        $post->update($data);
        return redirect()->route("dashboard")->with("message","Post successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->user_id != auth()->id()){
            abort(403,'Unauthorized Access');
        }
        $post->delete();
        return redirect()->route('dashboard')->with('message','Post deleted successfully!');
    }
}
