@extends('layouts.app')
@section('title', 'detail page')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item active">
                                Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!--LEFT CARD -->
                <div class="col-lg-8">
                    <section class=" card section-details-card" id="detail">
                        <div class="details-heading">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>
                        </div>
                        @if ($item->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                            <img src="{{ Storage::url($item->galleries->first()->image) }}" alt="bigpic" class="xzoom"
                            xoriginal="{{ Storage::url($item->galleries->first()->image) }}" id="xzoom-default">
                            </div>
                            <div class="xzoom-thumbs">
                            @foreach ($item->galleries as $gallery)
                                    <a href="{{ Storage::url($gallery->image) }}">
                                            <img class="xzoom-gallery" width="50"
                                    src="{{ Storage::url($gallery->image) }}"
                                    xpreview="{{ Storage::url($gallery->image) }}">
                                </a>
                            @endforeach
                        </div>
                        @endif
                        <hr>
                        <div class="details-description">
                            <span>description:</span> <br>
                            {{!! $item->about !!}}
                        </div>
                        <hr>
                        <div class="details-features">
                            <div class="row justify-content-center">
                                <div class="col-md-4 ">
                                <img src="{{ url('frontend/images/icon/ic_event.png') }}" alt="event">
                                    <div class="description">
                                        <h6>Featured Event</h6>
                                    <p>{{ $item->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                <img src="{{ url('frontend/images/icon/ic_bahasa.png') }}" alt="language">
                                    <div class="description">
                                        <h6>Language</h6>
                                    <p>{{ $item->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                <img src="{{ url('frontend/images/icon/ic_food.png') }}" alt="foods">
                                    <div class="description">
                                        <h6>Foods</h6>
                                        <p>{{ $item->foods }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- RIGHT CARD -->
                <div class="col-lg-4">
                    <div class="card details-card-information">
                        <h2>Members are going</h2>
                        <div class="members justify-content-around d-flex">
                        <img src="{{ url('frontend/images/details/members/member-1.png') }}" alt="member">
                        <img src="{{ url('frontend/images/details/members/member-2.png') }}" alt="member">
                        <img src="{{ url('frontend/images/details/members/member-3.png') }}" alt="member">
                        <img src="{{ url('frontend/images/details/members/member-4.png') }}" alt="member">
                        <img src="{{ url('frontend/images/details/members/member-5.png') }}" alt="member">
                        </div>
                        <hr>
                        <h6 class=" text-center">Details</h6>
                        <table>
                            <tr>
                                <th>Package name</th>
                            <td>{{ $item->title }}</td>
                            </tr>
                            <tr>
                                <th>departure date</th>
                            <td>{{ \Carbon\Carbon::create($item->departure_date)->format('F n, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                            <td>{{ $item->duration }}Days</td>
                            </tr>
                            <tr>
                                <th>Remaining seat</th>
                            <td>{{ $item->seat }}<i> seat</i></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><b>$</b>{{ $item->price }} / person </td>
                            </tr>
                        </table>
                        @auth
                        <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-join-trip py-2 d-block">
                                Join trip
                            </button>
                        </form>
                        @endauth
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-join-trip py-2 d-block">
                            Login or register to join
                        </a>
                        @endguest

                    </div>
                </div>

            </div>
        </div>

        <!-- END OF DETAILS CONTENT -->
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('prepend-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
@endpush

@push('addon-script')
<script>
    $(document).ready(function () {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 400,
            title: false,
            tint: "#073A33",
            Xoffset: 15
        });
    });
</script>
@endpush