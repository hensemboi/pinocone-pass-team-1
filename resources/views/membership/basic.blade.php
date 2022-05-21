@extends('membership.layouts')
@section('title')
    Pinocone | Basic Plan
@endsection
@section('extra-heads')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection
@section('content')
    <section class="section pb-0">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7 text-center text-lg-left">
                    <h1 class="mb-4" style="text-align: center">You have Basic Plan Activated</h1>
                    <div class="card match-height">
                        <div class="card-body text-center">
                            <div class="div text-center" style="margin-bottom: 20px;"><i class="card-icon ti-panel mb-4"></i>
                            </div>
                            <h3 class="card-title h4">Basic Package</h3>
                            <p class="card-text">10 Vouchers.</p>
                            <p class="card-text">Available For 30 Days.</p>
                            <p class="card-text">Your Package Will Be Expire at : {{ Auth::guard('mem')->user()->expires_at }}</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection
@section('extra-scripts')
    <script>
        @if (Session::has('message'))
            toastr.options = {
            "closeButton": true
            , "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
@endsection