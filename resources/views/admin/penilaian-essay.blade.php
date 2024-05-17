@extends('layouts.main')

@section('title', config('app.name') . ' | Admin ISAC 23')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/penilaian-essay.css') }}">
@endsection

@section('content')
    <div class="container  container-admin list-soal">
        <div class="headline">
            <h1>Penilaian Essay</h1>
            <div>
                <p>
                    {{ $account->nama_tim }}
                </p>

            </div>
        </div>


        <form action="{{ route('isi_nilai', ['id' => $essays->first()->account_id]) }}" method="post" class="contents">
            @csrf
            @method('put')
            @foreach ($essays as $essay)
                <p>{{ $loop->iteration }}. Soal</p>
                <div class="preview-question">
                    <div class="question">
                        <div class="soal">
                            <p>{{ $essay->soal->soal }}</p>
                            @if ($essay->soal->image)
                                <img class="question-img"
                                    src="{{ asset('storage/gambar_soal/' . $essay->soal->gambar_soal) }}">
                            @endif
                        </div>

                    </div>
                </div>
                <p>Jawaban</p>
                <div class="preview-question">
                    <div class="question">
                        <div class="soal">
                            <p>{!! nl2br(e($essay->answer)) !!}</p>

                        </div>

                    </div>
                </div>
                <div class="nilai">
                    <input type="number" name="nilai_{{ $loop->iteration }}" id="nilai"
                        placeholder="Masukkan nilai peserta" min="0" max="15">
                </div>
            @endforeach
            <button class="btn-primary" type="submit">Submit</button>
        </form>



    </div>
@endsection
