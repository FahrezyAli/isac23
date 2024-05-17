@extends('layouts.main')

@section('title', config('app.name') . ' | Admin ISAC 23')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/list-soal.css') }}">
@endsection

@section('content')
    <div class="container  container-admin list-soal">
        <div class="headline">
            <h1>{{ $account->nama_tim }}</h1>
            @if (request()->is('admin/hasil/olympiad/penyisihan/*'))
                <p>{{ $account->nilai_penyisihan }} poin</p>
            @elseif(request()->is('admin/hasil/olympiad/semifinal/*'))
                <p>{{ $account->nilai_semifinal }} poin</p>
            @endif
        </div>

        <div class="contents">
            {{-- Soal --}}
            @foreach ($summaries as $summary)
                {{-- Pilgan --}}
                <div class="preview-question">
                    <div class="question">
                        <div class="soal">
                            <p>{{ $summary->no_soal }}. {{ $summary->soal->soal }}</p>
                            @if (!is_null($summary->soal->gambar_soal))
                                <img class="question-img"
                                    src="{{ asset('storage/gambar_soal/' . $summary->soal->gambar_soal) }}">
                            @endif
                        </div>

                        <div class="jawaban">
                            <p> Jawaban Peserta :
                                {{ is_null($summary->option) ? '-' : $summary->option->isi_option }}
                                <br>Jawaban Benar :
                                {{ $summary->soal->jawaban($summary->soal->id) }}
                            </p>
                            @if ($summary->soal->jawaban_gambar($summary->soal->id))
                                <img class="question-img"
                                    src="{{ asset('storage/gambar_option/' . $summary->soal->jawaban_gambar($summary->soal->id)) }}">
                            @endif
                            @if (is_null($summary->answer_status))
                                <p>Nilai : 0 Poin</p>
                            @elseif($summary->answer_status == 1)
                                <p>Nilai : {{ $summary->soal->nilai }} Poin</p>
                            @elseif($summary->answer_status == 0)
                                <p>Nilai : -1 Poin</p>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach

            {{-- <div>
                {{ $summaries->links('vendor.pagination.default-humam-2') }}
            </div> --}}

        </div>

    </div>
@endsection
