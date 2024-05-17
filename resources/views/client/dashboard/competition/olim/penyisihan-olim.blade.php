@php
    $date = date('Y-m-d H:i:s');
@endphp

@extends('layouts.main')

@section('title', config('app.name') . ' | Penyisihan Olimpiad')

@section('styles')

    <link rel="stylesheet" href="{{ url('css/client/dash_penyisihan_olim.css') }}">

    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    <div class="container-wrapper">
        <div class="container">
            <div class="konten">
                <img class="checklist" src="{{ url('/assets/img/olim.gif') }}" alt="" />
                <div class="text">
                    <h1 class="text--h1">
                        PENYISIHAN
                    </h1>
                    <h1 class="text--hcolor">ISAC OLYMPIAD</h1>
                    <div class="rules">
                        Rules:
                        <ol>
                            <li>Durasi pengerjaan selama 90 menit</li>
                            <li>Peserta dapat mengerjakan soal dalam rentang waktu 09.00 - 12.00 WIB</li>
                            <li>Soal terdiri dari 40 butir soal</li>
                            <li>Soal berbentuk multiple choice dan tidak bisa kembali ke soal sebelumnya</li>
                            <li>Terdapat 3 tingkat kesulitan soal. Mudah (2 poin), Medium (3 poin), Sulit (4 poin)</li>
                            <li>Jawaban salah akan mendapat -1 poin, dan jika tidak dijawab maka tidak mendapat poin
                            </li>
                        </ol>
                    </div>
                    <div class="btn-group">
                        @if ($date >= '2023-09-23 09:00:00' && $date < '2023-09-23 12:00:00')
                            <a class="button btn-primary" href="{{ route('attempt_penyisihan', ['no' => 1]) }}">Mulai
                                Pengerjaan</a>
                        @endif
                    </div>
                </div>
            </div>
            <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
        </div>
    </div>

@endsection
