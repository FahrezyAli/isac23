@extends('layouts.main')

@section('title', config('app.name') . ' | Pending')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/pending.css') }}">
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="konten">
            <img class="hourglass" src="{{ url('/assets/img/hourglass.gif') }}" alt="" />
            <div class="text">
                <h1 class="text--h1">
                    Menunggu Konfirmasi
                </h1>
                <p class="text--p">
                    Pembayaran anda sedang dalam proses verifikasi oleh panitia. <br> Tunggu beberapa saat dan cek kembali.
                </p>
                <a href="{{ route('profile') }}" class="button btn-primary"
                    style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 20px">Back to Home</a>
            </div>
        </div>
        <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
    </div>
@endsection
