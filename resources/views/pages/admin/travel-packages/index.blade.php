@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
<a href="{{ route('travel-packages.create') }}" class="btn btn-primary shadow-sm btn-sm">
    <i class="fa fa-plus fa-sm text-white-50"></i> Add travel package
</a>
</div>

<div class="row">
    <div class="card-body">
        <div class="table table-responsive text-center">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>About</th>
                        <th>Departure date</th>
                        <th>Duration</th>
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
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->about }}</td>
                        <td>{{ $item->departure_date }}</td>
                        <td>{{ $item->duration }} Days</td>
                        <td>
                            <a href="{{ route('travel-packages.edit', $item->id) }}" class="btn btn-primary">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('travel-packages.destroy', $item->id) }}" method="POST" class="d-inline" onclick="return confirm('Data akan terhapus')">
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