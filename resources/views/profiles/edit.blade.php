@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <form action="/profile/update" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <div class="d-flex col-12 justify-content-between">
                            <h1>Edit Profile</h1>
                            <div class="pr-3">
                                <input type="button" class="btn btn-primary" onclick="location.href='/profiles/show';"
                                       value="Find match"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Username</label>
                        <input id="username"
                               type="text"
                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                               name="username"
                               value="{{ old('username') ?? $user->profile->username}}"
                               autocomplete="username" autofocus>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>

                        <input id="description"
                               type="text"
                               class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                               name="description"
                               value="{{ old('description') ?? $user->profile->description }}"
                               autocomplete="description" autofocus>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">URL</label>

                        <input id="url"
                               type="text"
                               class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                               name="url"
                               value="{{ old('url') ?? $user->profile->url }}"
                               autocomplete="url" autofocus>

                        @if ($errors->has('url'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="row pb-5">
                        <label for="image" class="col-md-4 col-form-label">Add Image</label>

                        <input type="file" class="form-control-file" id="image" name="image">

                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>

                    <label class="col-md-4 col-form-label">Age range</label>

                    <range-slider class="col-md-12"></range-slider>
                </div>
            </div>
        </form>

        <div class="row mt-4">
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
@endsection
