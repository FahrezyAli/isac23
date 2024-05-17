@extends('layouts.main')

@section('title', config('app.name') . ' | Attempt')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/client/attempt.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/env.css') }}">
@endsection

@section('content')
    <div class="container">
        <form action={{ route('answer_semifinal', ['no' => $no]) }} method="POST" class="attempt">
            <div class="number-question-section">
                <section class="number-section">
                    <div class="number-text">
                        Soal No. <span>{{ $no }}</span>
                    </div>
                    <label for="flag" class="flag" style="cursor: initial">
                        <center>
                            Essay
                        </center>
                    </label>
                </section>
                <section class="question-section">
                    <div class="form-question">
                        @csrf
                        @method('put')
                        <input type="hidden" name="soal_id" value="{{ $question->id }}">
                        <p>{{ $question->soal }}</p>
                        @if ($question->gambar_soal)
                            <img class="gambar" draggable="false"
                                src="{{ asset('storage/gambar_soal/' . $question->gambar_soal) }}">
                        @endif
                        <textarea name="answer" id="answer" cols="30" rows="10" class="essay-answer"></textarea>
                    </div>
                    <p class="contact">*bila ada kesalahan atau error harap menghubungi Grace - 081271902046
                    </p>
                    <div class="btn-navigation">
                        <div></div>
                        <button type="submit" name="action" value="{{ $no == $summaries->count() ? 'selesai' : 'next' }}"
                            class="btn-secondary">
                            {{ $no == $summaries->count() ? 'SELESAI' : 'HALAMAN SELANJUTNYA' }}
                        </button>
                    </div>
                </section>
            </div>

            <section class="question-list-section">
                <div class="nav-text">
                    <h4>Navigasi</h4>
                </div>
                <div class="question-list">
                    @for ($i = 1; $i <= $summaries->count(); $i++)
                        <button type="submit" name="action"
                            class="question-card{{ $i == $no ? ' clicked-question-card' : ($i < $no ? ' finished-question-card' : '') }}"
                            {{ $i != $no ? 'disabled' : '' }}>
                            <div class="number-card">{{ $i }}</div>
                        </button>
                    @endfor
                </div>
                <div class="time-submit">
                    <p id="timeLeft" class="hidden">{{ $timeLeft }}</p>
                    <p id="countdown"></p>
                    <button data-open-modal class="btn-secondary" type="button">Selesai</button>
                </div>
            </section>
            <dialog class="modal-box">
                <div class="modal-box__wrapper">
                    <div class="detail">
                        <p class="text">Apakah anda yakin ingin menyelesaikan pengerjaan soal?</p>
                        <div class="tombol">
                            <button data-close-modal class="btn-primary">Cancel</button>
                            <button type="button" name="action" value="selesai" class="btn-primary">Yakin</button>
                        </div>
                    </div>
                </div>
            </dialog>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script>
        const openButtons = document.querySelectorAll('[data-open-modal]');
        const closeButtons = document.querySelectorAll('[data-close-modal]');
        const modal = document.querySelector('dialog');

        openButtons.forEach(button => {
            button.addEventListener('click', () => {
                modal.showModal();
            });
        });

        closeButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.close();
            });
        });


        $(document).ready(function() {
            $('body').bind('cut copy', function(e) {
                e.preventDefault();
            });
            $("body").on("contextmenu", function(e) {
                return false;
            });
        });
        window.onload = function() {
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            }, false);
            document.addEventListener("keydown", function(e) {
                //document.onkeydown = function(e) {
                // "I" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                    disabledEvent(e);
                }
                // "J" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                    disabledEvent(e);
                }
                // "S" key + macOS
                if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                    disabledEvent(e);
                }
                // "U" key
                if (e.ctrlKey && e.keyCode == 85) {
                    disabledEvent(e);
                }
                // "F12" key
                if (event.keyCode == 123) {
                    disabledEvent(e);
                }
            }, false);

            function disabledEvent(e) {
                if (e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
                e.preventDefault();
                return false;
            }
        }



        $(document).on('click', '.question-list .question-card', function() {
            $(this).addClass('clicked-question-card').siblings().removeClass('clicked-question-card');
        })
        let endtime = $('#timeLeft')[0].innerText;

        let countdown = () => {
            let hour = Math.floor(endtime / 3600);
            let minute = Math.floor((endtime - (hour * 3600)) / 60);
            let second = endtime - (hour * 3600) - (minute * 60);

            hour = hour < 10 ? '0' + hour : hour;
            minute = minute < 10 ? '0' + minute : minute;
            second = second < 10 ? '0' + second : second;

            let result = hour + ':' + minute + ':' + second;
            endtime--;
            if (endtime < 0) {
                $('form').submit();
            }


            $('#countdown')[0].innerText = result;
        }

        countdown();
        setInterval(() => {
            countdown()
        }, 1000);
    </script>
@endsection
