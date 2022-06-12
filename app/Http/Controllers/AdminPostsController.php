<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsUpdateRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact(
            'posts'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $user = \Auth::user();
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('/images', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $post = new Post($input);
        $user->posts()->save($post);
        session()->flash('created', 'Post "' . $input['title'] . '" successfully created');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact(
            'post',
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        //
        $input = $request->all();
        $user = \Auth::user();

        if ($file = $request->file('photo_id')){
            $name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('/images', $name);

            if (!$post->photo){
                $photo = Photo::create(['file'=>$name]);
                $input['photo_id'] = $photo->id;
            } else{
                unlink(public_path() . $post->photo->file);
                $post->photo()->update(['file'=>$name]);
                $input['photo_id'] = $post->photo->id;
            }
        }
        $post->update($input);
        session()->flash('updated', 'Post "' . $input['title'] . '" successfully updated');
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        //
        if ($photo = $post->photo){
            unlink(public_path() . $photo->file);
            $photo->delete();
        }
        $post->delete();
        session()->flash('deleted', 'Post "' . $post->name . '" successfully deleted');
        return redirect()->route('posts.index');
    }
}
