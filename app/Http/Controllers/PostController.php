<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostTag;
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
        $post->tags_flat = implode(', ', $post->tags->pluck('tag')->toArray());
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

        $tags = $request->get('tags_flat');
        if ($tags) {
            $tags = array_unique(array_map('trim', explode(',', $tags)));
            $tags_old = $post->tags->pluck('tag')->toArray();

            foreach ($tags as $tag) {
                if (!in_array($tag, $tags_old)) {
                    $pt = new PostTag([
                        'post_id' => $post->id,
                        'tag'=> trim($tag),
                    ]);
                    $pt->save();
                }
            }

            foreach ($tags_old as $old) {
                if (!in_array($old, $tags)) {
                    PostTag::where('post_id', $post->id)->where('tag', $old)->delete();
                }
            }
        }

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
