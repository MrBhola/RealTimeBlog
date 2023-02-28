<?php

namespace App\Http\Controllers;

use App\Events\PostLikedEvent;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikeController extends Controller
{

    public function __construct(private Like $like)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->id();
        $post_id = $request->post_id;
        $this->like->updateOrCreate(
            ['user_id' => $user_id, 'post_id' => $post_id],
            ['user_id' => $user_id, 'post_id' => $post_id]
        );

        $receiverId = Post::find($post_id)->user_id;
        if($receiverId != $user_id){
        broadcast(new PostLikedEvent($receiverId, auth()->user()->name, route('post.show', $post_id)));
        }
        return redirect()->back()->with('success', 'You liked the post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like): RedirectResponse
    {
        //
    }
}
