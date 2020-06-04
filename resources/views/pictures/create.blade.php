@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/pictures" enctype="multipart/form-data" method="post">
        @csrf
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
                                        <a class="nav-link" href="/profile/{{ auth()->user()->id }}/edit">Edit
                                            Profile</a>
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
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New picture</h1>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Image Caption</label>

                    <input id="caption"
                           type="text"
                           class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}"
                           name="caption"
                           value="{{ old('caption') }}"
                           autocomplete="caption" autofocus>

                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('caption') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Picture</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
