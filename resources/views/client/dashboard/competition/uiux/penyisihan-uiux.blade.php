@php
    $date = date('Y-m-d H:i:s');
@endphp

@extends('layouts.main')

@section('title', config('app.name') . ' | Penyisihan UI/UX')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/dash_penyisihan_uiux.css') }}">
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    <div class="container-wrapper">
        <div class="container">
            <div class="konten">
                <img class="checklist" src="{{ url('/assets/img/uiux.gif') }}" alt="" />
                <div class="text">
                    <h1 class="text--h1">
                        PENYISIHAN
                    </h1>
                    <h1 class="text--hcolor">ISAC UI/UX</h1>
                    <div class="rules">
                        Rules:
                        <ol>
                            <li>Peserta diperbolehkan menggunakan software editing/aplikasi/web desain apapun (disarankan
                                figma).</li>
                            <li>Karya yang dikumpulkan merupakan karya orisinil dan belum pernah diikutsertakan ke dalam
                                perlombaan lain.</li>
                            <li>Tidak ada toleransi terkait keterlambatan pengumpulan karya.</li>
                            <li>Peserta melakukan redesain halaman utama website pendidikan (e-learning) dan tidak
                                menghilangkan ciri khas dari pendidikan (e-learning) yang akan didesain ulang.</li>
                        </ol>
                    </div>
                    <div class="btn-group">
                        <a href="{{ url('/assets/doc/surat-orisinilitas.docx') }}" target="_blank"
                            class="button btn-uiux start">Surat
                            Orisinilitas</a>
                        <a href="https://docs.google.com/document/d/1KNgl3o9Ano-q6DE68BgiQYRIHcZ9SBX7gXiFZP5Wrxc/edit?usp=sharing"
                            target="_blank" class="button btn-uiux start">Template Laporan</a>

                    </div>
                    <form action="{{ route('attempt_uiux') }}" method="post" enctype="multipart/form-data"
                        class="regis-lomba__form">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="text--bukti" for="bukti_bayar">Hasil Pengerjaan :</label>
                            <div class="input--wrap" style="width: max-content">
                                <input class="input--text" type="url" name="hasil_uiux" id="hasil_uiux"
                                    placeholder="Link Pengerjaan" />
                            </div>
                            <button class="button btn-primary"
                                style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 10px;align-self: flex-end"
                                {{ $date < '2023-10-04 15:00:00' ? '' : 'disabled' }}>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
        </div>
    </div>
    <script>
        const actualBtn = document.getElementById('bukti');
        const fileChosen = document.getElementById('file-chosen');
        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })
    </script>
@endsection
