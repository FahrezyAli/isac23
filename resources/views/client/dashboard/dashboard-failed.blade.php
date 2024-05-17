@extends('layouts.main')

@section('title', config('app.name') . ' | Payment')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/payment.css') }}">
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')

    <div class="container-wrapper">
        <div class="container">
            <div class="konten">
                <img class="checklist" src="{{ url('/assets/img/payment-fail.gif') }}" alt="" />
                <div class="text">
                    <h1 class="text--h1 text-danger">
                        Verifikasi Gagal
                    </h1>
                    <p class="text--p">
                        Mohon kirim kembali bukti pembayaran yang valid melalui kolom dibawah ini.
                    </p>
                    <form action="{{ route('store_payment', ['account' => Auth::user()]) }}" method="post"
                        enctype="multipart/form-data" class="regis-lomba__form">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="text--bukti" for="bukti_bayar">Bukti Bayar</label>
                            <div class="input--wrap" style="width: max-content">
                                <input class="input--text" type="file" accept=".jpg, .jpeg, .png" name="bukti_bayar"
                                    id="bukti" placeholder="" hidden />
                                <label for="bukti" class="button btn-primary"
                                    style="font-size: 0.8rem; margin: 5px">Choose
                                    File</label>
                                <span id="file-chosen" style="font-size: 0.8rem">No file chosen</span>
                            </div>
                            <button class="button btn-primary"
                                style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 10px;align-self: flex-end">Submit</button>
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
