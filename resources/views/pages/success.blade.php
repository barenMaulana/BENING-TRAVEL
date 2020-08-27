@extends('layouts.success')
@section('title', 'success')

@section('content')
    
<main>
    <!-- green-background -->
    <div class="background-success-checkout"></div>
    <!-- content -->
    <section class="section-success-checkout text-center">
        <div class="container">
            <!-- title -->
            <h1>Successful order</h1>
            <!-- new line -->
            <div class="row d-flex justify-content-center">
                <div class="col  text-center d-flex flex-column align-items-center">
                <img src="{{ url('/frontend/images/icon/ic_success_checkout.jpg') }}" alt="success">
                    <p>we have sent you an e-mail, <br> you can check and follow the next steps accourding to our direction, <br> thankyou for using<span> BeningTravel </span> services</p>
                    <!-- button -->
                    <a href="{{ route('home') }}" class="btn btn-success-checkout">Home</a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection