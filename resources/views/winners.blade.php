@extends('layouts.main')

@section('title', config('app.name') . ' | Congratulations!')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/winners.css') }}">

@endsection

@section('content')
    <div class="page-wrapper">
        <div class="main-wrapper">
            <div class="section">
                <div class="page-padding">
                    <div class="container-small">
                        <center>
                            <h1 class="congrats">Congratulations to all the winners of ISAC 2023!</h1>
                            <div class="nav-juara">
                                <div class="active" id="olympiad">Olympiad</div>
                                <div id="uiux">UI/UX</div>
                            </div>
                            <center>
                                <div class="juara">
                                    <div class="juara juara-dua">
                                        <img class="icon-juara" src="{{ url('/assets/svg/juara-2.svg') }}" alt="" />

                                        <h1 id="tim-2">
                                            Hehe
                                        </h1>
                                        <h2 id="peserta-2">
                                            Rafaina Erin Sadia
                                        </h2>
                                        <h2 id="peserta-2-uiux">
                                            
                                        </h2>
                                        <h2 id="sekolah-2">MAN IC Pasuruan</h2>
                                    </div>
                                    <div class="juara juara-satu">
                                        <img class="icon-juara" src="{{ url('/assets/svg/juara-1.svg') }}" alt="" />
                                        <h1 id="tim-1">
                                            Moesa
                                        </h1>
                                        <h2 id="peserta-1">
                                            M. Aryasatya Arifien
                                        </h2>
                                        <h2 id="peserta-1-uiux">
                                            
                                        </h2>
                                        <h2 id="sekolah-1">SMA Negeri 1 Yogyakarta</h2>
                                    </div>
                                    <div class="juara juara-tiga">
                                        <img class="icon-juara" src="{{ url('/assets/svg/juara-3.svg') }}" alt="" />
                                        <h1 id="tim-3">
                                            Valisha
                                        </h1>
                                        <h2 id="peserta-3">
                                            Valisha Vine Ravelina
                                        </h2>
                                        <h2 id="peserta-3-uiux">
                                            
                                        </h2>
                                        <h2 id="sekolah-3">SMA Negeri 1 Glagah</h2>
                                    </div>
                                </div>
                            </center>

                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script>
        const olympiad = document.getElementById('olympiad');
        const uiux = document.getElementById('uiux');


        olympiad.addEventListener('click', function() {

            uiux.classList.remove('active');

            olympiad.classList.add('active');

            document.getElementById('tim-1').innerHTML = 'Moesa';
            document.getElementById('peserta-1').innerHTML = 'M. Aryasatya Arifien';
            document.getElementById('peserta-1-uiux').innerHTML = '';
            document.getElementById('sekolah-1').innerHTML = 'SMA Negeri 1 Yogyakarta';

            document.getElementById('tim-2').innerHTML = 'Hehe';
            document.getElementById('peserta-2').innerHTML = 'Rafaina Erin Sadia';
            document.getElementById('peserta-2-uiux').innerHTML = '';
            document.getElementById('sekolah-2').innerHTML = 'MAN IC Pasuruan';

            document.getElementById('tim-3').innerHTML = 'Valisha';
            document.getElementById('peserta-3').innerHTML = 'Valisha Vine Ravelina';
            document.getElementById('peserta-3-uiux').innerHTML = '';
            document.getElementById('sekolah-3').innerHTML = 'SMA Negeri 1 Glagah';
        });

        uiux.addEventListener('click', function() {

            olympiad.classList.remove('active');

            uiux.classList.add('active');

            document.getElementById('tim-1').innerHTML = 'Design Eleven';
            document.getElementById('peserta-1').innerHTML = 'Jovita Edgina';
            document.getElementById('peserta-1-uiux').innerHTML = 'Nadila Nuryadina';
            document.getElementById('sekolah-1').innerHTML = 'SMK Negeri 2 Tasikmalaya';

            document.getElementById('tim-2').innerHTML = 'Kardus Coklat';
            document.getElementById('peserta-2').innerHTML = 'Oryza Valendio';
            document.getElementById('peserta-2-uiux').innerHTML = 'Addonis Ramadhana N.';
            document.getElementById('sekolah-2').innerHTML = 'SMK Telkom Malang';

            document.getElementById('tim-3').innerHTML = 'Team SOC';
            document.getElementById('peserta-3').innerHTML = 'Berliana Maharany';
            document.getElementById('peserta-3-uiux').innerHTML = 'Farrel Kunudhani Yudistira';
            document.getElementById('sekolah-3').innerHTML = 'SMK Negeri 2 Surakarta';
        });
    </script>
@endsection
