@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Travel Package</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('travel-packages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="location" placeholder="Location" value="{{ old('location') }}">
            </div>
            <div class="form-group">
                <textarea name="about" rows="10" class="d-block w-100 form-control" placeholder="About" >{{ old('about') }} </textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="featured_event" placeholder="Featured event" value="{{ old('featured_event') }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="language" placeholder="Language" value="{{ old('language') }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="foods" placeholder="Food" value="{{ old('foods') }}">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="departure_date" placeholder="Departure date" value="{{ old('departure_Date') }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="duration" placeholder="Duration trip" value="{{ old('duration') }}">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="seat" placeholder="Seat" value="{{ old('seat') }}">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>

</div>
@endsection