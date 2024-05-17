@extends('layouts.main')

@section('title', config('app.name') . ' | Profile')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
    <link rel="stylesheet" href="{{ url('css/client/profile.css') }}">
@endsection


@section('content')
    <div class="container">
        <h1 class="judul" data-tim="{{ $account->nama_tim }}">{{ $account->nama_tim }}</h1>

        <div class="profile">
            @foreach ($account->students->sortByDesc('status') as $student)
                <div class="temp">
                    <h4 style="text-transform: capitalize">{{ $student->status }}</h4>
                    <div class="konten">
                        <img src="{{ $student->foto_profil }}" alt="" class="ukuran pas-foto" />
                        <div class="text">
                            <p>
                                Nama: {{ $student->nama }} <br>
                                Nomor Telepon: {{ $student->telp }} <br>
                            </p>
                            <a href="{{ route('edit_anggota', ['student' => $student]) }}" class="button btn-primary"
                                style="margin-top: 0.5rem">Edit</a>
                            @if ($student->sertifikat)
                                <a href="{{ $student->sertifikat }}" class="button btn-primary"
                                    style="margin-top: 0.5rem">Download Sertifikat</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @if ($account->status_bayar == 'unverif')
            <div class="bayar">
                <h3>*Anda belum melakukan pembayaran</h3>
                <a href="{{ route('payment') }}" class="button btn-primary" style="margin-top: 0.5rem">Bayar</a>
            </div>
        @else
            <div class="bayar">
                <a href="{{ route('payment') }}" class="button btn-primary" style="margin-top: 0.5rem">Status
                    Pembayaran</a>
            </div>
        @endif

        <div class="bayar">
            <a href="https://wa.link/gyyedu" class="button btn-primary" style="margin-top: 1.5rem">Ajukan Surat Izin
                Lomba</a>
        </div>

        @if (Auth::user()->role == 'uiux' && Auth::user()->status == 'finalis')
            <div class="bayar">
                <a href="https://docs.google.com/document/d/1LIkGGJ_Jv9SC7jRcTZVo4p5t2AZwZvCbohfO8bi6NDI/edit"
                    target="_blank" class="button btn-primary" style="margin-top: 1.5rem">Template Laporan Final</a>
            </div>
        @endif

    </div>
    <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />

@endsection
