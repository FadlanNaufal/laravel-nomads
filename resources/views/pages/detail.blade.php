@extends('layouts.app')
@section('title','Detail Travel')
@section('content')
<main>
<section class="section-details-header"></section>
<section class="section-details-content">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Paket Travel</li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                    <h1>{{$item->title}}</h1>
                    <p>{{$item->location}}</p>
                   
                    @if($item->Gallery->count())
                    <div class="gallery">
                        <div class="xzoom-container">
                            <img class="xzoom" width="100%" height="400" id="xzoom-default" 
                            xoriginal="{{Storage::url($item->Gallery->first()->image)}}" src="{{Storage::url($item->Gallery->first()->image)}}" alt="">
                        </div>
                        <div class="xzoom-thumbs">
                            @foreach($item->Gallery as $gallery)
                            <a href="{{Storage::url($gallery->image)}}">
                                <img class="xzoom-gallery" height="128" width="128" xpreview="{{Storage::url($gallery->image)}}" src="{{Storage::url($gallery->image)}}" alt="">
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <h2>About Trip</h2>
                    <p>{!!$item->about!!}</p>
                    <div class="features row">
                        <div class="col-md-4">
                            <div class="description">
                                <img class="img-icon" src="{{url('frontend/images/icons/ticket.png')}}" alt="">
                                <h3>Featured Event</h3>
                                <p>{{$item->featured_event}}</p>
                            </div>
                        </div>
                            <div class="col-md-4 border-left">
                            <div class="description">
                                <img class="img-icon" src="{{url('frontend/images/icons/language.png')}}" alt="">
                                <h3>Language</h3>
                                <p>{{$item->languages}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 border-left">
                            <div class="description">
                                <img class="img-icon" src="{{url('frontend/images/icons/breakfast.png')}}" alt="">
                                <h3>Foods</h3>
                                <p>{{$item->foods}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-details card-right">
                    <h2>Members are going</h2>
                    <div class="members my-2">
                        <img src="/frontend/images/anggaphoto.png" alt="" class="members-img mr-2 rounded-circle">
                        <img src="https://randomuser.me/api/portraits/women/16.jpg" alt="" class="members-img mr-2 rounded-circle">
                        <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="" class="members-img mr-2 rounded-circle">
                        <img src="https://randomuser.me/api/portraits/men/83.jpg" alt="" class="members-img mr-2 rounded-circle">
                    </div>
                    <hr>
                    <h2>Trip Informations</h2>
                    <table class="trip-information">
                        <tr>
                            <th width="50%">Date of Departure</th>
                            <td width="50%" class="text-right">{{\Carbon\Carbon::create($item->departure_date)->format('F n Y')}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Duration</th>
                            <td width="50%" class="text-right">{{$item->duration}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Type</th>
                            <td width="50%" class="text-right">{{$item->type}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Price</th>
                            <td width="50%" class="text-right">${{$item->price}},00/ Person</td>
                        </tr>
                    </table>
                </div>
                <div class="join-container">
                    @auth
                        <form action="{{route('checkout.process',$item->id)}}" method="POST">
                            @csrf 
                            <button class="btn btn-block btn-join-now mt-3 py-2">
                                Join Now
                            </button>
                        </form>
                    @endauth
                    @guest
                    <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                        Login or Register to Join
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
@push('prepand-style')
<link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush
@push('addon-script')
<script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth : 500,
                title : false,
                tint : '#333',
                Xoffset : 15
            });
        });
    </script>
@endpush