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

    <div
        style="display: flex; align-items: center; font-size: 50px; margin-top: 120px; padding-left: 120px; padding-right: 20px;">
        <div style="flex-grow: 1;">
            <span style="font-size: 50px;">Hasil UI/UX</span>
        </div>
        <div style="display: flex; align-items: center;">
            <div class="dropdown" style="display: inline-block; padding-right: 80px">
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

    <hr style="margin-right: 80px; margin-left: 80px;">

    <div style="padding-left: 100px; padding-right: 100px; padding-top:20px">

        <table style="border: 3px solid #000 !important; width: 100%" class="table table-bordered" id="tabelHasilUiux">
            <thead>
                <tr>
                    <th style="text-align: center" scope="col">No</th>
                    <th style="text-align: center;width: 40%" scope="col">Nama Tim</th>
                    <th style="text-align: center;width: 40%" scope="col">Link Hasil</th>
                    <th style="text-align: center" scope="col">Status</th>
                    <th style="text-align: center" scope="col" rowspan="2">Sertifikat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <th style="text-align: center" scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td style="text-align: center"><a style="text-decoration: none;color:black">
                                {{ $account->nama_tim }}
                            </a>
                        </td>
                        <td style="text-align: center">
                            <a href="{{ $account->hasil_uiux }}" target="_blank" style="text-decoration: none;color:black">
                                {{ $account->hasil_uiux ? $account->hasil_uiux : 'Belum Mengumpulkan' }}
                            </a>
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
                                {{ $sum . '/2' }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <script>
        function filter() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filterMenu");
            filter = input.value;
            table = document.getElementById("tabelHasilUiux");
            tr = table.getElementsByTagName("tr");

            //value="0" Show All
            //value="1">Lengkap
            //value="2">Kurang

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "";
            }

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3].innerText;
                switch (filter) {
                    case "0":
                        tr[i].style.display = "";
                        break;
                    case "1":
                        if (td == '1/1') {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        break;
                    case '2':
                        if (td == '0/1') {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        break;
                    default:
                }
            }
        }

        document.onload = filter()
    </script>
@endsection
