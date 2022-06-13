<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('admin', ['except'=>'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $comments = Comment::all();
        return view('admin.comments.index', compact(
            'comments'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $input = $this->validate($request, [
            'body'=>'required',
            'post_id'=>'required|int'
        ]);

        \Auth::user()->comments()->create($input);
        session()->flash('comment-message','Your message has been submitted and is waiting moderation');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show', compact(
            'comments',
            'post'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Comment $comment)
    {
        //
        switch ($comment->is_active){
            case 0:
                $comment->update(['is_active'=>1]);
                break;
            case 1:
                $comment->update(['is_active'=>0]);
                break;
        }
        session()->flash('comment-status', 'Comment status changed');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        //
        $comment->delete();
        session()->flash('comment-deleted', 'Comment successfully deleted');
        return back();
    }
}
