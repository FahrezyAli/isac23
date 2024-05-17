@php
    $date = date('Y-m-d H:i:s');
@endphp

@extends('layouts.main')

@section('title', config('app.name') . ' | Semifinal Olimpiad')

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
                        SEMIFINAL
                    </h1>
                    <h1 class="text--hcolor">ISAC OLYMPIAD</h1>
                    <div class="rules">
                        Rules:
                        <ol>
                            <li>Durasi pengerjaan selama 90 menit</li>
                            <li>Peserta dapat mengerjakan soal dalam rentang waktu 09.10 - 10.40 WIB</li>
                            <li>Soal terdiri dari 30 butir soal pilihan ganda dan 2 butir soal uraian. Soal tidak bisa kembali ke soal sebelumnya.</li>
                            <li>Terdapat 3 tingkat kesulitan soal. Mudah (2 poin), Medium (3 poin), Sulit (4 poin)</li>
                            <li>Jawaban salah akan mendapat -1 poin, dan jika tidak dijawab maka tidak mendapat poin</li>
                            <li>Penilaian soal uraian akan ditentukan berdasarkan jawaban masing-masing peserta dengan nilai maksimal 15 poin.</li>
                        </ol>
                    </div>
                    <div class="btn-group">
                        @if ($date >= '2023-09-30 09:10:00' && $date < '2023-09-30 10:40:00')
                            <a class="button btn-primary" href="{{ route('attempt_semifinal', ['no' => 1]) }}">Mulai
                                Pengerjaan</a>
                        @endif
                    </div>
                </div>
            </div>
            <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
        </div>
    </div>

@endsection
