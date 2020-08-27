@extends('layouts.checkout')
@section('title', 'Checkout')

@section('content')
<main>
    <section class="section-details-header-checkout"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item">
                                Detail
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="details-heading">
                            <h1>Registered</h1>
                        <p class="mb-4">{{$item->travel_package->title}}, {{ $item->travel_package->location }}</p>
                        </div>
                        <div class="attendee">
                            <div class="d-flex justify-content-center">
                                <table class="table-responsive-sm text-center" cellpadding="10" cellspacing="0">
                                    <tr class="border-bottom">
                                        <th>photo</th>
                                        <th>name</th>
                                        <th>VISA</th>
                                        <th>passport</th>
                                        <th>country</th>
                                        <th></th>
                                    </tr>
                                    @forelse ($item->details as $detail)
                                        <tr>
                                            <td>
                                            <img src="http://ui-avatars.com/api/?name={{ $detail->username }}"
                                                    width="50" class="rounded-cirlce">
                                            </td>
                                            <td>{{ $detail->username }}</td>
                                            <td>{{ $detail->is_visa ? "30Days" : "N/A" }}</td>
                                            <td>{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}</td>
                                            <td>{{ $detail->country }}</td>
                                            <td>
                                                <a href="{{ route('checkout_remove',$detail->id) }}">
                                                <img src="{{ url('/frontend/images/icon/ic_remove.png') }}" alt="remove">
                                                </a>
                                            </td>
                                        </tr>    
                                    @empty
                                        <tr>
                                            <td collspan="6" class="text-center">
                                                no visitor
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <hr>

                        <!-- form -->
                        <div class="container member mt-4">
                            <h5>Add new</h5>
                            <form class="form-row" method="post" action="{{ route('checkout_create', $item->id) }}">
                                @csrf
                                <div class="form-group col-md-3">
                                    <label for="username" class="sr-only">name</label>
                                    <input type="text" class="form-control mr-sm-2 mb-2" placeholder="username"
                                        id="username" name="username" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="Country" class="sr-only">name</label>
                                    <input type="text" class="form-control mr-sm-2 mb-2" placeholder="Country"
                                        id="Country" name="country" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="is_visa" class="sr-only">VISA</label>
                                    <select name="is_visa" id="inputVISA" class="custom-select mr-sm-2 mb-2" required>
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="doe_passport" class="sr-only">date</label>
                                    <div class="input-group mr-sm-2 mb-2">
                                        <input type="text" class="form-control datepicker" id="doePassport"
                                            name="doe_passport" placeholder="DOE" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <button class="btn btn-add-member px-4  my-sm-0" name="submit"
                                        type="submit">Add</button>
                                </div>
                            </form>

                            <div class="note-checkout">
                                <h6 class="text-muted mb-0 mt-4">note :</h6>
                                <p class="text-muted">you can only add fellow beningtravel members
                                    who have registered at beningtravel</p>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- RIGHT CARD -->
                <div class="col-lg-4">
                    <div class="card details-card-information">
                        <h2>Checkout
                            <hr>
                        </h2>
                        <table>
                            <tr>
                                <th>Member</th>
                                <td>{{ $item->details->count() }} person</td>
                            </tr>
                            <tr>
                                <th>VISA</th>
                            <td>$ {{ $item->additional_visa }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                            <td>$ {{ $item->travel_package->price }}, <i> {{ mt_rand(11,99) }} </i>/ person</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                            <td>$ <span>{{ $item->transaction_total }}</span></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>$ {{ $item->travel_package->price }} / person </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="payment-method mt-2">
                            <h4>Payment</h4>
                            <div class="row d-flex">
                                <div class="col col-md-7  m-auto">
                                <img src="{{ url('/frontend/images/icon/ic_bank.png') }}" alt="ic_bank" class="mr-2">
                                    <p>PT BeningTravel <br>
                                        Bank central asia <br>
                                        0909237905</p>
                                </div>
                                <div class="col col-md-7  m-auto">
                                <img src="{{ url('/frontend/images/icon/ic_bank.png') }}" alt="ic_bank" class="mr-2">
                                    <p>PT BeningTravel <br>
                                        May bank<br>
                                        0909237905</p>
                                </div>
                            </div>
                        </div>
                    <a href="{{ route('checkout_success', $item->id) }}" class="btn btn-join-trip py-2 d-block">
                            I have already paid
                        </a>
                    </div>
                    <div class="text-center text-muted">
                        <a href="{{ route('detail', $item->travel_package->slug) }}" class="muted">
                        cancel booking</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('/frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('prepend-script')
<script src="{{ url('/frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
@endpush

@push('addon-script')
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('frontend/images/icon/ic_date.png') }}" />'
            }
        });
    });
</script>
@endpush