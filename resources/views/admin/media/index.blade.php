@extends('layouts.admin')

    @section('content')
        <h1>Media</h1>
        <div class="row">
            @include('includes.flash-sessions')
            <div class="col-sm-12">

                @if($photos)
                    <form method="post" action="{{ route('media.bulk.delete') }}" enctype="multipart/form-data" class="form-check-inline">
                        @csrf
                        @method("DELETE")
                        <select name="checkBoxArray" id="" class="form-control">
                            <option value="">Delete</option>
                        </select>
                        <input type="submit" class="btn btn-primary" name="delete_bulk" value="Submit">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th><input type="checkbox" id="options"></th>
                                            <th>Photo</th>
                                            <th>Owner</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($photos as $photo)
                                                <tr>
                                                    <td>{{ $photo->id }}</td>
                                                    <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                                                    <td><a href="{{ route('media.edit', $photo) }}">
                                                            <img src="{{ $photo->file ? $photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt="" width="100px" class="img img-rounded">
                                                        </a></td>
                                                    <td>{!! $photo->owner() !!}</td>
                                                    <td>{{ $photo->created_at->diffForHumans() }}</td>
                                                    <td>{{ $photo->updated_at->diffForHumans() }}</td>
                                                    <td>
{{--                                                TODO ovo ima veliki problem jer u formi samo id zadnje slike ucitava --}}
{{--                                                        <input type="hidden" name="photo" value="{{ $photo->id }}">--}}
{{--                                                        <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">--}}

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
                    </form>
                @endif
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function () {
                $('#options').click(function () {

                    if (this.checked){
                        $('.checkBoxes').each(function () {
                            this.checked = true;
                        });
                    }else {
                        $('.checkBoxes').each(function () {
                            this.checked = false;
                        });
                    }

                });
            })
        </script>
    @endsection
