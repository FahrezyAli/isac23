@extends('layouts.main')

@section('title', config('app.name') . ' | Admin ISAC 23')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/add-pg.css') }}">
@endsection

@section('content')
    <div class="container container-admin">
        {{-- head --}}
        <div class="headline">
            <h1>List Soal Olympiad</h1>
            <div>
                <a href="{{ route('list_soal', ['babak' => $babak]) }}" style="margin-right: 1rem" class="button btn-primary" >List Soal</a>
            </div>
        </div>

        {{-- form input soal --}}
        <form action="{{ route('create_essay', ['babak' => $babak]) }}" enctype="multipart/form-data" class="form-admin" method="post">
            @csrf
            <div class="question">
                <textarea name="soal" id="soal" rows="5" placeholder="Masukkan soal disini...">{{ old('soal') ? old('soal') : '' }}</textarea>
                @error('soal')
                    <p style="color: red">{{ $message }}</p>
                @enderror
                {{-- masukkan gambar --}}
                <div class="wrap-input">
                    <input type="file" accept="image/png,image/jpg" class="hidden input-file" name="gambar_soal"
                        id="gambar_soal" onchange="showPreview(event);">
                    <label for="gambar_soal" class="button btn-primary">UNGGAH FOTO</label>
                </div>
                <img id="preview-gambar" src="" alt="" class="view-gambar">
            </div>
            <button class="btn-primary" type="submit">Submit</button>
        </form>

    </div>


    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById("preview-gambar");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>


@endsection
