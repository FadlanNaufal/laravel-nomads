@extends('layouts.checkout ')
@section('title','Checkout')
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
                            <li class="breadcrumb-item">Details</li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who is going ?</h1>
                        <p>Trip to {{$item->tp->title}},{{$item->tp->location}}</p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @forelse($item->details as $details)
                                            <tr>
                                                <td>
                                                    <img class="rounded-circle" src="https://ui-avatars.com/api/name={{$details->username}}" alt="" width="60">
                                                </td>
                                                <td class="align-middle">{{$details->username}}</td>
                                                <td class="align-middle">{{$details->nationality}}</td>
                                                <td class="align-middle">{{$details->is_visa ? '30 Days' : 'N/A'}}</td>
                                                <td class="align-middle">
                                                    {{\Carbon\Carbon::createFromDate($details->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('checkout.remove',$details->id)}}" class="ic-remove">X</a>
                                                </td>
                                            </tr>
                                       @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Visitor</td>
                                            </tr>
                                       @endforelse
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form method="POST" action="{{route('checkout.create',$item->id)}}" class="form-inline">
                                @csrf
                                <label for="username" class="sr-only">Name</label>
                                <input type="text" placeholder="Username" name="username" class="form-control mb-2 mr-sm-2">

                                <label for="" class="sr-only">Nationality</label>
                                <input type="text" style="width : 50px" placeholder="Nationality" name="nationality" class="form-control mb-2 mr-sm-2">
                                
                                <label for="name" class="sr-only">Visa</label>
                                <select name="is_visa" id="" class="custom-select mb-2 mr-sm-2">
                                    <option value="" selected>VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>

                                <label for="name" class="sr-only">Date</label>
                                <div class="input-group-append mb-2 mr-sm-2">
                                    <input type="text" name="doe_passport" class="form-control datepicker" placeholder="Date">
                                </div>

                                <button class="btn btn-add-now mb-2 px-4">
                                    Add Now
                                </button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-">
                                You are only able to invite another members
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Trip Informations</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">{{$item->details->count()}} person</td>
                            </tr>
                            <tr>
                                <th width="50%">Addition VISA</th>
                                <td width="50%" class="text-right">${{$item->additional_visa}},00</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">${{$item->tp->price}},00 / Person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">$ {{$item->transaction_total}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique Code)</th>
                                <td width="50%" class="text-right">$ {{$item->transaction_total}},{{mt_rand(0,99)}}</td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payment Instructions</h2>
                        <p class="payment-instruction">
                            Please complete your payment before to continue the wonderful trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="https://img.icons8.com/dusk/64/000000/insert-credit-card.png" class="bank-image"/>
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        085810954907
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="https://img.icons8.com/dusk/64/000000/insert-credit-card.png" class="bank-image"/>
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        085810954907
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{route('checkout.success',$item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">
                            I Have Made a Payment
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <div class="text-muted">
                            <a href="{{route('detail',$item->tp->slug)}}">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('prepand-style')
<link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
<style>
    .ic-remove{
        font-weight: bold;
        font-size: 15px;
        color: black;
    }
</style>
@endpush
@push('addon-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format : 'yyyy-mm-dd',
            uiLibrary : 'bootstrap4',
        })
    });
</script>
@endpush