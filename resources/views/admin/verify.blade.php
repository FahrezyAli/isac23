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
    </style>
@endsection


@section('content')

    {{-- Alert Perubahan Status --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert"
            style="position: fixed; bottom:2.5%; right:2.5%; z-index:900" id="success-alert">

            {!! session()->get('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- atas tabel --}}
    <div style="display: flex; align-items: center; font-size: 50px; margin-top: 120px; margin-left: 170px;">

        <div style="flex-grow: 1;">
            <span style="font-size: 50px;">Verifikasi Lomba</span>
        </div>
        <div style="display: flex; align-items: center;margin-right: 170px;">

            <a class="button btn-primary" href="{{ route('download-tabel') }}"
                style="text-decoration: none; width: 12rem; font-size: 18px;margin-top:10px;margin-right:50px">Download
                Excel</a>
            <div class="dropdown" style="display: inline-block;">
                <select class="form-select" aria-label="Default select example" id="filterMenu">
                    <option value="0" selected onclick="filter()">Show All ({{ $accounts->count() }})</option>
                    <option value="1" onclick="filter()">Unverified Olympiad
                        ({{ $olymp->where('status_bayar', '!=', 'verified')->count() }})</option>
                    <option value="2" onclick="filter()">Unverified UIUX
                        ({{ $uiux->where('status_bayar', '!=', 'verified')->count() }})</option>
                    <option value="3" onclick="filter()">Verified Olympiad
                        ({{ $olymp->where('status_bayar', 'verified')->count() }})</option>
                    <option value="4" onclick="filter()">Verified UIUX
                        ({{ $uiux->where('status_bayar', 'verified')->count() }})</option>
                </select>
            </div>
        </div>
    </div>
    <hr style="margin-right: 150px; margin-left: 150px;">
    <div style="padding-left: 70px; padding-right: 70px; padding-top:20px">
        {{-- tabel --}}
        <table style="border: 3px solid #000 !important;" class="table table-bordered" id="tabel-verifikasi">
            <thead>
                <tr>
                    <th style="text-align: center" scope="col">No</th>
                    <th style="text-align: center" scope="col">Username</th>
                    <th style="text-align: center" scope="col">Olympiad</th>
                    <th style="text-align: center" scope="col">UI/UX</th>
                    <th style="text-align: center" scope="col" rowspan="2">Created At</th>
                    <th style="text-align: center" scope="col" rowspan="2">Batch</th>
                </tr>
            </thead>

            <tbody>

                {{-- isi --}}
                @foreach ($accounts as $account)
                    <tr>
                        <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                        <td>
                            <a class="team-name" href="/admin/{{ $account->id }}/info"
                                style="text-decoration: none;color:black">{{ $account->nama_tim }}
                            </a>
                        </td>
                        @if ($account->role == 'olymp')
                            {{-- If Team is Olympiad, UIUX columns are blank --}}
                            <td style="text-align: center">
                                <a href="#" id="open-modal{{ $loop->iteration }}"
                                    style="text-decoration: none;color:black">
                                    <u>
                                        {{ $account->status_bayar }}
                                    </u>
                                </a>
                            </td>
                            <td style="text-align: center"></td>
                            <td style="text-align: center">
                                {{ $account->created_at }}
                            </td>
                            <td style="text-align: center">
                                @if ($account->created_at < '2023-08-05 00:00:00')
                                    Batch 1
                                @elseif ($account->created_at > '2023-08-12 00:00:00' && $account->created_at < '2023-08-26 00:00:00')
                                    Batch 2
                                @elseif ($account->created_at > '2023-09-02 00:00:00' && $account->created_at < '2023-09-11 00:00:00')
                                    Batch 3
                                @else
                                    Diluar waktu pendaftaran.
                                @endif

                            </td>
                        @else
                            {{-- If Team is UIUX, Olympiad columns are blank --}}
                            <td style="text-align: center"></td>
                            <td style="text-align: center">
                                <a href="#" id="open-modal{{ $loop->iteration }}"
                                    style="text-decoration: none;color:black">
                                    <u>
                                        {{ $account->status_bayar }}
                                    </u>
                                </a>
                            </td>
                            <td style="text-align: center">
                                {{ $account->created_at }}
                            </td>
                            <td style="text-align: center">
                                @if ($account->created_at < '2023-08-05 00:00:00')
                                    Batch 1
                                @elseif ($account->created_at > '2023-08-12 00:00:00' && $account->created_at < '2023-08-26 00:00:00')
                                    Batch 2
                                @elseif ($account->created_at > '2023-09-02 00:00:00' && $account->created_at < '2023-09-11 00:00:00')
                                    Batch 3
                                @else
                                    Diluar waktu pendaftaran.
                                @endif

                            </td>
                        @endif

                        {{-- popup --}}
                        @if ($account->status_bayar == 'empty')
                            @include('admin.Components.popupVerifyEmpty')
                        @elseif ($account->status_bayar == 'unverified')
                            @include('admin.Components.popupVerifyUnverified')
                        @elseif ($account->status_bayar == 'verified')
                            @include('admin.Components.popupVerifyVerified')
                        @elseif ($account->status_bayar == 'failed')
                            @include('admin.Components.popupVerifyFailed')
                        @endif

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
        const showModal = (openButton, modalContent) => {
            const openBtn = document.getElementById(openButton),
                modalContainer = document.getElementById(modalContent)

            if (openBtn && modalContainer) {
                openBtn.addEventListener('click', () => {
                    modalContainer.classList.add('show-modal')
                })
            }
        }

        const closeBtn = document.querySelectorAll('.close-modal')

        @foreach ($accounts as $account)
            showModal('open-modal{{ $loop->iteration }}', 'modal-container{{ $loop->iteration }}')
        @endforeach

        function closeModal() {
            @foreach ($accounts as $account)
                const modalContainer{{ $loop->iteration }} = document.getElementById(
                    'modal-container{{ $loop->iteration }}')
                modalContainer{{ $loop->iteration }}.classList.remove('show-modal')
            @endforeach
        }

        closeBtn.forEach(c => c.addEventListener('click', closeModal))

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal()
            }
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
