@extends('layouts.main')

@section('title', config('app.name') . ' | Registrasi Anggota')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
    <link rel="stylesheet" href="{{ url('css/client/reg_dash_ang.css') }}">
@endsection


@section('content')
    @if ($number == '1' && $user->role == 'olymp')
       @include('client.dashboard.components.dashboard-form-olymp')
    @elseif ($number == '1' && $user->role == 'uiux')
        @include('client.dashboard.components.dashboard-form-uiux')
    @elseif ($number == '2' && $user->role == 'uiux')
        @include('client.dashboard.components.dashboard-form-uiux')
    @endif
    <script src="/assets/js/navscript.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#pasFoto').change(() => {
            let reader = new FileReader();
            reader.onload = e => {
                $('.view-pasFoto').attr('src', e.target.result);
            }

            reader.readAsDataURL($('#pasFoto')[0].files[0]);
        })
    </script>
@endsection
