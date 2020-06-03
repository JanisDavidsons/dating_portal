@extends('layouts.app')

@section('content')

    <div class="container">
        @auth()
            <div class="row">
                <div class="col-12 pb-3">
                    <div class="row">
                        <div class="col-8">
                            <img src="{{$user->pictures[0]->getUrl()}}" class="w-100">
                        </div>
                        <div class="col-4">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="row">
                                            <div>
                                                <dislike-button user-id="{{ $user->id }}"
                                                                dislikes="{{ $user->affections->contains($user->id) }}">"
                                                </dislike-button>
                                            </div>
                                            <div>
                                                <like-button user-id="{{ $user->id }}"
                                                             likes="{{ $user->affections->contains($user->id) }}"></like-button>
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
                    </div>
                </div>
            </div>

        @endauth
    </div>
@endsection


