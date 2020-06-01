@extends('layouts.app')

@section('content')
    <div class="container">
        @auth()
            <div class="row">
                @foreach($profiles as $profile)
                    {{--                    {{var_dump($profile)}}--}}
                    @foreach($profile->user->posts as $post)
                        {{$post->image}}
                        <div class="col-8">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </div>
                    @endforeach

                    <div class="col-4">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="pr-3">
                                    <img src="{{$profile->profileImage()}}" class="rounded-circle w-100"
                                         style="max-width: 40px;">
                                </div>
                                <div>
                                    <div class="font-weight-bold">
                                        <a href="/profile/{{ $profile->user->id }}">
                                            <span class="text-dark">{{ $profile->user->username }}</span>
                                        </a>
                                        <a href="#" class="pl-3">Follow</a>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $profile->user->id }}">
                            <span class="text-dark">{{ $profile->user->username }}</span>
                        </a>
                    </span> {{ $profile->descriprion }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{$profiles->links()}}
                </div>
            </div>
        @endauth
    </div>
@endsection
