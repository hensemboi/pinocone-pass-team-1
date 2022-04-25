@extends('membership.layouts')
@section('title')
    Pinocone | Login Page
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
                    <h1 class="mb-4">Login To Your Account</h1>
                    <form class="search-wrapper" action="/post/pinocone/login" method="POST">
                        @if (session('error'))
                            <div class="alert alert-danger m-4 text-center ml-3">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter Your Email...">
                            </div>
                            <div class="col-12">
                                <label for="">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter Your Password...">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" style="margin-top: 12px;">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
@endsection
@section('extra-scripts')
<script>
    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.success("{{ session('error') }}");
    @endif

</script>
@endsection
