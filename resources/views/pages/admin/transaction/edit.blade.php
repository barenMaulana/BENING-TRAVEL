@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Edit transaction {{$item->title}}</h1>
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
        <form action="{{ route('transaction.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
                <div class="form-group">
                    <select name="transaction_status" class="form-control">
                    <option value="{{ $item->transaction_status }}">KONFIRMASI PESANAN ( {{ $item->transaction_status }} )</option>
                    <option value="IN_CART">IN_CART</option>
                    <option value="SUCCESS">SUCCESS</option>
                    <option value="CANCEL">CANCEL</option>
                    <option value="FAILED">FAILED</option>
                    </select>
                </div>
            <button type="submit" class="btn btn-primary">Change</button>
        </form>
    </div>
</div>

</div>
@endsection