@extends('layouts.main')

@section('title', config('app.name') . ' | Selamat!')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/lolos.css') }}">
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="konten">
            <img class="lolos" src="{{ url('/assets/img/congrats.png') }}" alt="" />
            <div class="text">
                <h1 class="text--h1">
                    ✨ Congratulations on making it to the final round! ✨
                </h1>
                <p class="text--p">
                    We are truly grateful for your enthusiasm and participation. <br> You are indeed amazing to have come
                    this
                    far. <br> See you in the final round, our fantastic participant!
                </p>
            </div>
            @if (Auth::user()->role == 'olymp')
                <div class="contact-person">
                    Contact Person: Grace (081271902046)
                </div>
            @elseif(Auth::user()->role == 'uiux')
                <div class="contact-person">
                    Contact Person: Alya (087889593989)
                </div>
            @endif
        </div>
        <div class="tombol">
            <div class="home">
                @if (Auth::user()->role == 'olymp')
                    <a href="https://t.me/+ZztwiVbzsRsyZWY1" class="button btn-primary"
                        style="padding-top: 5px; padding-bottom: 5px;text-decoration: none">Join Group</a>
                @elseif(Auth::user()->role == 'uiux')
                    <a href="https://t.me/+UGCIAHQq9UVlM2Fl" class="button btn-primary"
                        style="padding-top: 5px; padding-bottom: 5px;text-decoration: none">Join Group</a>
                @endif
            </div>
            <div class="home">
                <a href="{{ route('profile') }}" class="button btn-primary"
                    style="padding-top: 5px; padding-bottom: 5px;text-decoration: none">Back to Home</a>
            </div>
        </div>
        <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
    </div>
@endsection
