@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
  <a href="{{route('travel-packages.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Departure Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($items as $items)
                   <tr>
                        <td>{{$items->id}}</td>
                        <td>{{$items->title}}</td>
                        <td>{{$items->location}}</td>
                        <td>{{$items->type}}</td>
                        <td>{{$items->departure_date}}</td>
                        <td>
                            <a href="{{route('travel-packages.edit',$items->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('travel-packages.destroy',$items->id)}}" method="POST" class="d-inline">
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