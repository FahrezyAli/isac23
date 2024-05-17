@extends('layouts.main')

@section('title', config('app.name') . ' | Admin ISAC 23')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/payment.css') }}">
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
    </style>
@endsection


@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert"
            style="position: fixed; bottom:2.5%; right:2.5%; z-index:900" id="success-alert">

            {!! session()->get('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div style=" padding-bottom: 5rem">
        <div style="font-size: 40px;text-align: center; margin-top:90px; margin-left:35px;margin-right:20px;">
            Info Peserta
        </div>

        {{-- kotakan --}}
        <div class="d-flex justify-content-center mt-5">
            <div class="card"
                style="width: 55rem;padding-right:10px; padding-left:10px;background-color:#FAF5E7; border-radius: 20px;  padding-bottom: 2rem">
                <div style="text-align: left;color:black" class="card-header"><b>{{ $account->nama_tim }}</b></div>
                <div class="card-body">
                    <h5 style="text-align: center;color:black" class="card-title">

                        {{-- kotakan dalemnya --}}
                        <div class="row" style="padding-bottom: 20px">
                            @foreach ($students as $student)
                                <div class="card justify-content-center "
                                    style="width: 20rem; margin: auto; background-image: linear-gradient(180deg, rgba(101, 235, 143, 0.50) 0%, rgba(69, 114, 238, 0.50) 100%);
                                            ; box-shadow: 0 2px 5px; border-radius: 30px">
                                    <img src="{{ filter_var($student->foto_profil, FILTER_VALIDATE_URL) == true ? $student->foto_profil : asset('assets/img/pas.png') }}"
                                        class="card-img-top" alt=""
                                        style="width: 100px; margin: auto; clip-path: circle(); margin-top: 20px">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $student->nama }}</h3>
                                        <p class="card-text">{{ $student->status }}</p>
                                        <div
                                            style="text-align: left; margin-left:20px; margin-top:30px; margin-bottom:20px">
                                            <p class="card-text" style="font-size: 15px">Tanggal Lahir : <a
                                                    style="text-decoration: none;color:black">{{ $student->tgl_lahir }}</a>
                                            </p>
                                            <p class="card-text" style="font-size: 15px">Nomor Whatsapp : <a
                                                    style="text-decoration: none;color:black">{{ $student->telp }}</a></p>
                                            <p class="card-text" style="font-size: 15px">Bukti Siswa Aktif : <a
                                                    href="{{ $student->bukti_siswa }}"
                                                    style="text-decoration: none;color:black"><u>Open File</u></a></p>
                                            <p class="card-text" style="font-size: 15px">Sertifikat :
                                                @if ($student->sertifikat)
                                                    <a href="{{ $student->sertifikat }}"
                                                        style="text-decoration: none;color:black"><u>Open File</u></a>
                                                @else
                                                    <a href="#"style="text-decoration: none;color:black"><u>No
                                                            File</u></a>
                                                @endif
                                            </p>
                                        </div>
                                        <form action="{{ route('store_sertif', ['student' => $student]) }}" method="post"
                                            enctype="multipart/form-data" class="regis-lomba__form">
                                            @csrf
                                            @method('PATCH')
                                            <input class="input--text" type="file" name="sertifikat"
                                                id="sertifikat-{{ $loop->index }}" hidden required
                                                onchange="form.submit()" />
                                            <label for="sertifikat-{{ $loop->index }}" class="button btn-primary"
                                                style="text-decoration: none;font-size: 16px;padding-top: 5px; padding-bottom: 5px">Tambah
                                                Sertifikat
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </h5>
                </div>
                <center>
                    <form action="{{ route('store_kwitansi', ['account' => $account]) }}" method="post"
                        enctype="multipart/form-data" class="regis-lomba__form">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label style="padding-bottom: 0.6rem" class="text--bukti" for="kwitansi"><b>
                                    Kwitansi</b></label>
                            <div class="input--wrap" style="width: max-content">

                                <input class="input--text" type="file" name="kwitansi" id="kwitansi" placeholder=""
                                    hidden required />
                                <label for="kwitansi" class="button btn-primary"
                                    style="font-size: 0.8rem; margin: 5px">Choose
                                    File</label>
                                <span id="file-chosen" style="font-size: 0.8rem">No file chosen</span>
                            </div>
                            <button class="button btn-primary"
                                style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 10px;align-self: flex-end">Submit</button>
                            @if ($account->kwitansi)
                                <div style="padding-top: 1rem">
                                    <a href="{{ $account->kwitansi }}" target="_blank" class="button btn-primary"
                                        style="font-size: 0.8rem; margin: 5px; text-decoration: none">Lihat Kwitansi</a>
                                </div>
                            @endif
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script>
        const actualBtn = document.getElementById('kwitansi');
        const fileChosen = document.getElementById('file-chosen');
        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            const alert = bootstrap.Alert.getOrCreateInstance('#success-alert')
            setTimeout(function() {
                // Closing the alert
                alert.close();
            }, 2250);
        })
    </script>

@endsection
