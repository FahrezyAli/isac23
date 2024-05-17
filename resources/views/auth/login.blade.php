@extends('layouts.main')

@section('title', config('app.name') . ' | Login')


@section('styles')
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
    <link rel="stylesheet" href="{{ url('css/auth/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
@endsection
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="toast active">
                <div class="toast-content">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M30 15C30 23.2842 23.2842 30 15 30C6.71572 30 0 23.2842 0 15C0 6.71572 6.71572 0 15 0C23.2842 0 30 6.71572 30 15ZM21.0455 10.4545C21.4848 10.8938 21.4848 11.6062 21.0455 12.0455L13.5455 19.5455C13.1061 19.9848 12.3939 19.9848 11.9545 19.5455L8.9545 16.5455C8.51517 16.1061 8.51517 15.3939 8.9545 14.9545C9.39384 14.5152 10.1062 14.5152 10.5455 14.9545L12.75 17.1589L16.1022 13.8068L19.4545 10.4545C19.8939 10.0152 20.6061 10.0152 21.0455 10.4545Z"
                            fill="#0e8385" />
                    </svg>
                    <div class="message">
                        <span class="text text-1">Registrasi Berhasil</span>
                        <span class="text text-2">{{ Session::get('success') }}</span>
                    </div>
                </div>
                <svg class="close" width="23px" height="23px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z"
                        fill="#0F0F0F" />
                </svg>
                <div class="progress active"></div>
            </div>
        @endif
        @if (session('failed'))
            <div class="toast active">
                <div class="toast-content">
                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.5003 30.0827C23.5547 30.0827 30.0837 23.5537 30.0837 15.4993C30.0837 7.44497 23.5547 0.916016 15.5003 0.916016C7.44595 0.916016 0.916992 7.44497 0.916992 15.4993C0.916992 23.5537 7.44595 30.0827 15.5003 30.0827ZM13.3128 22.7779C13.3128 21.5135 14.2739 20.6035 15.4872 20.6035C16.7268 20.6035 17.6878 21.5135 17.6878 22.7779C17.6878 24.0423 16.7268 24.9785 15.4872 24.9785C14.2739 24.9785 13.3128 24.0423 13.3128 22.7779ZM14.2928 6.74935C14.1944 6.74945 14.0971 6.76947 14.0066 6.80819C13.9162 6.84691 13.8345 6.90354 13.7665 6.97466C13.6985 7.04578 13.6456 7.12993 13.611 7.22204C13.5764 7.31414 13.5608 7.4123 13.5651 7.5106L14.0114 17.7189C14.0196 17.9067 14.1001 18.084 14.236 18.2139C14.3718 18.3438 14.5526 18.4162 14.7405 18.416H16.2616C16.4495 18.4162 16.6303 18.3438 16.7662 18.2139C16.902 18.084 16.9825 17.9067 16.9907 17.7189L17.4355 7.5106C17.4399 7.41218 17.4242 7.3139 17.3895 7.2217C17.3548 7.12949 17.3018 7.04528 17.2336 6.97413C17.1655 6.90299 17.0836 6.84639 16.993 6.80776C16.9024 6.76912 16.8049 6.74925 16.7064 6.74935H14.2928Z"
                            fill="#DE541E" />
                    </svg>

                    <div class="message">
                        <span class="text text-1">Login Gagal</span>
                        <span class="text text-2">{{ Session::get('failed') }}</span>
                    </div>
                </div>
                <svg class="close" width="23px" height="23px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z"
                        fill="#0F0F0F" />
                </svg>
                <div class="progress active progress-danger"></div>
            </div>
        @endif
        {{-- @if (session('success'))
            <div class="alert alert--success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert--danger" role="alert">
                {{ Session::get('failed') }}
            </div>
        @endif --}}
        <div class="container--left">
            <div class="konten">
                <div class="title">
                    <h2>Selamat Datang!</h2>
                    <p class="log-in">
                        Silakan login terlebih dahulu
                    </p>
                </div>
                <form action="{{ route('doLogin') }}" class="login-form" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="username">Nama Tim</label>
                        <input value="{{ old('nama_tim') }}" type="text" class="form-control" name="nama_tim"
                            id="username" placeholder="Nama Tim">
                        @if ($errors->has('nama_tim'))
                            <span class="text-danger">{{ $errors->first('nama_tim') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-with-icon">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                            <span class="eye" onclick="showp()">
                                <i id="hide1" class="fa fa-light fa-eye"></i>
                                <i id="hide2" class="fa fa-sharp fa-light fa-eye-slash"></i>
                            </span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="button button-reg btn-primary">Login</button>
                </form>
                <div class="login-text">
                    <p class=login-p>Belum punya akun?</p>
                    <a class=login-a href="{{ route('register') }}">Daftar di sini</a>
                </div>
            </div>
        </div>
        <div class="container--right">
            <img src="{{ asset('assets/img/logoisac.png') }}" alt="images/placeholder.png" class="isac--logo">
        </div>
    </div>
    <script>
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
    <script>
        const button = document.querySelector("button"),
            toast = document.querySelector(".toast");
        (closeIcon = document.querySelector(".close")),
        (progress = document.querySelector(".progress"));

        let timer1, timer2;

        timer1 = setTimeout(() => {
            toast.classList.remove("active");
        }, 5000);



        button.addEventListener("click", () => {
            toast.classList.add("active");
            progress.classList.add("active");

            timer1 = setTimeout(() => {
                toast.classList.remove("active");
            }, 5000);

            timer2 = setTimeout(() => {
                progress.classList.remove("active");
            }, 5300);
        });

        closeIcon.addEventListener("click", () => {
            toast.classList.remove("active");

            setTimeout(() => {
                progress.classList.remove("active");
            }, 300);

            clearTimeout(timer1);
            clearTimeout(timer2);
        });
    </script>
@endsection
