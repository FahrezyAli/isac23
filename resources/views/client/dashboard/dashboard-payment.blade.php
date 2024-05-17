@php
    $date = date('Y-m-d H:i:s');
@endphp

@extends('layouts.main')

@section('title', config('app.name') . ' | Payment')

@section('styles')
    @if (
        $date < '2023-08-12 00:00:00' ||
            ($date > '2023-08-12 00:00:00' && $date < '2023-09-02 00:00:00') ||
            ($date > '2023-09-02 00:00:00' && $date < '2023-09-11 00:00:00'))
        <link rel="stylesheet" href="{{ url('css/client/payment.css') }}">
    @else
        <link rel="stylesheet" href="{{ url('css/client/pending.css') }}">
    @endif
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    @if (
        $date < '2023-08-12 00:00:00' ||
            ($date > '2023-08-12 00:00:00' && $date < '2023-09-02 00:00:00') ||
            ($date > '2023-09-02 00:00:00' && $date < '2023-09-11 00:00:00'))
        <div class="container-wrapper">
            <div class="container">
                <div class="konten">
                    <img class="checklist" src="{{ url('/assets/img/checklist.gif') }}" alt="" />
                    <div class="text">
                        <h1 class="text--h1">
                            Lakukan
                        </h1>
                        <h1 class="text--hcolor">Pembayaran</h1>
                        <p class="text--p">
                            Lakukan pembayaran dengan cara transfer sebesar
                            @if (Auth::user()->role == 'olymp')
                                @if ($date < '2023-08-12 00:00:00')
                                    Rp. 65.000
                                @elseif ($date > '2023-08-12 00:00:00' && $date < '2023-09-02 00:00:00')
                                    Rp. 75.000
                                @elseif ($date > '2023-09-02 00:00:00' && $date < '2023-09-11 00:00:00')
                                    Rp. 85.000
                                @endif
                            @else
                                @if ($date < '2023-08-12 00:00:00')
                                    Rp. 60.000
                                @elseif ($date > '2023-08-12 00:00:00' && $date < '2023-09-02 00:00:00')
                                    Rp. 70.000
                                @elseif ($date > '2023-09-02 00:00:00' && $date < '2023-09-11 00:00:00')
                                    Rp. 80.000
                                @endif
                            @endif
                            ke rekening berikut :
                            <br>&#8226; &nbsp;Raudina Hibati Sani-BSI 7163848621
                            <br>&#8226; &nbsp;Raudina Hibati Sani-BNI 1456050444
                            <br>&#8226; &nbsp;Raudina-Gopay/Dana/Shopeepay
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;085334330164
                            <br>
                            Kemudian konfirmasi pembayaran
                            dengan cara unggah bukti pembayaran pada kolom di bawah.
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
    @else
        <div class="container">
            <div class="konten">
                <img class="hourglass" src="{{ url('/assets/img/calendar.gif') }}" alt="" />
                <div class="text">
                    <h1 class="text--h1">
                        Pendaftaran belum dibuka
                    </h1>
                    <p class="text--p">
                        Mohon maaf, pendaftaran belum dibuka. <br> Silakan cek kembali di tanggal yang telah ditentukan.
                    </p>
                    <a href="{{ route('home') }}" class="button btn-primary"
                        style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 20px">Back to
                        Home</a>
                </div>
            </div>
            <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
        </div>
    @endif
@endsection
