@php
    $date = date('Y-m-d H:i:s');
@endphp

@extends('layouts.main')

@section('title', config('app.name') . ' | Register Olympiad')

@section('styles')
    @if (
        $date < '2023-08-05 00:00:00' ||
            ($date > '2023-08-12 00:00:00' && $date < '2023-08-26 00:00:00') ||
            ($date > '2023-09-02 00:00:00' && $date < '2023-09-11 00:00:00'))
        <link rel="stylesheet" href="{{ url('css/auth/reg.css') }}">
    @else
        <link rel="stylesheet" href="{{ url('css/client/pending.css') }}">
    @endif
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
@endsection
@section('content')
    @if (
        $date < '2023-08-05 00:00:00' ||
            ($date > '2023-08-12 00:00:00' && $date < '2023-08-26 00:00:00') ||
            ($date > '2023-09-02 00:00:00' && $date < '2023-09-11 00:00:00'))
        <div class="container">
            {{-- <div class="head-nav">
            <a href="" class="nav-olim">
                <div class="icon icon-olim">
                    <img class="icon" src="images/icon_olympiad_colored.png", alt="images/placeholder.png">
                </div>
            </a>
            <a href="" class="nav-uiux">
                <div class="icon icon-uiux">
                    <img class="icon" src="images/icon_uiux.png", alt="images/placeholder.png">
                </div>
            </a>
        </div> --}}


            <div class="konten">
                <form action="{{ route('account.store') }}" method="post" style="width: 100%">
                    @csrf
                    <div class="tabs-menu">
                        <div class="radio-wrapper">
                            <label class="custom-radio-button__container tab-link radio-olim">
                                <input type="radio" name="role" value="olymp" id="olymp"
                                    {{ old('role') === 'olymp' ? 'checked' : '' }}>
                                <span class="custom-radio-button">
                                    <div class="tab-circle">
                                        <svg class="svg-olim" width="22" height="22" viewBox="0 0 22 22"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.55556 21H15.4444M11 21V16.2941C7.93176 16.2941 5.44444 13.6605 5.44444 10.4118V1H16.5556V10.4118C16.5556 11.736 16.1423 12.958 15.4449 13.9412M16.5556 3.35294H18.2222C19.7563 3.35294 21 4.66975 21 6.29412C21 7.91848 19.7563 9.23529 18.2222 9.23529H16.5556M5.44444 9.23529H3.77778C2.24366 9.23529 1 7.91848 1 6.29412C1 4.66975 2.24366 3.35294 3.77778 3.35294H5.44444"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_447_5499" x1="11" y1="1"
                                                    x2="11" y2="21" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="0.0001" stop-color="#64EA90" stop-opacity="0.989583" />
                                                    <stop offset="0.9999" stop-color="#1789FC" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="tab-label label-olim">
                                        <p>Olympiad</p>
                                    </div>
                                </span>
                            </label>
                            <label class="custom-radio-button__container tab-link radio-uiux">
                                <input type="radio" name="role" value="uiux"
                                    {{ old('role') === 'uiux' ? 'checked' : '' }}>
                                <span class="custom-radio-button">
                                    <div class="tab-circle">
                                        <svg class="svg-uiux" width="26" height="25" viewBox="0 0 26 25"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path class="paint0"
                                                    d="M24.2691 3.73579C24.2803 3.06851 24.0386 2.45323 23.5888 2.00336C23.3446 1.75929 22.9489 1.75929 22.7049 2.00339C22.4608 2.24748 22.4608 2.6432 22.7049 2.88726C22.9131 3.09545 23.0247 3.38936 23.0193 3.71489C23.0141 4.02545 22.8966 4.32532 22.7049 4.51704C22.3072 4.9147 18.3433 8.39473 15.2475 11.1025L14.4888 10.3438C16.7488 7.75795 19.5534 4.56054 20.6504 3.34648L20.9 3.59607C21.1441 3.84017 21.5398 3.8402 21.7838 3.59614C22.028 3.35207 22.028 2.95636 21.7839 2.71226L21.0751 2.00342C20.958 1.8862 20.799 1.82032 20.6332 1.82032H20.6332C20.4674 1.82032 20.3085 1.88617 20.1912 2.00336C19.8109 2.38367 17.4844 5.02601 15.3852 7.42151C14.8207 6.56704 14.0667 5.83198 13.1698 5.26773C11.8589 4.44301 10.3305 4.02486 8.6272 4.02486C8.25249 4.02486 7.88177 4.04848 7.52542 4.09514C7.18314 4.13995 6.94202 4.4537 6.9868 4.79598C7.03161 5.13823 7.34533 5.37936 7.68761 5.33457C7.99039 5.29495 8.30652 5.27486 8.62717 5.27486C11.2207 5.27486 13.3963 6.43761 14.5245 8.40442C13.4717 9.60739 12.5672 10.6435 12.131 11.1434C11.3524 11.2495 10.7713 11.5682 10.3616 12.1146C9.98074 12.6227 9.81377 13.2294 9.63702 13.8718C9.42389 14.6464 9.20352 15.4473 8.57505 16.0757C8.39627 16.2545 8.3428 16.5233 8.43955 16.7569C8.5363 16.9904 8.76421 17.1427 9.01699 17.1427C10.699 17.1427 12.0322 16.7842 12.9795 16.0771C13.8331 15.4399 14.342 14.5352 14.4623 13.4488C16.0727 12.0424 23.0112 5.97848 23.5887 5.40092C24.0105 4.9792 24.2585 4.37226 24.2691 3.73579ZM14.3043 11.9271C14.1165 12.0912 13.9345 12.2503 13.7594 12.4031L13.1887 11.8325C13.3415 11.6574 13.5005 11.4752 13.6645 11.2874L14.3043 11.9271ZM12.2317 15.0754C11.7401 15.4424 11.0859 15.6869 10.2783 15.8067C10.5531 15.2542 10.7073 14.694 10.8422 14.2034C11.1319 13.1506 11.3084 12.6223 12.0222 12.4337L13.1762 13.5877C13.0491 14.202 12.733 14.7012 12.2317 15.0754Z" />
                                                <path class="paint1"
                                                    d="M5.57385 5.93575C5.66488 5.93575 5.75735 5.91575 5.84482 5.87359C5.90091 5.84653 5.95854 5.81994 6.01604 5.79459C6.33182 5.65519 6.47482 5.28619 6.33541 4.9704C6.19601 4.65465 5.82704 4.51165 5.51123 4.65103C5.44101 4.68203 5.3706 4.71453 5.30195 4.74762C4.99104 4.89753 4.86051 5.27112 5.01038 5.58203C5.11813 5.80547 5.34135 5.93575 5.57385 5.93575Z" />
                                                <path class="paint2"
                                                    d="M10.0904 17.8376C9.74551 17.8342 9.46226 18.1103 9.45835 18.4555C9.43139 20.8582 9.06867 21.9301 6.99073 21.9301C5.82586 21.9301 4.60336 21.0779 3.63673 19.5922C2.57089 17.9538 1.98389 15.8267 1.98389 13.6027C1.98389 10.7154 2.85576 8.31305 4.43892 6.83818C4.69148 6.6029 4.70548 6.2074 4.4702 5.95484C4.23492 5.70227 3.83942 5.68827 3.58686 5.92355C2.65432 6.79234 1.93279 7.92115 1.44226 9.27865C0.972199 10.5795 0.733887 12.0343 0.733887 13.6027C0.733887 16.0659 1.39273 18.4351 2.58898 20.2738C3.79057 22.1208 5.39498 23.1801 6.99073 23.1801C8.51701 23.1801 9.58079 22.643 10.1524 21.5838C10.6433 20.6743 10.6967 19.4994 10.7083 18.4695C10.7121 18.1244 10.4355 17.8414 10.0904 17.8376Z" />
                                                <path class="paint3"
                                                    d="M13.166 8.58027C13.166 7.43214 12.2319 6.49805 11.0837 6.49805C9.93559 6.49805 9.00146 7.43214 9.00146 8.58027C9.00146 9.72842 9.93559 10.6625 11.0837 10.6625C12.2319 10.6625 13.166 9.72842 13.166 8.58027ZM10.2515 8.58027C10.2515 8.12136 10.6248 7.74805 11.0837 7.74805C11.5427 7.74805 11.916 8.12136 11.916 8.58027C11.916 9.0392 11.5427 9.41255 11.0837 9.41255C10.6248 9.41252 10.2515 9.03917 10.2515 8.58027Z" />
                                                <path class="paint4"
                                                    d="M6.12131 11.4125C7.26947 11.4125 8.20356 10.4784 8.20356 9.3303C8.20356 8.18214 7.26947 7.24805 6.12131 7.24805C4.97316 7.24805 4.03906 8.18214 4.03906 9.3303C4.03906 10.4784 4.97316 11.4125 6.12131 11.4125ZM6.12131 8.49805C6.58022 8.49805 6.95356 8.87139 6.95356 9.3303C6.95356 9.7892 6.58022 10.1625 6.12131 10.1625C5.66241 10.1625 5.28906 9.7892 5.28906 9.3303C5.28906 8.87139 5.66244 8.49805 6.12131 8.49805Z" />
                                                <path class="paint5"
                                                    d="M6.60835 14.1135C6.60835 12.9654 5.67425 12.0312 4.5261 12.0312C3.37794 12.0312 2.44385 12.9654 2.44385 14.1135C2.44385 15.2617 3.37794 16.1957 4.5261 16.1957C5.67425 16.1957 6.60835 15.2617 6.60835 14.1135ZM4.5261 14.9458C4.06719 14.9458 3.69385 14.5724 3.69385 14.1135C3.69385 13.6546 4.06719 13.2812 4.5261 13.2812C4.985 13.2812 5.35835 13.6546 5.35835 14.1135C5.35835 14.5724 4.985 14.9458 4.5261 14.9458Z" />
                                                <path class="paint6"
                                                    d="M6.71406 21.0687C7.86221 21.0687 8.79634 20.1346 8.79634 18.9865C8.79634 17.8384 7.86221 16.9043 6.71406 16.9043C5.56593 16.9043 4.63184 17.8384 4.63184 18.9865C4.63184 20.1346 5.56593 21.0687 6.71406 21.0687ZM6.71406 18.1543C7.17299 18.1543 7.54634 18.5276 7.54634 18.9865C7.54634 19.4454 7.17299 19.8187 6.71406 19.8187C6.25518 19.8187 5.88184 19.4454 5.88184 18.9865C5.88184 18.5276 6.25518 18.1543 6.71406 18.1543Z" />
                                            </g>
                                            <defs>
                                                <linearGradient id="paint0_linear_447_5504" x1="15.6255" y1="1.82031"
                                                    x2="15.6255" y2="17.1427" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_447_5504" x1="5.66852" y1="4.59766"
                                                    x2="5.66852" y2="5.93575" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_447_5504" x1="5.72109" y1="5.75586"
                                                    x2="5.72109" y2="23.1801" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                                <linearGradient id="paint3_linear_447_5504" x1="11.0837" y1="6.49805"
                                                    x2="11.0837" y2="10.6625" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                                <linearGradient id="paint4_linear_447_5504" x1="6.12131" y1="7.24805"
                                                    x2="6.12131" y2="11.4125" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                                <linearGradient id="paint5_linear_447_5504" x1="4.5261" y1="12.0312"
                                                    x2="4.5261" y2="16.1957" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                                <linearGradient id="paint6_linear_447_5504" x1="6.71409" y1="16.9043"
                                                    x2="6.71409" y2="21.0687" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#65EB8F" />
                                                    <stop offset="1" stop-color="#1789FC" />
                                                </linearGradient>
                                                <clipPath id="clip0_447_5504">
                                                    <rect width="25" height="25" fill="white"
                                                        transform="translate(0.00146484)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="tab-label label-uiux">
                                        <p>UI/UX</p>
                                    </div>
                                </span>
                            </label>
                        </div>
                        @if ($errors->has('role'))
                            <div style="display:flex; justify-content:center">
                                <p class="text-danger">{{ $errors->first('role') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="title">
                        <h2>
                            Daftar
                        </h2>
                        <p class="log-in">
                            Silakan isi kolom di bawah ini untuk mendaftar
                        </p>
                    </div>
                    <div class="reg-form form-wrap">
                        <div class="field">
                            <div class="field-left">
                                <div class="form-group">
                                    <label class="form-label" for="nama_tim">Nama Tim</label>
                                    <input type="text" class="form-control" name="nama_tim" id="nama_tim"
                                        placeholder="Nama Tim" value="{{ old('nama_tim') }}">
                                    @if ($errors->has('nama_tim'))
                                        <span class="text-danger">{{ $errors->first('nama_tim') }}</span>
                                    @else
                                        <span class="text-danger">&nbsp;</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @else
                                        <span class="text-danger">&nbsp;</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-with-icon">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="password">
                                        <span class="eye" onclick="showp()">
                                            <i id="hide1" class="fa fa-light fa-eye"></i>
                                            <i id="hide2" class="fa fa-sharp fa-light fa-eye-slash"></i>
                                        </span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @else
                                        <span class="text-danger">&nbsp;</span>
                                    @endif
                                </div>
                            </div>
                            <div class="field-right">

                                <div class="form-group">
                                    <label class="form-label" for="provinsi">Provinsi Sekolah</label>
                                    <select name="provinsi" id="province" class="form-control">
                                        <option class="disabled" selected="true" disabled="disabled">Pilih Provinsi
                                        </option>
                                        @foreach ($provincies as $province)
                                            <option value="{{ $province['id'] }}">{{ $province['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('provinsi'))
                                        <span class="text-danger">{{ $errors->first('provinsi') }}</span>
                                    @else
                                        <span class="text-danger">&nbsp;</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kabupaten">Kota/Kabupaten</label>
                                    <select name="kabupaten" id="city" class="form-control">
                                        <option class="disabled" selected="true" disabled="disabled">Pilih Kota</option>
                                    </select>
                                    @if ($errors->has('kabupaten'))
                                        <span class="text-danger">{{ $errors->first('kabupaten') }}</span>
                                    @else
                                        <span class="text-danger">&nbsp;</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="asal_sekolah">Nama Sekolah</label>
                                    <input type="text" class="form-control" name="asal_sekolah" id="sekolah"
                                        placeholder="Nama Sekolah" value="{{ old('nama_tim') }}">
                                    @if ($errors->has('asal_sekolah'))
                                        <span class="text-danger">{{ $errors->first('asal_sekolah') }}</span>
                                    @else
                                        <span class="text-danger">&nbsp;</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="button button-reg btn-primary">Daftar</button>
                    </div>
                </form>
                <div class="login-text">
                    <p class=login-p>Sudah punya akun?</p>
                    <a class=login-a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Dynamic Dropdown Dependency city
            $(document).ready(function() {
                $('#province').change(function() {
                    var provinceId = $(this).val();
                    var url = "{{ route('citiesByProvince', ':provinceId') }}";
                    url = url.replace(':provinceId', provinceId);

                    $.get(url, function(data) {
                        var cityOptions =
                            '<option class="disabled" selected="true" disabled="disabled">Pilih Kota</option>';

                        $.each(data, function(index, city) {
                            cityOptions += '<option value="' + city.id + '">' + city.name +
                                '</option>';
                        });

                        $('#city').html(cityOptions);
                    });
                });
            });

            function showp() {
                var x = document.getElementById("password");
                var y = document.getElementById("hide1");
                var z = document.getElementById("hide2");

                if (x.type === 'password') {
                    x.type = "text";
                    y.style.display = "block";
                    z.style.display = "none";
                } else {
                    x.type = "password";
                    y.style.display = "none";
                    z.style.display = "block";
                }
            }
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
