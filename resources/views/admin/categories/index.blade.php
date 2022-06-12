@extends('layouts.admin')

    @section('content')
        @include('includes.flash-sessions')
        <h1>Categories</h1>
        <div class="row">
            <div class="col-sm-6">
                @include('includes.form-error')
                {!! Form::open(['method'=>'Post', 'action'=>'AdminCategoriesController@store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name: ') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <br>
                        {!! Form::submit('Create Category', ['class'=>'btn btn-primary col-sm-6']) !!}
                        {!! Form::reset('Reset', ['class'=>'btn btn-danger col-sm-3 pull-right']) !!}
                {!! Form::close() !!}
            </div>

            <div class="col-sm-6">
                @if($categories)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>DELETE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td><a href="{{ route('categories.edit', $category) }}">{{ $category->name }}</a></td>
                                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                                <td>
                                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category]]) !!}
                                                            {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
            {{--                        <tfoot>--}}
            {{--                        <tr>--}}
            {{--                            <th>Id</th>--}}
            {{--                            <th>Username</th>--}}
            {{--                            <th>Name</th>--}}
            {{--                            <th>Avatar</th>--}}
            {{--                            <th>Email</th>--}}
            {{--                            <th>Created At</th>--}}
            {{--                            <th>Updated At</th>--}}
            {{--                            <th>DELETE</th>--}}
            {{--                        </tr>--}}
            {{--                        </tfoot>--}}
                                </table>
                            </div>
                        </div>
                    </div>
{{--                    laravel paginator--}}
{{--                    <div class="d-flex">--}}
{{--                        <div class="mx-auto">--}}
{{--                            {{->links()}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @endif
            </div>
        </div>
    @endsection
