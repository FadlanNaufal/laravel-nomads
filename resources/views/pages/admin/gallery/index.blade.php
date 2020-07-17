@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
  <a href="{{route('gallery.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
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
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($items as $items)
                   <tr>
                        <td>{{$items->id}}</td>
                        <td>{{$items->travel_packages->title}}</td>
                        <td>
                            <img class="img-thumbnail" src="{{Storage::url($items->image)}}" alt="" style="width : 150px">

                        </td>
                        <td>
                            <a href="{{route('gallery.edit',$items->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('gallery.destroy',$items->id)}}" method="POST" class="d-inline">
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