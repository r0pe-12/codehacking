@extends('layouts.admin')

    @section('content')
        <h1>Media</h1>
        <div class="row">
            @include('includes.flash-sessions')
            <div class="col-sm-12">
                @if($photos)
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Owner</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($photos as $photo)
                                        <tr>
                                            <td>{{ $photo->id }}</td>
                                            <td><a href="{{ route('media.edit', $photo) }}">
                                                    <img src="{{ $photo->file ? $photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt="" width="100px" class="img img-rounded">
                                                </a></td>
                                            <td>{!! $photo->owner() !!}</td>
                                            <td>{{ $photo->created_at->diffForHumans() }}</td>
                                            <td>{{ $photo->updated_at->diffForHumans() }}</td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo]]) !!}
                                                        {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>Id</th>--}}
{{--                                    <th>Username</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Avatar</th>--}}
{{--                                    <th>Email</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th>Updated At</th>--}}
{{--                                    <th>DELETE</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
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
