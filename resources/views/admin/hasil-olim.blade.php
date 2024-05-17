@extends('layouts.main')

@section('title', config('app.name') . ' | Admin ISAC 23')

@section('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        body {
            background-color: #C8C8C0 !important;
            font-family: Poppins;
        }

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

        .modal__container {
            position: absolute;
            top: 0;
            left: 0;
            background-color: hsla(240, 18%, 75%, .8);
            width: 100%;
            height: 100%;
            display: grid;
            align-items: flex-end;
            overflow: hidden;
            transition: all .3s;
            z-index: 1000;
            visibility: hidden;
            opacity: 0;
        }

        .modal__content {
            position: relative;
            background-color: white;
            text-align: center;
            padding: 3rem 2rem 2rem;
            border-radius: 1rem 1rem 0 0;
            transition: all .3s;
            transform: translateY(10%);
        }

        .modal__img {
            width: 150px;
            margin-bottom: .75rem;
        }

        .modal__close {
            display: inline-flex;
            background-color: hsl(240, 16%, 18%);
            border-radius: .25rem;
            color: #FFF;
            font-size: 1.5rem;
            position: absolute;
            top: 2rem;
            right: 2rem;
            cursor: pointer;
        }

        .modal__title {
            color: hsl(240, 8%, 15%);
            font-weight: 500;
            font-size: 1.25rem;
        }

        .modal__description {
            font-size: .875rem;
            margin-bottom: 1.5rem;
        }

        .modal__button {
            display: inline-block;
            background-color: #5C7764;
            color: #FAF5E7;
            border: none;
            padding: .5rem .25rem;
            border-radius: .5rem;
            transition: .3s;
        }

        .modal__button:hover {
            background-color: #769980;
        }

        .modal__button-width {
            width: 90%;
        }

        .modal__button-link {
            display: block;
            margin: 1rem auto 0;
            background-color: transparent;
            color: hsl(240, 16%, 18%);
            font-weight: 500;

            border: 1px solid transparent;
        }

        .modal__button-link:hover {
            color: #5C7764;
            text-decoration: underline;
        }

        .show-modal {
            visibility: visible;
            opacity: 1;
        }

        .show-modal .modal__content {
            transform: translateY(0);
        }

        @media screen and (min-width: 576px) {
            .modal__content {
                margin: auto;
                width: 500px;
                border-radius: 1.25rem;
            }

            .modal__img {
                width: 240px;
            }
        }

        .team-name:hover {
            text-decoration: underline;
            text-decoration-color: #1789fc;
            cursor: pointer;
            background: linear-gradient(90deg, #65eb8f, #1789fc);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            box-sizing: border-box;
        }
    </style>
@endsection


@section('content')

    {{-- atas tabel --}}
    <div style="display: flex; align-items: center; font-size: 50px; margin-top: 120px; margin-left: 170px;">

        <div style="flex-grow: 1;">
            <span style="font-size: 50px;">Hasil Olympiad</span>
        </div>
        <div style="display: flex; align-items: center;margin-right: 170px;">


            <div class="dropdown" style="display: inline-block;">
                <select class="form-select" aria-label="Default select example" id="filterMenu">
                    <option value="0" selected="" onclick="filter()">
                        Show All ({{ $accounts->count() }})</option>
                    <option value="1" onclick="filter()">
                        Penyisihan ({{ $accounts->where('status', 'penyisihan')->count() }})
                    </option>
                    <option value="2" onclick="filter()">
                        Semifinalis ({{ $accounts->where('status', 'semifinalis')->count() }})
                    </option>
                    <option value="2" onclick="filter()">
                        Finalis ({{ $accounts->where('status', 'finalis')->count() }})
                    </option>
                    <option value="3" onclick="filter()">
                        Gagal Saat Penyisihan ({{ $accounts->where('status', 'gagal_penyisihan')->count() }})
                    </option>
                    <option value="4" onclick="filter()">
                        Gagal Saat Semifinal ({{ $accounts->where('status', 'gagal_semifinal')->count() }})
                    </option>
                </select>
            </div>
        </div>
    </div>
    <hr style="margin-right: 150px; margin-left: 150px;">
    <div style="padding-left: 70px; padding-right: 70px; padding-top:20px">
        {{-- tabel --}}
        <table style="border: 3px solid #000 !important;width: 100%" class="table table-bordered" id="tabel-verifikasi">
            <thead>
                <tr>
                    <th style="text-align: center" scope="col" rowspan="2">No</th>
                    <th style="text-align: center;width: 30%" scope="col" rowspan="2">Nama Tim</th>
                    <th style="text-align: center" scope="col" rowspan="2"><a class="team-name"
                            style="text-decoration: none;color:black" href="{{ route('hasil_olim_penyisihan_desc') }}">
                            Nilai Penyisihan</a></th>
                    <th style="text-align: center" colspan="3" scope="col">Nilai Semifinal</th>
                    <th style="text-align: center" scope="col" rowspan="2">Status</th>
                    <th style="text-align: center" scope="col" rowspan="2">Sertifikat</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td style="text-align: center"><b>Pilihan Ganda</b></td>
                    <td style="text-align: center"><b>Essay</b></td>
                    <td style="text-align: center"><a class="team-name"
                            style="text-decoration: none;color:black;font-weight:bold"
                            href="{{ route('hasil_olim_semifinal_desc') }}">Total</a></td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($accounts as $account)
                    @php
                        $nilai_total = 0;
                        $nilai_total = $nilai_total + $account->nilai_semifinal + $account->nilai_essay;
                    @endphp
                    <tr>
                        <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                        <td style="text-align: center"><a class="team-name" href="/admin/{{ $account->id }}/info"
                                style="text-decoration: none;color:black">{{ $account->nama_tim }}</a></td>
                        <td style="text-align: center">
                            <a class="team-name" href="/admin/hasil/olympiad/penyisihan/{{ $account->id }}"
                                style="text-decoration: none;color:black">
                                {{ is_null($account->nilai_penyisihan) ? '-' : $account->nilai_penyisihan . '/122' }}
                            </a>
                        </td>
                        <td style="text-align: center">
                            <a class="team-name" href="/admin/hasil/olympiad/semifinal/{{ $account->id }}"
                                style="text-decoration: none;color:black">
                                {{ is_null($account->nilai_semifinal) ? '-' : $account->nilai_semifinal }}
                            </a>
                        </td>
                        <td style="text-align: center"><a class="team-name"
                                href="/admin/hasil/olympiad/penilaian-essay/{{ $account->id }}"
                                style="text-decoration: none;color:black">
                                {{ is_null($account->nilai_essay) ? '-' : $account->nilai_essay }}
                            </a></td>
                        <td style="text-align: center">
                            {{ is_null($nilai_total) ? '-' : $nilai_total . '/129' }}
                        </td>
                        <td style="text-align: center">
                            @switch($account->status)
                                @case('penyisihan')
                                    Penyisihan
                                @break

                                @case('semifinalis')
                                    Semifinalis
                                @break

                                @case('finalis')
                                    Finalis
                                @break

                                @case('gagal_penyisihan')
                                    Gagal di Penyisihan
                                @break

                                @case('gagal_semifinal')
                                    Gagal di Semifinal
                                @break

                                @default
                                    -
                            @endswitch
                        </td>
                        <td style="text-align: center">
                            @php
                                $sum = 0;
                                foreach ($account->students as $student) {
                                    if ($student->sertifikat != null) {
                                        $sum++;
                                    }
                                }
                            @endphp
                            <a class="team-name" href="/admin/{{ $account->id }}/info"
                                style="text-decoration: none;color:black">
                                {{ $sum . '/1' }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            const alert = bootstrap.Alert.getOrCreateInstance('#success-alert')
            setTimeout(function() {
                // Closing the alert
                alert.close();
            }, 2250);
        })
    </script>

    <script>
        function filter() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filterMenu");
            filter = input.value;
            table = document.getElementById("tabel-verifikasi");
            tr = table.getElementsByTagName("tr");

            //value="0" Show All
            //value="1">Unverified Olympiad
            //value="2">Unverified UIUX
            //value="3">Verified Olympiad
            //value="4">Verified UIUX
            for (i = 2; i < tr.length; i++) {
                tr[i].style.display = "";
            }

            for (i = 2; i < tr.length; i++) {
                tdOlymp = tr[i].getElementsByTagName("td")[1].innerText;
                tdUIUX = tr[i].getElementsByTagName("td")[3].innerText;
                switch (filter) {
                    case "0":
                        tr[i].style.display = "";
                        break;
                    case "1":
                        if (tdOlymp != "" && tdOlymp != 'verified') {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        break;
                    case '2':
                        if (tdUIUX != "" && tdUIUX != 'verified') {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        break;
                    case '3':
                        if (tdOlymp != "" && tdOlymp == 'verified') {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        break;
                    case '4':
                        if (tdUIUX != "" && tdUIUX == 'verified') {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        break;
                    default:
                }
            }
        }

        document.onload = filter();
    </script>

@endsection
