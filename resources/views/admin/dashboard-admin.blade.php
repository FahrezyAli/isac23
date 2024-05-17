@extends('layouts.main')

@section('title', config('app.name') . ' | Admin ISAC 23')

@section('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            background-color: #3f4b4d;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #0e8385;
            border-radius: 50rem;
        }

        ::-webkit-scrollbar-track {
            background-color: rgba(#0e8385, 0.05);
        }

        body {
            background-color: #C8C8C0 !important;
            font-family: Poppins;
        }

        .card:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }
    </style>
@endsection


@section('content')

    {{-- kotakan tengah --}}

    <div class="d-flex justify-content-center mt-5">
        <div class="col-6">
            <a class="card" href="{{ route('tabel-verify') }}"
                style="width: 30rem;margin-top:120px;padding-right:10px; padding-left:10px;background-color:#65806D; border-radius: 15px;text-decoration: none">
                <div style="text-align: center; color:black" class="card-header">User Terdaftar</div>
                <div class="card-body">
                    <h5 style="text-align: center;color:black" class="card-title"><b>{{ $accounts }}</b></h5>
                </div>
            </a>

            <a class="card" href="{{ route('tabel-olympiad') }}"
                style="width: 30rem;margin-top:120px;padding-right:10px; padding-left:10px;background-color:#65806D; border-radius: 15px;text-decoration: none">
                <div style="text-align: center;color:black" class="card-header">User Terdaftar Olympiad</div>
                <div class="card-body">
                    <h5 style="text-align: center;color:black" class="card-title"><b>{{ $olympiad }} ({{ $olympiadVerified }} terverifikasi)</b></h5>
                </div>
            </a>

        </div>

        <div style="color:black" class="col-4">
            <a class="card" href="{{ route('tabel-verify') }}"
                style="width: 30rem;margin-top:120px;padding-right:10px; padding-left:10px;background-color:#65806D; border-radius: 15px;text-decoration: none">
                <div style="text-align: center;color:black" class="card-header">Jumlah Peserta</div>
                <div class="card-body">
                    <h5 style="text-align: center;color:black" class="card-title"><b>{{ $participants }}</b></h5>
                </div>
            </a>

            <a class="card" href="{{ route('tabel-uiux') }}"
                style="width: 30rem;margin-top:120px;padding-right:10px; padding-left:10px;background-color:#65806D; border-radius: 15px;text-decoration: none">
                <div style="text-align: center;color:black  font-family: 'Poppins', sans-serif;" class="card-header">User
                    Terdaftar UI/UX</div>
                <div class="card-body">
                    <h5 style="text-align: center;color:black  font-family: 'Poppins', sans-serif;" class="card-title"><b>{{ $uiux }}
                            ({{ $uiuxVerified }} terverifikasi)</b></h5>
                </div>
            </a>
        </div>

    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
@endsection
