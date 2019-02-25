<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');
         return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Post 
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content' => 'required'
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'subtitle' => $request->get('subtitle'),
            'content'=> $request->get('content'),
            'user_id'=> \Auth::user()->id,
        ]);

        $post->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
         return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
         return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \App\Post 
     */
    public function update(Request $request, Post $post)
    {        
        // return $request;
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');
        $post->content = $request->get('content');

        $post->save();

        return redirect()->route('posts.show', ['post' => $post]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
