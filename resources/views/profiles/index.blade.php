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

                        <div class="col-4">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="pr-3">
                                            <input type="button" class="btn btn-primary" onclick="location.href='/profiles/show';" value="Find match" />
                                        </div>
                                        <div>
                                            <input type="button" class="btn btn-primary" onclick="location.href='/profile/{{ $user->id }}/edit';" value="Edit Profile" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <h3 style="font-weight: bold" class="pb-3">People you liked!</h3>
                @foreach($likedUsers as $user)
                    <div class="col-12 pb-3" >
                        <div class="row p-3" style="border: 2px solid #8dbaea; border-radius: 25px;">
                            <div class="col-8">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($user->pictures as $picture)
                                            <div class=" carousel-item {{ $loop->first ? 'active' : '' }}">
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




