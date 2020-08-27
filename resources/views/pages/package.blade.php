@extends('layouts.app')
@section('title')
    BeningTravel | trusted travel company
@endsection

@section('content')

<main>
    <div class="container ">
        <section class="section-popular-heading">
            <div class="container">
                <div class="popular-title text-center">
                    <h2 id="popular">Paket yang tersedia</h2>
                </div>
            </div>
        </section>

        <div class="row m-5">
            <div class="col col-12">
                <form action="{{ route('search') }}" method="get" class="form-inline">
                    @csrf
                    <input type="text" name="location" class="form-control" value="{{ old('cari') }}">
                    <button type="submit" class="btn btn-outline-success">cari</button>
                </form>
                <hr>
            </div>
        </div>

        <section class="section-popular-content" id="paketPopular">
            <div class="container">
                    <div class="row section-content justify-content-center">
                    @forelse ($items as $item)
                        <div class="col-sm-6 col-md-2 m-3 card-travel text-center d-flex flex-column shadow"
                            style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                            <div class="country-name">
                                {{ $item->location }}
                            </div>
                            <div class="location-name">
                                {{ $item->title }}
                            </div>
                            <div class="button-card mt-auto">
                                <a href="{{ route('detail', $item->slug) }}" class="btn btn-check-it text-white">
                                    Check it
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-muted text-center">
                            <h6>Paket travel kosong</h6>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</main>
@endsection