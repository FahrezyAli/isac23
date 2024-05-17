@extends('layouts.main')

@section('title', config('app.name') . ' | Sayang sekali...')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/gagal.css') }}">
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="konten">
            <img class="lolos" src="{{ url('/assets/img/sad-maskot.png') }}" alt="" />
            <div class="text">
                <h1 class="text--h1">
                    We really appreciate for <br> your enthusiasm and participation.
                </h1>
                <p class="text--p">
                    You've given your best to reach this stage. <br> Stay motivited and never give up! See you our fantastic
                    participant!
                </p>
                <a href="{{ route('profile') }}" class="button btn-primary"
                    style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 20px">Back to Home</a>
            </div>
        </div>
        <!-- <div class="home">
                                </div> -->
        <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
    </div>
@endsection
