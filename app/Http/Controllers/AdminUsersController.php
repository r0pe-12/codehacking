<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
//        dd($roles);
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UsersRequest $request)
    {
        //
        $input = $request->all();
        if ($file = $request->file('photo_id')){
            $name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('/images', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
//        dd($input);
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        session()->flash('created', 'User "' . $input['name'] . '" successfully created');
        return redirect()->route('users.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact(
            'roles',
            'user'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsersUpdateRequest $request, User $user)
    {
        //
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('/images', $name);

            if ($photo = $user->photo) {
                unlink(public_path() . $user->photo->file);
                $photo->file = $name;
                $photo->save();
            } else {
                $photo = Photo::create(['file'=>$name]);
            }

            $input['photo_id'] = $photo->id;
        }

        if ($input['password']){
            $input['password'] = bcrypt($input['password']);
        }
        unset($input['password']);

        $user->update($input);
        session()->flash('updated', 'User "' . $input['name'] . '" successfully updated');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        //
        unlink(public_path() . $user->photo->file);
        $user->photo->delete();
        $user->delete();
        session()->flash('deleted', 'User "' . $user->name . '" successfully deleted');
        return redirect()->route('users.index');
    }
}
