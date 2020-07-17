@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{$item->title}}</h1>
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
            <form action="{{route('travel-packages.update',$item->id)}}" method="POST">
                @csrf  @method('PUT')
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title"  value="{{$item->title}}">
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" class="form-control" name="location" value="{{$item->location}}">
                </div>
                <div class="form-group">
                    <label for="">About</label>
                    <textarea name="about" class="d-block w-100 form-control">
                        {{$item->about}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Featured Event</label>
                    <input type="text" class="form-control" name="featured_event" value="{{$item->featured_event}}">
                </div>
                <div class="form-group">
                    <label for="">Language</label>
                    <input type="text" class="form-control" name="languages" value="{{$item->languages}}">
                </div>
                <div class="form-group">
                    <label for="">Foods</label>
                    <input type="text" class="form-control" name="foods" value="{{$item->foods}}">
                </div>
                <div class="form-group">
                    <label for="">Departure Date</label>
                    <input type="date" class="form-control" name="departure_date" value="{{$item->departure_date}}">
                </div>
                <div class="form-group">
                    <label for="">Duration</label>
                    <input type="text" class="form-control" name="duration" value="{{$item->duration}}">
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" class="form-control" name="type" value="{{$item->type}}">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" value="{{$item->price}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection