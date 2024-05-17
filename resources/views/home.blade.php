@extends('layouts.main')

@section('title', config('app.name') . ' | Welcome!')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" />
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="main-wrapper">
            <div class="section_hero">
                <div class="hero-wrapper">
                    <div class="landing">
                        <div class="box">
                            <img src="{{ asset('assets/img/logoisac.png') }}" alt="" />
                            @auth
                                <a href="{{ route('winners') }}" class="button btn-primary"
                                    style="padding-top: 5px; padding-bottom: 5px;text-decoration: none">VIEW WINNERS</a>
                            @else
                                <a href="{{ route('winners') }}" class="button btn-primary"
                                    style="padding-top: 5px; padding-bottom: 5px;text-decoration: none">VIEW WINNERS</a>
                            @endauth
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/hero-11.png') }}" class="hero-11" />
                    <img src="{{ asset('assets/img/hero-10.png') }}" data-w-id="hero10"
                        sizes="(max-width: 1920px) 100vw, 1920px" class="hero-10"
                        style="
                will-change: transform;
                transform: translate3d(0px, 0.7313%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-09.png') }}" data-w-id="hero9"
                        sizes="(max-width: 1920px) 100vw, 1920px" class="hero-09"
                        style="
                will-change: transform;
                transform: translate3d(0px, 1.09695%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-08.png') }}" data-w-id="hero8"
                        sizes="(max-width: 1920px) 100vw, 1920px" class="hero-08"
                        style="
                will-change: transform;
                transform: translate3d(0px, 1.4626%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-07.png') }}" data-w-id="hero7"
                        sizes="(max-width: 1920px) 100vw, 1920px" class="hero-07"
                        style="
                will-change: transform;
                transform: translate3d(0px, 1.82825%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-cloud8.png') }}"
                        style="
                transform: translate3d(-10.8733%, 3.6565%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud8" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud8" />
                    <img src="{{ asset('assets/img/hero-cloud7.png') }}"
                        style="
                transform: translate3d(-9.51412%, 3.6565%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud7" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud7" />
                    <img src="{{ asset('assets/img/hero-cloud6.png') }}"
                        style="
                transform: translate3d(-8.15496%, 3.29085%, 0px)
                  scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg)
                  skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud6" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud6" />
                    <img src="{{ asset('assets/img/hero-cloud5.png') }}"
                        style="
                transform: translate3d(-6.7958%, 2.9252%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud5" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud5" />
                    <img src="{{ asset('assets/img/hero-cloud4.png') }}"
                        style="
                transform: translate3d(-5.43664%, 2.55955%, 0px)
                  scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg)
                  skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud4" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud4" />
                    <img src="{{ asset('assets/img/hero-cloud3.png') }}"
                        style="
                transform: translate3d(-4.07748%, 2.1939%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud3" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud3" />
                    <img src="{{ asset('assets/img/hero-cloud2.png') }}"
                        style="
                transform: translate3d(-2.71832%, 1.82825%, 0px)
                  scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg)
                  skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud2" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud2" />
                    <img src="{{ asset('assets/img/hero-cloud1.png') }}"
                        style="
                transform: translate3d(-1.35916%, 1.4626%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
                will-change: transform;
              "
                        data-w-id="cloud1" sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud1" />
                    <img src="{{ asset('assets/img/hero-06.png') }}" data-w-id="hero6"
                        sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-06"
                        style="
                will-change: transform;
                transform: translate3d(0px, 2.1939%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-05.png') }}" data-w-id="hero5"
                        sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-05"
                        style="
                will-change: transform;
                transform: translate3d(0px, 2.55955%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-04.png') }}" data-w-id="hero4"
                        sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-04"
                        style="
                will-change: transform;
                transform: translate3d(0px, 2.9252%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-03.png') }}" data-w-id="hero3"
                        sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-03"
                        style="
                will-change: transform;
                transform: translate3d(0px, 3.29085%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-02.png') }}" data-w-id="hero2"
                        sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-02"
                        style="
                will-change: transform;
                transform: translate3d(0px, 3.6565%, 0px) scale3d(1, 1, 1)
                  rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                transform-style: preserve-3d;
              " />
                    <img src="{{ asset('assets/img/hero-01.png') }}" sizes="(max-width: 1920px) 100vw, 1920px"
                        class="hero-01" />
                </div>
            </div>
            <div class="section-content" style="padding-bottom: 0">
                <div class="padding-global">
                    <div class="container align-center">
                        <h1 id="about" data-w-id="temaisac" class="heading-content-h1">
                            IGNITING INDONESIA’S STUDENT POTENTIAL TO THRIVE IN INDONESIA’S
                            FUTURE IT ENVIRONMENT
                        </h1>
                        <h2 data-w-id="judultema" class="heading-content-h2">
                            "TECHTOPIA"
                        </h2>
                    </div>
                    <div class="padding-large"></div>
                    <div class="container text-align-left">
                        <div data-w-id="kontenisac" class="landing-layout-grid grid-2col gap-large">
                            <div class="container text-align-left about-grid">
                                <p class="text-size-medium">
                                    <span class="gradient2">ISAC</span>
                                    merupakan kompetisi tahunan yang diselenggarakan oleh
                                    <span class="gradient2">HIMSI UNAIR</span>. Tahun ini
                                    <span class="gradient2">ISAC </span> dengan dua jenis
                                    kompetisi, yaitu <span class="gradient2">Olympiad </span>dan
                                    <span class="gradient2"> UI/UX </span>. <br /><br />
                                    <span class="gradient2">ISAC Olympiad</span> akan menguji
                                    kemampuan logika, pemrograman dasar, serta ilmu sistem
                                    informasi dasar kamu. <br /><br />Sedangkan
                                    <span class="gradient2">ISAC UI/UX Competition </span>akan
                                    menguji kemampuan peserta dalam analisa dan kreativitas
                                    peserta dalam menghadirkan sebuah informasi yang memberikan
                                    kenyamanan dan kemudahan untuk pengguna dalam bentuk desain
                                    website.
                                </p>
                            </div>
                            <div class="container">
                                <!-- <img
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        src="https://statik.tempo.co/data/2023/02/07/id_1179383/1179383_720.jpg"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        alt=""
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      /> -->
                                <img src="{{ asset('assets/img/maskot.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="values">
                            <div class="val-item">
                                <h2 class="gradient1 val-title">ADAPT</h2>
                                <img src="{{ asset('assets/svg/adapt.svg') }}" alt="" class="val-icon" />
                                <p class="val1">
                                    Ability to change in order to suit different conditions
                                </p>
                            </div>
                            <div class="val-item">
                                <h2 class="gradient2 val-title">COMMUNICATE</h2>
                                <img src="{{ asset('assets/svg/communicate.svg') }}" alt="" class="val-icon" />
                                <p class="val2">
                                    Breaking the wall of separation and assemble a wide range of
                                    individuals
                                </p>
                            </div>
                            <div class="val-item">
                                <h2 class="gradient3 val-title">INNOVATE</h2>
                                <img src="{{ asset('assets/svg/innovate.svg') }}" alt="" class="val-icon" />
                                <p class="val3">
                                    Fill with the urge or ability to do something creative
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img style="width: 100%; padding: 0" src="{{ asset('assets/svg/bukit.svg') }}" alt="" />
            <div class="section-content" style="background-color: #707070; padding-top: 0; padding-bottom: 0">
                <div class="padding-global">
                    <center style="padding-bottom: 2rem">
                        <h1 id="events" class="discover">OUR EVENTS</h1>
                    </center>
                    <div class="events">
                        <div class="events__wrp swiper-wrapper">
                            <div class="events__item swiper-slide">
                                <div class="events__img">
                                    <img src="{{ asset('assets/img/olim.gif') }}" alt="" />
                                </div>
                                <div class="events__content">
                                    <div class="events__title">ISAC Olympiad</div>
                                    <div class="events__text">
                                        ISAC Olympiad adalah kompetisi yang menguji kemampuan
                                        logika, pemrograman dasar, dan ilmu sistem informasi
                                        dasar. Kompetisi ini bertujuan untuk mengasah kemampuan
                                        logika dan pemrograman peserta serta memperkenalkan ilmu
                                        sistem informasi dasar tepatnya dalam ranah jaringan,
                                        bisnis, dan sistem. ISAC Olympiad diselenggarakan secara
                                        online dengan skala nasional untuk seluruh siswa SMA atau
                                        sederajat.
                                    </div>
                                    <a href="https://bit.ly/OlympiadeISAC2023" class="button btn-primary" target="_blank"
                                        style="padding-top: 5px; padding-bottom: 5px">Guide
                                        Book</a>
                                </div>
                            </div>
                            <div class="events__item swiper-slide">
                                <div class="events__img">
                                    <img src="{{ asset('assets/img/olim.gif') }}" alt="" />
                                </div>
                                <div class="events__content">
                                    <div class="events__title">ISAC Olympiad</div>
                                    <div class="events__text">
                                        <img src="{{ asset('assets/img/timeline-1.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="events__pagination"></div>
                    </div>
                    <div class="padding-large"></div>
                    <div class="events second-events">
                        <div class="events__wrp swiper-wrapper">
                            <div class="events__item swiper-slide">
                                <div class="events__img">
                                    <img src="{{ asset('assets/img/uiux.gif') }}" alt="" />
                                </div>
                                <div class="events__content">
                                    <div class="events__title">ISAC UI/UX</div>
                                    <div class="events__text">
                                        ISAC UI/UX Competition adalah kompetisi yang menguji
                                        analisa dan kreativitas peserta dalam menghadirkan sebuah
                                        informasi yang memberikan kenyamanan dan kemudahan untuk
                                        pengguna dalam bentuk desain website. Kompetisi ini
                                        bertujuan untuk mengasah kemampuan peserta dalam
                                        menyelesaikan sebuah masalah dan memberikan informasi
                                        dalam wujud desain website.
                                    </div>
                                    <a href="https://bit.ly/UIUXISAC2023" class="button btn-primary" target="_blank"
                                        style="padding-top: 5px; padding-bottom: 5px">Guide
                                        Book</a>
                                </div>
                            </div>
                            <div class="events__item swiper-slide">
                                <div class="events__img">
                                    <img src="{{ asset('assets/img/uiux.gif') }}" alt="" />
                                </div>
                                <div class="events__content">
                                    <div class="events__title">ISAC UI/UX</div>
                                    <div class="events__text">
                                        <img src="{{ asset('assets/img/timeline-2.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="events__pagination"></div>
                    </div>
                    <div class="landing-layout-grid projects_component">
                        <div class="projects_content-left">
                            <div class="margin-bottom margin-xsmall">
                                <div id="teks1" class="text-weight-semibold teks1">ayo join</div>
                            </div>
                            <div class="margin-bottom margin-small">
                                <h2 id="teks2" class="teks2">pls join🔫</h2>
                            </div>
                            <p id="teks3" class="text-size-medium teks3">nih acaranya, kren kan</p>
                            <div class="margin-top margin-medium">
                                <div class="button-row"></div>
                            </div>
                        </div>
                        <div class="projects_content-right">
                            <a href="https://www.instagram.com/p/CxLD94JvR_d/?img_index=2" target="_blank"
                                class="projects_content-item _1 landing-inline-block">
                                <img src="{{ asset('assets/img/odl.jpg') }}" loading="lazy"
                                    sizes="(max-width: 479px) 89vw, (max-width: 767px) 85vw, (max-width: 991px) 45vw, 52vw"
                                    class="projects_image" />
                            </a>
                            <a href="https://www.instagram.com/p/CvAL9BRv9cL/?img_index=1" target="_blank"
                                id="projects_content-item_2" class="projects_content-item _2 landing-inline-block">
                                <img src="{{ asset('assets/img/ws.jpg') }}" loading="lazy" class="projects_image" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/svg/timeline.svg') }}" alt="" style="width: 100%" />
            <div class="section-content sponsor-margin" style="padding-top: 0; padding-bottom: 0">
                <div class="padding-global">
                    <center>
                        <h1 class="discover" style="color: #0E2C33; width: 360px; padding-bottom: 50px">
                            Our Sponsors &#38; Partners
                        </h1>

                        <div style="background-color: #65806D;width: 70%;padding: 0 1rem;border-radius: 1rem">
                            <a href="https://tripleten.com" target="_blank"
                                class="link-block-t-copy landing-inline-block"></a>
                            <div class="sponsors-logo-container">
                                <a id="sponsor2" href="https://perusahaankontraktorjogja.com" target="_blank"
                                    class="link-block-4-copy landing-inline-block"></a><a id="sponsor1"
                                    href="http://bimbelssc.com" target="_blank"
                                    class="link-block-2 landing-inline-block"></a><a id="sponsor3"
                                    href="https://www.dicoding.com" target="_blank"
                                    class="link-block landing-inline-block"></a><a id="sponsor4"
                                    href="https://www.reddoorz.com" target="_blank"
                                    class="link-block-3 landing-inline-block"></a><a id="sponsor5"
                                    href="https://www.telkomsel.com" target="_blank"
                                    class="link-block-6 landing-inline-block"></a><a id="sponsor6"
                                    href="https://www.instagram.com/spectrumprinting.id" target="_blank"
                                    class="link-block-4 landing-inline-block"></a>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            <img src="{{ asset('assets/svg/kawat.svg') }}" alt="" style="width: 100%" />
            <div class="section-content" style="padding-top: 0; padding-bottom: 0">
                <footer class="footer">
                    <h1 id="contacts" class="discover" style="color: #0E2C33; width: 360px">
                        CONTACT US
                    </h1>
                    <div class="contact-menu">
                        <div class="contact">
                            <h2>Grace</h2>
                            <h3>Kontak Olympiad</h3>
                            <p>
                                Telegram :
                                <a class="val3-contact" href="http://t.me/+6281271902046" target="_blank"
                                    rel="noopener noreferrer">081271902046</a>
                            </p>
                            <p>
                                WhatsApp :
                                <a class="val2-contact" href="http://wa.me/+6281271902046" target="_blank"
                                    rel="noopener noreferrer">081271902046</a>
                            </p>
                            <p>
                                Line :
                                <a class="val1-contact" href="http://line.me/ti/p/~gtamp11" target="_blank"
                                    rel="noopener noreferrer">gtamp11</a>
                            </p>
                        </div>
                        <div class="contact">
                            <h2>Alya</h2>
                            <h3>Kontak UI/UX</h3>
                            <p>
                                Telegram :
                                <a class="val3-contact" href="http://t.me/+6287889593989" target="_blank"
                                    rel="noopener noreferrer">087889593989</a>
                            </p>
                            <p>
                                WhatsApp :
                                <a class="val2-contact" href="http://wa.me/+6287889593989" target="_blank"
                                    rel="noopener noreferrer">087889593989</a>
                            </p>
                            <p>
                                Line :
                                <a class="val1-contact" href="http://line.me/ti/p/~alyagitaa" target="_blank"
                                    rel="noopener noreferrer">alyagitaa
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="container align-center">
                        <div class="social">
                            <div class="social__wrapper">
                                <a title="Instagram" href="https://www.instagram.com/isac_unair" target="_blank"
                                    class="social__icon-link landing-inline-block">
                                    <div class="icon">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_633_132)">
                                                <path
                                                    d="M9.5 1.71158C12.0365 1.71158 12.3373 1.72108 13.3388 1.767C14.3743 1.8145 15.4407 2.05042 16.1951 2.80488C16.9567 3.56646 17.1855 4.62254 17.233 5.66121C17.2789 6.66267 17.2884 6.9635 17.2884 9.5C17.2884 12.0365 17.2789 12.3373 17.233 13.3388C17.1863 14.3688 16.9448 15.4454 16.1951 16.1951C15.4335 16.9567 14.3783 17.1855 13.3388 17.233C12.3373 17.2789 12.0365 17.2884 9.5 17.2884C6.9635 17.2884 6.66267 17.2789 5.66121 17.233C4.63917 17.1863 3.54825 16.9393 2.80488 16.1951C2.04725 15.4375 1.8145 14.3711 1.767 13.3388C1.72108 12.3373 1.71158 12.0365 1.71158 9.5C1.71158 6.9635 1.72108 6.66267 1.767 5.66121C1.81371 4.63521 2.05754 3.55221 2.80488 2.80488C3.56488 2.04488 4.62492 1.8145 5.66121 1.767C6.66267 1.72108 6.9635 1.71158 9.5 1.71158ZM9.5 0C6.91996 0 6.59617 0.0110833 5.58283 0.057C4.11429 0.124292 2.65604 0.532792 1.59442 1.59442C0.528833 2.66 0.124292 4.11508 0.057 5.58283C0.0110833 6.59617 0 6.91996 0 9.5C0 12.08 0.0110833 12.4038 0.057 13.4172C0.124292 14.8841 0.534375 16.3463 1.59442 17.4056C2.65921 18.4704 4.11667 18.8757 5.58283 18.943C6.59617 18.9889 6.91996 19 9.5 19C12.08 19 12.4038 18.9889 13.4172 18.943C14.8849 18.8757 16.3448 18.4664 17.4056 17.4056C18.472 16.3392 18.8757 14.8849 18.943 13.4172C18.9889 12.4038 19 12.08 19 9.5C19 6.91996 18.9889 6.59617 18.943 5.58283C18.8757 4.11429 18.4664 2.65525 17.4056 1.59442C16.3424 0.531208 14.881 0.1235 13.4172 0.057C12.4038 0.0110833 12.08 0 9.5 0Z"
                                                    fill="#FAF5E7" />
                                                <path
                                                    d="M9.50032 4.62109C6.80628 4.62109 4.62207 6.8053 4.62207 9.49934C4.62207 12.1934 6.80628 14.3776 9.50032 14.3776C12.1944 14.3776 14.3786 12.1934 14.3786 9.49934C14.3786 6.8053 12.1944 4.62109 9.50032 4.62109ZM9.50032 12.666C7.75153 12.666 6.33365 11.2481 6.33365 9.49934C6.33365 7.75055 7.75153 6.33268 9.50032 6.33268C11.2491 6.33268 12.667 7.75055 12.667 9.49934C12.667 11.2481 11.2491 12.666 9.50032 12.666Z"
                                                    fill="#FAF5E7" />
                                                <path
                                                    d="M14.5716 5.56906C15.2012 5.56906 15.7116 5.05867 15.7116 4.42906C15.7116 3.79946 15.2012 3.28906 14.5716 3.28906C13.942 3.28906 13.4316 3.79946 13.4316 4.42906C13.4316 5.05867 13.942 5.56906 14.5716 5.56906Z"
                                                    fill="#FAF5E7" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_633_132">
                                                    <rect width="19" height="19" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="icon-bg-over"></div>
                                    <div class="icon-bg"></div>
                                </a>
                            </div>
                            <div class="social__wrapper">
                                <a title="Line" href="https://lin.ee/8Cb3flt" target="_blank"
                                    class="social__icon-link landing-inline-block">
                                    <div class="icon">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_635_137)">
                                                <path
                                                    d="M14.7171 0H4.28292C1.91742 0 0 1.91742 0 4.28292V14.7171C0 17.0826 1.91742 19 4.28292 19H14.7171C17.0826 19 19 17.0826 19 14.7171V4.28292C19 1.91742 17.0818 0 14.7171 0ZM14.4748 11.7681C13.1456 13.2976 10.1745 15.1612 9.49842 15.4462C8.82233 15.7312 8.92208 15.2649 8.94979 15.1042C8.96642 15.0092 9.04004 14.5619 9.04004 14.5619C9.06142 14.4004 9.08358 14.1495 9.01946 13.9895C8.94821 13.813 8.66796 13.722 8.46133 13.6768C5.41737 13.2747 3.1635 11.1467 3.1635 8.60542C3.1635 5.77125 6.00558 3.46433 9.49842 3.46433C12.9913 3.46433 15.8333 5.77046 15.8333 8.60542C15.8325 9.73908 15.3932 10.7611 14.4748 11.7681Z"
                                                    fill="#FAF5E7" />
                                                <path
                                                    d="M12.5163 7.9255V8.39179H13.726C13.7925 8.39179 13.8471 8.44642 13.8471 8.51292V8.96258C13.8471 9.02908 13.7933 9.08371 13.726 9.08371H12.5163V9.55H13.726C13.7925 9.55 13.8471 9.60463 13.8471 9.67113V10.1208C13.8471 10.1873 13.7933 10.2411 13.726 10.2411H11.9463C11.8798 10.2411 11.8252 10.1873 11.8252 10.1208V7.3555C11.8252 7.289 11.879 7.23438 11.9463 7.23438H13.726C13.7925 7.23438 13.8471 7.28821 13.8471 7.3555V7.80438C13.8471 7.87088 13.7933 7.9255 13.726 7.9255H12.5163Z"
                                                    fill="#FAF5E7" />
                                                <path
                                                    d="M7.26234 9.67113V10.1208C7.26234 10.1873 7.2085 10.2411 7.14121 10.2411H5.36154C5.29504 10.2411 5.24121 10.1873 5.24121 10.1208V7.3555C5.24121 7.289 5.29504 7.23438 5.36154 7.23438H5.81121C5.87771 7.23438 5.93234 7.28821 5.93234 7.3555V9.55H7.142C7.2085 9.55 7.26234 9.60463 7.26234 9.67113Z"
                                                    fill="#FAF5E7" />
                                                <path
                                                    d="M8.33468 7.3555V10.12C8.33468 10.1865 8.28085 10.2403 8.21355 10.2403H7.76468C7.69818 10.2403 7.64355 10.1865 7.64355 10.12V7.3555C7.64355 7.289 7.69739 7.23438 7.76468 7.23438H8.21355C8.28005 7.23438 8.33468 7.289 8.33468 7.3555Z"
                                                    fill="#FAF5E7" />
                                                <path
                                                    d="M11.3922 7.3555V10.12C11.3922 10.1865 11.3384 10.2403 11.2711 10.2403H10.8246C10.785 10.2403 10.7462 10.2205 10.7232 10.1881L9.45657 8.47808V10.12C9.45657 10.1865 9.40273 10.2403 9.33544 10.2403H8.88577C8.81927 10.2403 8.76465 10.1865 8.76465 10.12V7.3555C8.76465 7.289 8.81848 7.23438 8.88577 7.23438H9.33227C9.37423 7.23438 9.41065 7.25654 9.43519 7.289L10.7003 8.99742V7.3555C10.7003 7.289 10.7541 7.23438 10.8214 7.23438H11.2711C11.3384 7.23438 11.3922 7.289 11.3922 7.3555Z"
                                                    fill="#FAF5E7" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_635_137">
                                                    <rect width="19" height="19" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="icon-bg-over"></div>
                                    <div class="icon-bg"></div>
                                </a>
                            </div>
                            <div class="social__wrapper">
                                <a title="Location" href="https://goo.gl/maps/DvKtsnoUhndTYrH76" target="_blank"
                                    class="social__icon-link landing-inline-block">
                                    <div class="icon">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_635_147)">
                                                <path
                                                    d="M9.46719 19.0068L8.91534 18.5338C8.15456 17.8968 1.51172 12.1598 1.51172 7.96328C1.51172 3.56961 5.07351 0.0078125 9.46719 0.0078125C13.8609 0.0078125 17.4227 3.56961 17.4227 7.96328C17.4227 12.1598 10.7798 17.8968 10.0222 18.5369L9.46719 19.0068ZM9.46719 1.72802C6.02518 1.73191 3.23586 4.52124 3.23196 7.96325C3.23196 10.5996 7.31889 14.811 9.46719 16.7386C11.6155 14.8103 15.7024 10.5964 15.7024 7.96325C15.6985 4.52124 12.9092 1.73195 9.46719 1.72802Z"
                                                    fill="#FAF5E7" />
                                                <path
                                                    d="M9.46696 11.1175C7.72534 11.1175 6.31348 9.70564 6.31348 7.96403C6.31348 6.22241 7.72534 4.81055 9.46696 4.81055C11.2086 4.81055 12.6204 6.22241 12.6204 7.96403C12.6204 9.70564 11.2086 11.1175 9.46696 11.1175ZM9.46696 6.38725C8.59615 6.38725 7.89022 7.09318 7.89022 7.96399C7.89022 8.8348 8.59615 9.54073 9.46696 9.54073C10.3378 9.54073 11.0437 8.8348 11.0437 7.96399C11.0437 7.09318 10.3378 6.38725 9.46696 6.38725Z"
                                                    fill="#FAF5E7" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_635_147">
                                                    <rect width="19" height="19" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="icon-bg-over"></div>
                                    <div class="icon-bg"></div>
                                </a>
                            </div>
                            <div class="social__wrapper">
                                <a title="faq" href="/faq" target="_blank"
                                    class="social__icon-link landing-inline-block">
                                    <div class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.83399 0.333252C7.95506 0.333252 6.11834 0.890417 4.55607 1.93429C2.9938 2.97816 1.77617 4.46186 1.05713 6.19776C0.338101 7.93366 0.149969 9.84379 0.516528 11.6866C0.883088 13.5294 1.78788 15.2222 3.11647 16.5508C4.44507 17.8794 6.13781 18.7841 7.98063 19.1507C9.82345 19.5173 11.7336 19.3291 13.4695 18.6101C15.2054 17.8911 16.6891 16.6734 17.7329 15.1112C18.7768 13.5489 19.334 11.7122 19.334 9.83325C19.331 7.31461 18.3292 4.89997 16.5482 3.11902C14.7673 1.33807 12.3526 0.336223 9.83399 0.333252ZM9.83399 17.606C8.29669 17.606 6.79391 17.1501 5.51569 16.296C4.23747 15.442 3.24122 14.228 2.65292 12.8077C2.06463 11.3875 1.9107 9.82463 2.21061 8.31687C2.51052 6.80911 3.2508 5.42414 4.33784 4.3371C5.42487 3.25007 6.80984 2.50979 8.3176 2.20987C9.82537 1.90996 11.3882 2.06389 12.8085 2.65219C14.2288 3.24049 15.4427 4.23674 16.2968 5.51496C17.1509 6.79317 17.6067 8.29595 17.6067 9.83325C17.6042 11.8939 16.7845 13.8695 15.3274 15.3266C13.8702 16.7837 11.8947 17.6035 9.83399 17.606ZM10.6976 13.7196V15.4469H8.97035V13.7196H10.6976ZM13.2885 7.67416C13.2895 8.19211 13.1735 8.70358 12.9491 9.17044C12.7248 9.6373 12.398 10.0475 11.9931 10.3704C11.3389 10.8773 10.8966 11.6093 10.752 12.4242H8.99712C9.07349 11.7583 9.2824 11.1145 9.61154 10.5307C9.94067 9.94689 10.3834 9.43489 10.9135 9.02489C11.1263 8.85461 11.2957 8.63641 11.408 8.38811C11.5203 8.13981 11.5723 7.86847 11.5597 7.59626C11.547 7.32404 11.4702 7.05868 11.3353 6.82185C11.2005 6.58502 11.0116 6.38345 10.784 6.23361C10.5303 6.0678 10.2384 5.96964 9.93608 5.94848C9.63375 5.92731 9.33103 5.98385 9.05672 6.11271C8.76411 6.25295 8.51855 6.47519 8.3499 6.7524C8.18125 7.0296 8.09676 7.34983 8.10671 7.67416C8.10671 7.90321 8.01572 8.12288 7.85376 8.28484C7.6918 8.44681 7.47213 8.5378 7.24308 8.5378C7.01403 8.5378 6.79436 8.44681 6.6324 8.28484C6.47043 8.12288 6.37944 7.90321 6.37944 7.67416C6.36659 7.0104 6.54973 6.35759 6.90596 5.79737C7.26218 5.23715 7.77568 4.79439 8.38221 4.52448C8.91987 4.28419 9.50938 4.18317 10.0964 4.23071C10.6834 4.27826 11.2489 4.47284 11.7409 4.79652C12.2163 5.11123 12.6064 5.5387 12.8764 6.0408C13.1465 6.54291 13.2881 7.10404 13.2885 7.67416Z"
                                                fill="#FAF5E7" />
                                        </svg>

                                    </div>
                                    <div class="icon-bg-over"></div>
                                    <div class="icon-bg"></div>
                                </a>
                            </div>
                        </div>
                        <div class="padding-small"></div>
                        <div class="body-small">
                            © HIMSI UNAIR -
                            <a href="https://himsiunair.com" target="_blank" class="link">www.himsiunair.com</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper(".events", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            mousewheel: {
                invert: false,
            },
            pagination: {
                el: ".events__pagination",
                clickable: true,
            },
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="{{ asset('script/home.js') }}"></script>
    <script>
        $(window).scroll(function() {
            var imageOffsetTop = $("#projects_content-item_2").offset().top;
            var windowScrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            if (windowScrollTop + windowHeight >= imageOffsetTop) {
                $("#teks1").text("7 - 8 Oktober 2023");
                $("#teks2").text("Workshop");
                $("#teks3").html(
                    "ISAC 2023 menyelenggarakan Workshop dengan mengambil tema UI/UX Design. Kegiatan ini akan berlangsung selama dua hari dan dihadiri oleh para peserta ISAC 2023 dari berbagai SMA/Sederajat. Penyelenggaraan workshop diharapkan untuk bisa memberikan wadah bagi para peserta untuk mengembangkan minat dan kemampuannya dalam bidang desain. Serta mengetahui lebih jauh salah satu prospek kerja dari Jurusan sistem Informasi.<br> Benefit : <br>&#8226; &nbsp;Memperoleh pemahaman mengenai prinsip-prinsip UI dan UX.  <br>&#8226; &nbsp;Mengembangkan keterampilan dalam mendesain halaman web menggunakan Figma.  <br>&#8226; &nbsp;Memperluas pemahaman tentang peran seorang desainer UI/UX.  <br>&#8226; &nbsp;Memahami situasi dunia kerja dalam bidang desain UI/UX. <br><br>  CP Workshop : Fauzan (082122783748)"
                );
            } else {
                $("#teks1").text("24 September 2023");
                $("#teks2").text("One Day Lecture");
                $("#teks3").html(
                    "One Day Lecture bertujuan untuk memberikan pengalaman kepada para peserta ISAC 2023 untuk bisa mencoba merasakan bagaimana menjadi mahasiswa Universitas Airlangga dengan materi yang berhubungan dengan Sistem Informasi dan dibawakan langsung oleh salah satu Dosen S-1 Sistem Informasi Universitas Airlangga. <br> Benefit : <br>&#8226; &nbsp;Mengenal Model Pembelajaran di Sistem Informasi Unair <br>&#8226; &nbsp;Merasakan Pengalaman Menjadi Mahasiswa Sistem Informasi Unair <br>&#8226;Memberikan Gambaran Mengenai Salah Satu Mata Kuliah Sistem Informasi Unair &nbsp; <br>&#8226; &nbsp;Memperoleh Pemahaman Mengenai Dasar Front-End Web Development <br><br> CP One Day Lecture : Andro (08111242701)"
                );
            }
        });
    </script>
@endsection
