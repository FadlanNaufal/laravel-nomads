@extends('layouts.app')
@section('title','NOMADS')
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
@section('content')
<header class="text-center">
        <h1>Explore The Beautiful World <br> As Easy One Click</h1>
        <p class="mt-3">You Will See Beautiful <br> Moment You Never See</p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">Get Started</a>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20K</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>3K</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>

        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>Something that you never try <br> Before in this world</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach($tp as $tp)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column" 
                        style="background-image: url('{{$tp->Gallery->count() ? Storage::url($tp->Gallery->first()->image) : ''}}');"
                        >
                            <div class="travel-country">{{$tp->location}}</div>
                            <div class="travel-location">{{$tp->title}}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{route('detail',$tp->slug)}}" class="btn btn-travel-details px-4">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-network">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>Companies are trusted us <br> more than just a trip</p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img class="img-partner mx-auto" src="/frontend/images/1.png" alt="">
                        <img class="img-partner mx-auto" src="/frontend/images/2.png" alt="">
                        <img class="img-partner mx-auto" src="/frontend/images/4.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-heading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>Moments were giving them <br> the best experiences</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-content">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img class="mb-4 rounded-circle img-testimonial" src="/frontend/images/anggaphoto.png" alt="">
                                <h3 class="mb-4">Angga Risky</h3>
                                <p class="testimonial">
                                    "It was glorious and i couldnt stop to say wohoo for every single moment Dankeee"
                                </p>
                                <hr>
                                <p class="trip-to mt-2">
                                    Trip to Ubud
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img class="mb-4 rounded-circle img-testimonial" src="/frontend/images/anggaphoto.png" alt="">
                                <h3 class="mb-4">Shayna</h3>
                                <p class="testimonial">
                                    "The trip was amazing and i saw something beautiful in that island that makes me want to learn more"
                                </p>
                                <hr>
                                <p class="trip-to mt-2">
                                    Trip to Nusa Peninda
                                </p>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img class="mb-4 rounded-circle img-testimonial" src="/frontend/images/anggaphoto.png" alt="">
                                <h3 class="mb-4">Shabrina</h3>
                                <p class="testimonial">
                                   "I love it when the waves shaking harder, i was scared too"
                                </p>
                                <hr>
                                <p class="trip-to mt-2">
                                    Trip to Karimun Jawa
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="" class="btn btn-need-help px-4 mt-4 mx-1">
                            I Need Help
                        </a>
                        <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection