@extends('layouts.app')

@section('content')
    <div class="container">
        @auth()
            <div class="row">
                @foreach($users as $user)
                    @foreach($user->posts as $post)
                        <div class="col-8">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </div>
                    @endforeach

                    <div class="col-4">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="pr-3">
                                    <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100"
                                         style="max-width: 40px;">
                                </div>
                                <div>
                                    <div class="font-weight-bold">
                                        <a href="/profile/{{ $user->id }}">
                                            <span class="text-dark">{{ $user->username }}</span>
                                        </a>
                                        <div>
                                            <follow-button user-id="{{ $user->id }}"
                                                           follows="{{ $user->following->contains($user->id) }}"></follow-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $user->id }}">
                            <span class="text-dark">{{ $user->username }}</span>
                        </a>
                    </span> {{ $user->profile->descriprion }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{$users->links()}}
                </div>
            </div>
        @endauth
    </div>
@endsection


