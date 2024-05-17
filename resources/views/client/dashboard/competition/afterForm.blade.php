@extends('layouts.main')

@section('title', config('app.name') . ' | Terima Kasih!')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/client/pending.css') }}">
    <link rel="stylesheet" href="{{ url('css/env.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="konten">
            <img class="hourglass" src="{{ url('/assets/img/checklist.gif') }}" alt="" />
            <div class="text">
                @if (Auth::user()->role == 'uiux')
                    <h1 class="text--h1">
                        Thank you for submitting your work!
                    </h1>
                    <p class="text--p">
                        Your effort is greatly appreciated. <br> By filling out this form, you confirm that you have
                        successfully
                        submitted <br> your work for the ISAC 2023 UI/UX Competition.
                    </p>
                @else
                    <h1 class="text--h1">
                        Thank you for participating!
                    </h1>
                    <p class="text--p">
                        You have successfully completed the exam. <br> Your responses have been recorded.
                    </p>
                @endif
                <a href="{{ route('profile') }}" class="button btn-primary"
                    style="padding-top: 5px; padding-bottom: 5px;text-decoration: none;margin-top: 20px">Back to Home</a>
            </div>
        </div>
        <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
    </div>
@endsection
