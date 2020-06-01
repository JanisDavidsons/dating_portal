@extends('layouts.app')

@section('content')
    <div class="container">
        @auth()
            <div class="row">
                <div class="col-3 p-5">
                    <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
                </div>
                <div class="col-9 pt-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="d-flex align-items-center pb-3">
                            <div class="h4">{{ $user->username }}</div>
                        </div>

                        @can('update', $user->profile)
                            <a href="/posts/create">Add New picture</a>
                        @endcan
                        <div class="btn btn-primary" onclick="location.href = '/profile/{{Auth::user()->id}}'">My
                            profile
                        </div>

                    </div>

                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan

                    <div class="d-flex">
                        <div class="pr-5"><strong>{{ $postCount }}</strong> pictures</div>
                        <div class="pr-5"><strong>{{ $followersCount }}</strong> likes</div>
                        {{--                    <div class="pr-5"><strong>{{ $followingCount }}</strong> people you like</div>--}}
                    </div>
                    <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                    <div>{{ $user->profile->description }}</div>
                    <div><a href="#">{{ $user->profile->url }}</a></div>
                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-center">
                    @foreach($posts as $post)
                        <div class="col-6 pb-4 d-flex justify-content-center">
                            <div class="row p-0">
                                <div class="pb-1 pr-0 col-12 d-flex justify-content-end">
                                    <div>
                                        <follow-button user-id="{{ $user->id }}"
                                                       follows="{{ $follows }}"></follow-button>
                                    </div>
                                </div>
                                <div style="border: 2px solid #000000" class="mb-2">
                                    <a href="/files/{{$post->id}}">
                                        <img class="w-100" src="/storage/{{$post->image}}" alt="PDF thumbnail;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{$posts->links()}}
                </div>
            </div>
        @endauth
    </div>
@endsection
