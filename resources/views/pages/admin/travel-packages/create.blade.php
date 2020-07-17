@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('travel-packages.store')}}" method="POST">
                @csrf 
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title"  value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" class="form-control" name="location" value="{{old('location')}}">
                </div>
                <div class="form-group">
                    <label for="">About</label>
                    <textarea name="about" class="d-block w-100 form-control">
                        {{old('about')}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Featured Event</label>
                    <input type="text" class="form-control" name="featured_event" value="{{old('featured_event')}}">
                </div>
                <div class="form-group">
                    <label for="">Language</label>
                    <input type="text" class="form-control" name="languages" value="{{old('language')}}">
                </div>
                <div class="form-group">
                    <label for="">Foods</label>
                    <input type="text" class="form-control" name="foods" value="{{old('foods')}}">
                </div>
                <div class="form-group">
                    <label for="">Departure Date</label>
                    <input type="date" class="form-control" name="departure_date" value="{{old('departure_date')}}">
                </div>
                <div class="form-group">
                    <label for="">Duration</label>
                    <input type="text" class="form-control" name="duration" value="{{old('duration')}}">
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" class="form-control" name="type" value="{{old('type')}}">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" value="{{old('price')}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection