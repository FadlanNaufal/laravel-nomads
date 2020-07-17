@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Travel</th>
                        <th>User</th>
                        <th>Visa</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($items as $items)
                   <tr>
                        <td>{{$items->id}}</td>
                        <td>{{$items->tp->title}}</td>
                        <td>{{$items->user->name}}</td>
                        <td>{{$items->additional_visa}}</td>
                        <td>{{$items->transaction_total}}</td>
                        <td>{{$items->transaction_status}}</td>
                        <td>
                            <a href="{{route('transaction.show',$items->id)}}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('transaction.edit',$items->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('transaction.destroy',$items->id)}}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                   @empty
                    <tr>
                        <td colspan="6" class="text-center">No Data</td>
                    </tr>
                   @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection