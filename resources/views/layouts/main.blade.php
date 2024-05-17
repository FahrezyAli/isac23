<!DOCTYPE html>
<html data-wf-page="isac23">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{ asset('assets/svg/favicon.svg') }}" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="canonical" href="" />
    <meta property="og:title" content="Selamat Datang! - ISAC 2023" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta property="og:type" content="website" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">

    @yield('styles')

</head>

<body>
    <nav>
        @if (request()->is('admin/*'))
            <div class="nav-content">
                <a href="{{ route('dashboard_admin') }}" class="alogo"><img src="{{ url('assets/img/logoisac.png') }}"
                        alt="logo.png" class="logo"></a>
                <div class="nav-menu">
                    <div class="h4">
                        Selamat Datang!
                    </div>
                    <div class="nav-list">
                        <a class="nav-name" href="{{ route('tabel-verify') }}">Verify</a>
                    </div>
                    <div class="nav-list usnm-drop">
                        <a class="nav-name">Competitions</a>
                        <div class="usnm-opt">
                            <a href="{{ route('tabel-olympiad') }}">Olympiad</a>
                            <a href="{{ route('tabel-uiux') }}">UI/UX</a>
                        </div>
                    </div>
                    <div class="nav-list usnm-drop">
                        <a class="nav-name">Soal</a>
                        <div class="usnm-opt">
                            <a href="{{ route('list_soal', ['babak' => 'penyisihan']) }}">Penyisihan</a>
                            <a href="{{ route('list_soal', ['babak' => 'semifinal']) }}">Semifinal</a>
                        </div>
                    </div>
                    <div class="nav-list usnm-drop">
                        <a class="nav-name">Hasil</a>
                        <div class="usnm-opt">
                            <a href="{{ route('hasil_olim') }}">Olympiad</a>
                            <a href="{{ route('hasil_uiux') }}">UI/UX</a>
                        </div>
                    </div>

                </div>
            </div>
            <a href="{{ route('doLogout') }}" class="button btn-primary"
                style="text-decoration: none; margin-left: 50px;">Logout</a>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        @else
            <div class="nav-content">
                <a href="/" class="alogo"><img src="{{ url('assets/img/logoisac.png') }}" alt="logo.png"
                        class="logo"></a>


                <div class="nav-menu">


                    @auth
                        <div class="h4">
                            Selamat Datang, {{ Auth::user()->nama_tim }}!
                        </div>
                        {{-- <div class="nav-list">
                            <a href="/">home</a>
                        </div> --}}
                        <div class="nav-list">
                            <a class="nav-name" href="{{ route('profile') }}">Profile</a>
                        </div>
                        <div class="nav-list">
                            <a class="nav-name" href="{{ route('payment') }}">Payments</a>
                        </div>
                        <div class="nav-list">
                            <a class="nav-name" href="{{ route('competition') }}">Competition</a>
                        </div>
                    @else
                        @if (request()->is('/'))
                            <div class="h4">
                                Selamat Datang!
                            </div>
                            <div class="nav-list">
                                <a class="nav-name" href="#about">About</a>
                            </div>
                            <div class="nav-list">
                                <a class="nav-name" href="#events">Events</a>
                            </div>
                            <div class="nav-list">
                                <a class="nav-name" href="/faq">FAQ</a>
                            </div>
                            {{-- <div class="nav-list">
                                <a href="#contacts">contacts</a>
                            </div> --}}
                        @else
                            <div class="h4">
                                Selamat Datang!
                            </div>
                            <div class="nav-list">
                                <a class="nav-name" href="/">About</a>
                            </div>
                            <div class="nav-list">
                                <a class="nav-name" href="/">Events</a>
                            </div>
                            {{-- <div class="nav-list">
                                <a href="/">contacts</a>
                            </div> --}}
                            <div class="nav-list">
                                <a class="nav-name" href="/faq">FAQ</a>
                            </div>
                        @endif
                    @endauth


                    <div class="login">
                        @auth
                            <a href="{{ route('doLogout') }}">Logout</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
            @auth
                <a href="{{ route('doLogout') }}"class="button btn-primary"
                    style="text-decoration: none; margin-left: 30px;">Logout</a>
            @else
                <a href="{{ route('login') }}"class="button btn-primary"
                    style="text-decoration: none; margin-left: 30px;">Login</a>
            @endauth
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        @endif
    </nav>

    @yield('content')

</body>

<script src="{{ asset('script/navbar.js') }}"></script>

</html>
