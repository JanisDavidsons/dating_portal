@extends('layouts.app')

@section('content')

    <div class="container pt-4">
        @auth()
            <div class="row">
                <div class="col-12 pb-3">
                    <div class="row">
                        @if($user)
                            <div class="col-8">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner" role="listbox">
                                        @foreach( $user->pictures as $picture )
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
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="row">
                                                <div>
                                                    <dislike-button user-id="{{ $user->id }}"
                                                                    dislikes="{{ $user->affections->contains($user->id) }}">
                                                    </dislike-button>
                                                </div>
                                                <div>
                                                    <like-button user-id="{{ $user->id }}"
                                                                 likes="{{ $user->affections->contains($user->id) }}">

                                                    </like-button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 style="font-weight: bold">{{$user->profile->username}}</h3>
                                    <p>{{$user->gender}}</p>
                                    <p>{{$user->age}}</p>
                                    <h5>{{$user->profile->description}}</h5>
                                </div>
                            </div>
                        @else
                            <div>
                                <h1>
                                    No more people found :(
                                    <a href="{{ url('/profile/' . auth()->id()) }}" class="btn btn-info pull-right ml-5">To my profile</a>

                                </h1>
                            </div>
                            <div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        @endauth
    </div>
@endsection


