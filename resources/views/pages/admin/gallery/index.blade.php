@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
<a href="{{ route('gallery.create') }}" class="btn btn-primary shadow-sm btn-sm">
    <i class="fa fa-plus fa-sm text-white-50"></i>Add Gallery
</a>
</div>

<div class="row">
    <div class="card-body">
        <div class="table table-responsive text-center">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Travel</th>
                        <th>Image</th>                                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($items as $item)
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->travel_package->title }}</td>
                        <td> 
                            <img src="{{ Storage::url($item->image) }}" class="img-thumbnail" style="width:150px">
                        </td>
                        <td>
                            <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-primary">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" class="d-inline" onclick="return confirm('Data akan terhapus')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data kosong
                                </td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection