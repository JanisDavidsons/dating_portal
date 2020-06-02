@extends('layouts.app')

@section('content')
    <div class="container">
        @auth()
            <div class="row">
{{--                {{dd($pictures->pictures[0]->getUrl())}}--}}
{{--                @foreach($pictures as $picture)--}}
{{--                    {{$user->name}} <br/>--}}
                    <div class="col-12 pb-3">
                        <div class="row">
                            <div class="col-8">
                                <img src="{{$user->pictures[0]->getUrl()}}" class="w-100">
                            </div>

                            <div class="col-4">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="font-weight-bold">
                                                <a href="/profile/{{ $user->id }}">
                                                    <span class="text-dark">{{ $user->username }}</span>
                                                </a>
                                                <div>
                                                    <like-button user-id="{{ $user->id }}"
                                                                 likes="{{ $user->likes->contains($user->id) }}"></like-button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 style="font-weight: bold">{{$user->profile->username}}</h3>
                                    <p>{{$user->gender}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                @endforeach--}}
            </div>
        @endauth
    </div>
@endsection
