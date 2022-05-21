@extends('membership.layouts')
@section('title')
    Pinocone
@endsection
@section('extra-heads')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection
@section('content')
    <!-- banner -->
    <section class="section pb-0">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7 text-center text-lg-left">
                    <h1 class="mb-4">Buy Membership From Us.</h1>
                </div>

            </div>
        </div>
    </section>
    <!-- /banner -->
    <!-- topics -->
    <section class="section pb-0" id="MembershipPackages">
        <div class="container">
            <h2 class="section-title" align="center">Membership Packages</h2>
            <div class="row">
                <!-- topic -->
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card match-height">
                        <div class="card-body text-center">
                            <div class="div text-center" style="margin-bottom: 20px;"><i
                                    class="card-icon ti-panel mb-4"></i></div>
                            <h3 class="card-title h4">Basic Package</h3>
                            <p class="card-text">Get 10 Vouchers.</p>
                            <p class="card-text">Available For 30 Days.</p>
                            <div class="div text-center">
                                @if (Auth::guard('mem')->check() == true)
                                @if (Auth::guard('mem')->user()->package == '0')
                                    <a href="/membership/subscribe/basic" class="text-center btn btn-sm btn-primary "
                                        style="margin-top: 12px;">Subscribe</a>
                                @endif
                                @else
                                    <a href="/membership/subscribe/basic" class="text-center btn btn-sm btn-primary "
                                        style="margin-top: 12px;">Subscribe</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- topic -->
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card match-height">
                        <div class="card-body text-center">
                            <div class="div text-center" style="margin-bottom: 20px;"><i
                                    class="card-icon ti-credit-card mb-4"></i></div>
                            <h3 class="card-title h4">Standard Package</h3>
                            <p class="card-text">Get 15 Vouchers.</p>
                            <p class="card-text">Available For 30 Days.</p>
                            <div class="div text-center">
                                @if (Auth::guard('mem')->check() == true)
                                @if (Auth::guard('mem')->user()->package == '0')
                                    <a href="/membership/subscribe/standard" class="text-center btn btn-sm btn-primary "
                                        style="margin-top: 12px;">Subscribe</a>
                                @endif
                                @else
                                <a href="/membership/subscribe/standard" class="text-center btn btn-sm btn-primary "
                                        style="margin-top: 12px;">Subscribe</a>
                            @endif
                            </div>
                        </div>

                    </div>
                </div>
                <!-- topic -->
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card match-height">
                        <div class="card-body text-center">
                            <div class="div text-center" style="margin-bottom: 20px;"><i
                                    class="card-icon ti-package mb-4"></i></div>
                            <h3 class="card-title h4">Premium Package</h3>
                            <p class="card-text">Get 20 Vouchers.</p>
                            <p class="card-text">Available For 30 Days.</p>
                            <div class="div text-center">
                                @if (Auth::guard('mem')->check() == true)
                                @if (Auth::guard('mem')->user()->package == '0' ?? '')
                                    <a href="/membership/subscribe/premium" class="text-center btn btn-sm btn-primary "
                                        style="margin-top: 12px;">Subscribe</a>
                                @endif
                                @else
                                <a href="/membership/subscribe/premium" class="text-center btn btn-sm btn-primary "
                                style="margin-top: 12px;">Subscribe</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /topics -->
    <!-- call to action -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-8 text-lg-left text-center">
                    <h2 class="mb-3">Do you need some help?</h2>
                    <a href="/membership/contact-us" class="btn btn-primary">Submit a Question?</a>
                </div>
            </div>
        </div>
    </section>
    <! @endsection @section('extra-scripts') <script>
        @if (Session::has('message'))
            toastr.options = {
            "closeButton": true
            , "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
@endsection
