@extends('layouts.main')

@section('title', config('app.name') . ' | FAQ')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/faq.css') }}">

@endsection

@section('content')
    <div class="page-wrapper">
        <div class="main-wrapper">
            <div class="section">
                <div class="page-padding">
                    <div class="container-small">
                        <div class="faqs-container">
                            <h1>Frequently Asked Questions</h1>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Kapan terakhir saya harus melakukan pembayaran setelah membuat akun?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">
                                        &#8226; &nbsp;Pendaftar Batch 1 bisa melakukan pembayaran selama rentang waktu batch
                                        1 sampai sebelum batch 2 (22 Juli - 11 Agustus)<br>
                                        &#8226; &nbsp;Pendaftar Batch 2 bisa melakukan pembayaran selama rentang waktu batch
                                        2 sampai sebelum batch 3 (12 Agustus - 1 September)<br>
                                        &#8226; &nbsp;Pendaftar Batch 3 bisa melakukan pembayaran selama rentang waktu batch
                                        3 (2 - 10 September)<br>
                                    </p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Bisakah saya membuat akun di luar batch pendaftaran?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Tidak bisa, karena pendaftaran
                                        diluar batch akan ditutup.</p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Apabila saya membuat akun pada batch 1 dan belum membayarnya sampai batch 1
                                            berakhir, berapa biaya pendaftaran yang harus saya bayar kalau saya membayar di
                                            luar batch pembuatan akun saya?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Apabila kalian mendaftar akun pada batch 1 dan belum membayarnya
                                        sampai batch 1 ditutup, kalian dapat membayar biaya pendaftaran sesuai dengan batch
                                        akun kalian terdaftar selagi batch selanjutnya belum dimulai. Apabila batch
                                        selanjutnya dimulai, akun kalian sudah tidak dapat diverifikasi lagi dan jika
                                        terjadi hal seperti ini, alangkah baiknya langsung menghubungi CP masing-masing
                                        untuk informasi lebih lanjut.</p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Apabila pembayaran pendaftaran yang saya transfer berlebih, apakah saya akan
                                            mendapatkan uang saya kembali?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Pembayaran yang berlebih akan
                                        dikembalikan setelah kalian menghubungi CP, setelah dikonfirmasi kelebihan tersebut
                                        maka akan diproses oleh panitia. Kami harapkan kalian dapat memperhatikan biaya
                                        pendaftaran yang harus ditransfer agar hal ini tidak terjadi.
                                    </p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Apakah bisa membatalkan pendaftaran dan mendapat uang saya kembali?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Pembatalan pendaftaran tidak
                                        dapat dilakukan apabila sudah membayar biaya pendaftaran sehingga uang tidak dapat
                                        kembali dan sudah tercatat sebagai peserta lomba. Tim yang tidak membayar dan tidak
                                        terverifikasi akan dianggap tim yang tidak mengikuti perlombaan.</p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Bagaimana saya mengetahui bahwa tim saya telah terverifikasi?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Kalian dapat mengecek
                                        websitenya secara berkala untuk melihat apakah tim kalian telah diverifikasi, batas
                                        waktu verifikasi paling lama adalah 2-3 hari. Jangan lupa setelah tim diverifikasi
                                        segera menghubungi CP terkait.</p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Bisakah 1 Akun Tim mendaftar untuk 2 lomba sekaligus?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">1 Akun Tim hanya bisa untuk
                                        1 lomba saja, apabila ingin mengikuti 2 lomba sekaligus, kalian dapat membuat akun
                                        baru.</p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Bolehkah saya sendirian untuk lomba UI/UX?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Tidak boleh sendirian, jadi
                                        kalian diwajibkan membentuk tim UI/UX dengan anggota 2 orang.</p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}" loading="lazy"
                                            alt="" class="toggle-icon">
                                        <div>Bolehkah saya mengganti anggota tim UI/UX?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Tidak diperbolehkan
                                        mengganti anggota tim UI/UX. Sebelum mendaftar sudah membentuk kelompok yang sudah
                                        pasti. Tim yang telah diverifikasi tersebut sudah diverifikasi anggotanya sehingga
                                        apabila diketahui terjadi pergantian anggota setelah verifikasi, maka dapat
                                        diblacklist.</p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}"
                                            loading="lazy" alt="" class="toggle-icon">
                                        <div>Apa saja yang harus dipelajari untuk Olympiad?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Materi yang perlu dipelajari terkait logika, pemrograman, dan
                                        sistem informasi dasar yang mencakup ranah jaringan, bisnis, dan sistem.
                                    </p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}"
                                            loading="lazy" alt="" class="toggle-icon">
                                        <div>Apa sajakah yang harus saya kumpulkan untuk lomba UI/UX?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Dokumen yang perlu kalian
                                        kumpulkan adalah sebagai berikut. <br>
                                        &#8226; &nbsp;Penyisihan : File PDF Laporan, File Surat Orisinalitas Karya dan File
                                        Video Presentasi.<br>
                                        &#8226; &nbsp;Final : File PDF Laporan dan File Surat Orisinalitas Karya
                                    </p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}"
                                            loading="lazy" alt="" class="toggle-icon">
                                        <div>Apabila terdapat kendala jaringan pada internet saya, bagaimana proses
                                            pengerjaan Olimpiade saya?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Proses pengerjaan akan tersimpan dan kalian dapat melanjutkan
                                        pengerjaannya.<br>
                                        &#8226; &nbsp;Untuk Penyisihan waktu pengerjaan sebanyak 90 menit, terdapat rentang
                                        waktu pengerjaan dari jam 9-12 WIB sehingga kalian hanya dapat mengakses diantara
                                        jam tersebut, dan apabila terputus dari website, waktu pengerjaan kalian akan tetap
                                        berjalan.<br>
                                        &#8226; &nbsp;Untuk Semifinal waktu pengerjaan 90 menit dan dilakukan sambil zoom
                                        meeting, sehingga kalian hanya dapat mengerjakan di waktu yang telah ditentukan,
                                        apabila terputus, waktu pengerjaan kalian akan tetap berjalan.<br>
                                        &#8226; &nbsp;Untuk Final, kalian mengerjakan soal dengan rentang waktu 30 menit di
                                        zoom, apabila koneksi terputus, waktu pengerjaan kalian akan tetap berjalan.
                                    </p>
                                </div>
                            </div>
                            <div class="faq-wrap">
                                <div class="faq-toggle">
                                    <div class="faq-question"><img src="{{ asset('assets/svg/faq.svg') }}"
                                            loading="lazy" alt="" class="toggle-icon">
                                        <div>Apa yang terjadi kalau pengumpulan projek UI/UX lebih dari waktu yang
                                            ditentukan? apakah ada perpanjangan?</div>
                                    </div>
                                    <div class="faq-icon-wrap"
                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(135deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <div class="plus-icon"></div>
                                        <div class="minus-icon"></div>
                                    </div>
                                </div>
                                <div class="faq-answer-wrap">
                                    <p class="faq-answer">Tidak ada perpanjangan batas
                                        waktu pengumpulan, sehingga apabila sudah melewati batas waktu yang ditentukan, akan
                                        dianggap tidak mengumpulkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="{{ asset('script/faq.js') }}"></script>
@endsection
