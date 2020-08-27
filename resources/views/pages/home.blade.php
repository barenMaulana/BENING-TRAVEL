@extends('layouts.app')
@section('title')
    BeningTravel | trusted travel company
@endsection

@section('content')
<header>
    <div class="container text-center content-header">
        <h1>World in your hand <br>
            you can <span class="title-click">click</span> and Go anywhere!
        </h1>
        <p class="mt-3">travel safely and comfortably with beningTravel </p>
    <a href="#popular" class="btn btn-getStarted px-4 mt-4">GET STARTED</a>
    </div>
    </div>
</header>

<main>
    <div class="container ">
        <!-- DATA STATISTIK -->
        <section class="row section-stats justify-content-center">
            <div class="col col-md-2 stats-detail ">
                <h2>1k+</h2>
                <p>Customer</p>
            </div>
            <div class="col col-md-2 stats-detail">
                <h2>30</h2>
                <p>Partners</p>
            </div>
            <div class="col col-md-2 stats-detail">
                <h2>150</h2>
                <p>Hotels</p>
            </div>
            <div class="col col-md-2 stats-detail">
                <h2>99+</h2>
                <p>Destinations</p>
            </div>
        </section>
    </div>
    <div class="divider-content">
        <hr>
    </div>
    <!-- PAKET POPULAR -->
    <section class="section-popular-heading">
        <div class="container">
            <div class="popular-title text-center">
                <h2 id="popular">Paket Popular</h2>
            </div>
        </div>
    </section>
    <section class="section-popular-content" id="paketPopular">
        <div class="container">
            <div class="row section-content justify-content-center">
                @foreach ($items->slice(0, 5) as $item) 
                    <div class="col-sm-6 col-md-2 m-3 card-travel text-center d-flex flex-column"
                    style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                        <div class="country-name">
                            {{ $item->location }}
                        </div>
                        <div class="location-name">
                            {{ $item->title }}
                        </div>
                        <div class="button-card mt-auto">
                            <a href="{{ route('detail', $item->slug) }}" class="btn btn-check-it text-white">
                                Check it
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-networks" id="testimoni">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-4 networks-title">
                    <h3>Our networks</h3>
                    <p>Companies are trusted us <br>
                        more than just a trip</p>
                </div>
                <div class="col-md-8 networks-logo">
                    <img src="/frontend/images/partners/logos_partner.png" alt="our partners" width="500">
                </div>
            </div>
        </div>
    </section>

    <!-- THIS IS BACKGROUND -->
    <section class="section-background container-fluid  d-sm-none  d-md-block">
        <div class="image-godong"></div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="section-testimonial-heading">
        <div class="container">
            <div class="row">
                <div class="col text-center" >Their Oppinions About Us</div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-content" id="testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-3 col-lg-3 text-center d-flex flex-column card-testimonial">
                    <div class="testimonial-foto-profile mb-2">
                    <img src="{{ url('frontend/images/testimonial/baren_maulana.png') }}" alt="user">
                    </div>
                    <div class="testimonial-nama mb-4">
                        Baren Maulana
                    </div>
                    <div class="testimonial-pesan mb-3">
                        " saya suka sekali melihat ikan ,
                        ikan di sini sangat banyak
                        dan indah "
                    </div>
                    <div class="testimonial-trip mt-auto">
                        <hr>
                        trip to Raja Ampat
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 text-center d-flex flex-column card-testimonial">
                    <div class="testimonial-foto-profile mb-2">
                    <img src="{{ url('frontend/images/testimonial/ajril.png') }}" alt="user">
                    </div>
                    <div class="testimonial-nama mb-4">
                        Azriel F
                    </div>
                    <div class="testimonial-pesan mb-3">
                        " kemarin nilai fisika saya 89 ,
                        setelah saya menggunakan
                        layanan travel ini , nilai saya jadi
                        90 terimakasih beningTravel "
                    </div>
                    <div class="testimonial-trip mt-auto">
                        <hr>
                        trip to Pantai Sekotong
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 text-center d-flex flex-column card-testimonial">
                    <div class="testimonial-foto-profile mb-2">
                    <img src="{{ url('frontend/images/testimonial/arrad.png') }}" alt="user">
                    </div>
                    <div class="testimonial-nama mb-4">
                        Arrad M Y
                    </div>
                    <div class="testimonial-pesan mb-3">
                        " saya suka kertas dengan kualitas
                        tinggi , karena saat kita membaca
                        atau menulis bisa menambah
                        semangat "
                    </div>
                    <div class="testimonial-trip mt-auto">
                        <hr>
                        trip to Candi Borobudur
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider-content">
        <hr>
    </div>

    <!-- PARTNERS -->
    <section class="section-partner-heading">
        <div class="container">
            <div class="text-center">
                <h2>Our Great Partners</h2>
                <p>We grow cause them</p>
            </div>
        </div>
    </section>

    <section class="section-partner-content" id="partner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex flex-column">
                    <div class="card-partner text-center border">
                    <img src="{{ url('frontend/images/partners/partner-1.png') }}" alt="partners" class="mb-4">
                        <h3 class="partner-name">
                            Baren Maulana
                        </h3>
                        <p class="partner-skill">
                            web developer - UI designer
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex flex-column">
                    <div class="card-partner text-center border">
                    <img src="{{ url('frontend/images/partners/partner-2.png') }}" alt="partners" class="mb-4">
                        <h3 class="partner-name">
                            Fikri Herdiansyah
                        </h3>
                        <p class="partner-skill">
                            System Analyst - UX designer
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex flex-column">
                    <div class="card-partner text-center border">
                    <img src="{{ url('frontend/images/partners/partner-3.png') }}" alt="partners" class="mb-4">
                        <h3 class="partner-name">
                            Azriel Facturahman
                        </h3>
                        <p class="partner-skill">
                            Profesional Graphic Designer
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BUTTON CTA BOTTOM -->
    <section class="section-button-cta-bottom">
        <div class="container">
            <div class="row">
                <div class="col justify-content-end d-flex">
                    <a href="#" class="btn btn-need-help px-4">
                        Need help
                    </a>
                </div>
                <div class="col">
                <a href="{{ route('register') }}" class="btn btn-get-started px-4">
                        GET STARTED
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection