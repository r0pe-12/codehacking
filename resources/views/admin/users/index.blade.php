@extends('layouts.admin')

    @section('content')
        <h1>Users</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td colspan="10"></td></tr>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->role === null ? 'User has no role' : $user->role->name }}</td>
                                    <td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
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
