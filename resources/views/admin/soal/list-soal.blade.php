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
            <h1>List Soal Olympiad</h1>
            <div>
                <a style="margin-right: 1rem" class="button btn-primary"
                    href="{{ route('add_pilgan', ['babak' => $babak]) }}">+ Pilihan Ganda</a>
                @if ($babak !== 'penyisihan')
                    <a class="button btn-primary" href="{{ route('add_essay', ['babak' => $babak]) }}">+ Essay</a>
                @endif

            </div>
        </div>

        <div class="contents">
            {{-- Soal --}}
            @foreach ($soals as $soal)
                {{-- Pilgan --}}
                @if ($soal->jawaban)
                    <div class="preview-question">
                        <div class="question"
                            onclick="window.location.href = '{{ route('edit_pilgan', ['babak' => $babak, 'id' => $soal->id]) }}' ">
                            <div class="soal">
                                <p>{{ $soal->soal }}</p>
                                @if (!is_null($soal->gambar_soal))
                                    <img class="question-img"
                                        src="{{ asset('storage/gambar_soal/' . $soal->gambar_soal) }}">
                                @endif
                            </div>

                            <div class="jawaban">
                                <p> Pilgan | JAWABAN : {{ $soal->jawaban($soal->id) }}</p>
                                @if ($soal->jawaban_gambar($soal->id))
                                    <img class="question-img"
                                        src="{{ asset('storage/gambar_option/' . $soal->jawaban_gambar($soal->id)) }}">
                                @endif
                                <p>Nilai : {{ $soal->nilai }} Poin</p>
                            </div>
                        </div>
                        <form action="{{ route('delete_soal', [$soal->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="question-delete">Delete</button>
                        </form>
                    </div>

                    {{-- Essai --}}
                @else
                    <div class="preview-question">
                        <div class="question"
                            onclick="window.location.href = '{{ route('edit_essay', ['babak' => $babak, 'id' => $soal->id]) }}' ">
                            <div class="soal">
                                <p>{{ $soal->soal }}</p>
                                @if (!is_null($soal->gambar_soal))
                                    <img class="question-img" src="{{ $soal->gambar_soal }}">
                                @endif
                            </div>

                            <div class="jawaban">
                                <p>Essay</p>
                                <p>Nilai : {{ $soal->nilai }} Poin</p>
                            </div>
                        </div>
                        <form action="{{ route('delete_soal', [$soal->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="question-delete">Delete</button>
                        </form>
                    </div>
                @endif
            @endforeach

            <div>
                {{ $soals->links('vendor.pagination.default-humam-2') }}
            </div>

        </div>

    </div>
@endsection
