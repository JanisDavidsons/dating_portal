@extends('layouts.app')

@section('content')
    <div class="container">
        @auth()
            <div class="row">
                <div class="col-3 p-5">
                    <img src="{{ $user->pictures[0]->getUrl() }}" class="rounded-circle w-100">
                </div>
                <div class="col-9 pt-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="d-flex align-items-center pb-3">
                            <div class="h4">{{ $user->username }}</div>
                        </div>

                        @can('update', $user->profile)
                            <a href="/pictures/create">Add New picture</a>
                        @endcan

                        <div class="btn btn-primary" onclick="location.href = '/profiles/show'">Find people
                        </div>
                    </div>

                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan

                    <div class="d-flex">
                        <div class="pr-5"><strong>{{ $imagesCount }}</strong> pictures</div>
{{--                        <div class="pr-5"><strong>{{ $followersCount }}</strong> likes</div>--}}
                        {{--                    <div class="pr-5"><strong>{{ $followingCount }}</strong> people you like</div>--}}
                    </div>
                    <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                    <div>{{ $user->profile->description }}</div>
                    <div><a href="#">{{ $user->profile->url }}</a></div>
                </div>
            </div>




            <div class="row mt-4">
                <h3 style="font-weight: bold">People you liked!</h3>
                @foreach($likedProfiles as $profile)
                    <div class="col-12 pb-3">
                        <div class="row">
                            <div class="col-8">


                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner" role="listbox">
                                        @foreach( $profile->user->pictures as $picture )
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
                                    <hr>
                                    <h3 style="font-weight: bold">{{$profile->username}}</h3>
                                    <p>{{$profile->user->gender}}</p>
                                    <p>{{$profile->user->age}}</p>
                                    <h5>{{$profile->description}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{--            <div class="row">--}}
            {{--                <div class="d-flex justify-content-center">--}}
            {{--                    @foreach($pictures as $picture)--}}
            {{--                        <div class="col-4 p-4 d-flex justify-content-center">--}}
            {{--                            <div class="row p-0">--}}
            {{--                                <div style="border: 2px solid #000000" class="mb-2">--}}
            {{--                                    <a href="/files/{{$picture->id}}">--}}
            {{--                                        <img class="w-100" src="/storage/{{$picture->location}}" alt="PDF thumbnail;">--}}
            {{--                                    </a>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{$pictures->links()}}
                </div>
            </div>
        @endauth
    </div>
@endsection
