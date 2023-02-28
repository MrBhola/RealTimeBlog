<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{

    public function __construct(private Post $post ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->post->with('auther:id,name')->latest()->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $data['user_id'] = auth()->id();
        $this->post::create($data);
        return redirect()->route('home')->with('success', 'Post Has been published');

    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
     $post = Post::where('id', $id)->with(['auther:id,name','likes', 'comments.user'])->withCount('likes')->first();
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        //
    }
}
