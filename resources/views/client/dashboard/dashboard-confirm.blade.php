@extends('layouts.main')

@section('title', config('app.name') . ' | Confirmed')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/confirm.css') }}">
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="konten">
            <img class="calendar" src="{{ url('/assets/img/calendar.gif') }}" alt="" />
            <div class="text">
                <h1 class="text--h1">
                    Pembayaran Berhasil
                </h1>
                <p class="text--p">
                    Pembayaran anda telah berhasil diverifikasi oleh panitia. <br>
                    Jangan lupa untuk melakukan konfirmasi kepada contact person yang tersedia dan <br>
                    sampai jumpa di kompetisi nanti!
                </p>
                <p class="text--p" style="font-size: 0.75rem; color: red">
                    *Silakan menghubungi contact person berikut apabila terdapat<br> kendala ataupun pertanyaan :
                    @if (Auth::user()->role == 'uiux')
                        Alya (087889593989)
                    @else
                        Grace (081271902046)
                    @endif
                </p>
                @if (Auth::user()->kwitansi)
                    <div>
                        <a href="{{ Auth::user()->kwitansi }}" target="_blank" class="button btn-primary"
                            style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 20px">Lihat
                            Kwitansi</a>
                    </div>
                @endif
                <a href="{{ route('profile') }}" class="button btn-primary"
                    style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 20px">Back to Home</a>
            </div>
        </div>
        <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
    </div>
@endsection
