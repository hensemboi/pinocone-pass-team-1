@extends('membership.layouts')
@section('title')
    Pinocone | Register Page
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
                    <h1 class="mb-4">Register Your Account</h1>
                    <form class="search-wrapper" method="POST" action="/post/membership/register">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter Your Name...">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter Your Email...">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter Your Password...">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" style="margin-top: 12px;">Register</button>
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
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

</script>
@endsection
