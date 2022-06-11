@extends('layouts.admin')

    @section('content')
        <h1>Users</h1>
        @include('includes.flash-sessions')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td colspan="10"></td></tr>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('users.edit', $user) }}">
                                            <img src="{{ $user->photo ? $user->photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt="" width="100px" class="img img-rounded">
                                        </a></td>
{{--                                    <td>--}}
{{--                                        @if($photo = $user->photo)--}}
{{--                                            <img src="{{ $photo->file }}" alt="" height="100">--}}
{{--                                        @else--}}
{{--                                            User has no profile photo--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role === null ? 'User has no role' : $user->role->name }}</td>
                                    <td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <form method="post" action="{{route('users.destroy', $user)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
{{--                        <tr>--}}
{{--                            <th>Id</th>--}}
{{--                            <th>Role</th>--}}
{{--                            <th>Status</th>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Created At</th>--}}
{{--                            <th>Updated At</th>--}}
{{--                        </tr>--}}
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        {{--laravel paginator--}}
{{--        <div class="d-flex">--}}
{{--            <div class="mx-auto">--}}
{{--                {{->links()}}--}}
{{--            </div>--}}
{{--        </div>--}}
    @endsection
