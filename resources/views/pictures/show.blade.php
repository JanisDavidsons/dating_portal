@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end align-items-baseline">
                    @can('update', auth()->user()->profile)
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="/match/show">Find match</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/pictures/create">Add New picture</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/profile/{{ auth()->user()->id }}/edit">Edit
                                            Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            @foreach(auth()->user()->pictures as $picture)
                <div class="col-3 pb-4 d-flex justify-content-center">
                    <div class="row p-3">
                        <div style="border: 2px solid #000000" class="mb-2">
                            <div class="d-flex justify-content-end p-1">
                                <form action="/picture/delete/{{$picture->id}}" method="POST">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @method('delete')
                                    @csrf
                                </form>
                            </div>
                            <a href="/picture/{{ $picture->id }}">
                                <img src="{{$picture->getUrl()}}" class="w-100">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{--    <div class="container">--}}
    {{--        @auth()--}}
    {{--            <div class="row">--}}
    {{--                    <div class="col-12 pb-3">--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-4">--}}
    {{--                                <div>--}}
    {{--                                    <div class="d-flex align-items-center">--}}
    {{--                                        <div>--}}
    {{--                                            <div class="font-weight-bold">--}}


    {{--                                                button--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--            </div>--}}
    {{--        @endauth--}}
    {{--    </div>--}}
@endsection
