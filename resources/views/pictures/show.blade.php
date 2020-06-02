@extends('layouts.app')

@section('content')
    <div class="container">
        @auth()
            <div class="row">
                @foreach($users as $user)
                    {{$user->name}} <br/>
{{--                    <div class="col-12 pb-3">--}}
{{--                        <div class="row">--}}
{{--                            {{dd($picture->getUrl())}}--}}
{{--                            <div class="col-8">--}}
{{--                                <img src="{{$picture->getUrl()}}" class="w-100">--}}
{{--                            </div>--}}

{{--                            <div class="col-4">--}}
{{--                                <div>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div>--}}
{{--                                            <div class="font-weight-bold">--}}
{{--                                                <a href="/profile/{{ $picture->user->id }}">--}}
{{--                                                    <span class="text-dark">{{ $picture->user->username }}</span>--}}
{{--                                                </a>--}}
{{--                                                <div>--}}
{{--                                                    <like-button user-id="{{ $picture->user->id }}"--}}
{{--                                                                 likes="{{ $picture->user->likes->contains($picture->user->id) }}"></like-button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <hr>--}}
{{--                                    <h3 style="font-weight: bold">{{$picture->user->profile->username}}</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @endforeach
            </div>
        @endauth
    </div>
@endsection
