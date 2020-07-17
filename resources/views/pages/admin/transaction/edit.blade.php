@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Transaction {{$item->title}}</h1>
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
            <form action="{{route('transaction.update',$item->id)}}" method="POST">
                @csrf  @method('PUT')
                <div class="form-group">
                    <label for="">Transaction Status</label>
                    <select name="transaction_status" id="" class="form-control">
                        <option value="{{$item->transactin_status}}">Jangan Ubah ({{$item->transaction_status}})</option>
                        <option value="IN_CART">In Cart</option>
                        <option value="PENDING">Pending</option>
                        <option value="SUCCESS">Success</option>
                        <option value="CANCEL">Cancel</option>
                        <option value="FAILED">Failed</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection