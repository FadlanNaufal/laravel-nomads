@extends('layouts.success')
@section('title','Checkout Success')
@section('content')
<main>
    <section class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{url('frontend/images/success.png')}}" class="img-success" alt="">
            <h1>Yeay! Success</h1>
            <p>We've sent you email for trip instruction <br> Please read it well</p>
            <a href="{{route('home')}}" class="btn btn-homepage mt-3 px-5">
                Home Page
            </a>
        </div>
    </section>
</main>
@endsection
