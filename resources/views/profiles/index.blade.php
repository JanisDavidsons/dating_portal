@extends('layouts.app')

@section('content')
    <div class="container">
        @auth()
            <div class="row">
                @if($user->pictures->count() >0)
                    <div class="col-3 p-5">
                        <img src="{{ $user->pictures[0]->getUrl() }}" class="rounded-circle w-100">
                    </div>
                @endif

                <div class="col-9 pt-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="d-flex align-items-center pb-3">
                            <div class="h4">{{ $user->name }}</div>
                        </div>

                        @can('update', $user->profile)
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
                                            <a class="nav-link" href="/pictures/show">Show my gallery</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        @endcan
                    </div>

                    <div class="d-flex">
                        <div class="pr-5"><strong>{{ $imagesCount }}</strong> pictures</div>
                        <div class="pr-5"><strong>{{ $likedUsers->count() }}</strong> likes</div>
                    </div>
                    <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                    <div>{{ $user->profile->description }}</div>
                    <div><a href="#">{{ $user->profile->url }}</a></div>
                </div>
            </div>
            <div class="row mt-4">
                <h3 style="font-weight: bold">People you liked!</h3>
                @foreach($likedUsers as $user)
                    <div class="col-12 pb-3">
                        <div class="row">
                            <div class="col-8">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($user->pictures as $picture)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img class="d-block img-fluid w-100" src="{{ $picture->getUrl() }}"
                                                     alt="{{ $picture->caption }}">
                                                <div class="carousel-caption d-none d-md-block">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                       data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <h3 style="font-weight: bold">{{$user->name}}</h3>
                                    <hr>
                                    <p>{{$user->gender}}</p>
                                    <p>{{$user->age}}</p>
                                    <h5>{{$user->profile->description}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endauth
    </div>
@endsection
