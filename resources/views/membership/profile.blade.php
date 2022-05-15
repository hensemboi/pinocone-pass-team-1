@extends('membership.layouts')
@section('title')
    Pinocone | {{ Auth::guard('web')->user()->name }}'s Profile
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
                    <h1 class="mb-4">Update Your Account</h1>
                    <div style="text-align: center; margin-bottom: 40px; ">
                        @if (Auth::guard('web')->user()->package == '1')
                            <a href="/membership/basic"> <button type="submit" class="btn btn-primary" style="margin-top: 12px;">Basic
                                    MemberShip
                                    Activated</button></a>
                        @endif
                        @if (Auth::guard('web')->user()->package == '2')
                            <a href="/membership/standard">
                                <button type="submit" class="btn btn-primary" style="margin-top: 12px;">Standard MemberShip
                                    Activated</button>
                            </a>
                        @endif
                        @if (Auth::guard('web')->user()->package == '3')
                            <a href="/membership/premium">
                                <button type="submit" class="btn btn-primary" style="margin-top: 12px;">Premium MemberShip
                                    Activated</button>
                            </a>
                        @endif
                        @if (Auth::guard('web')->user()->package == null)
                            <button type="submit" class="btn btn-primary" style="margin-top: 12px;">You dont have MemberShip
                                Activated</button>
                        @endif
                    </div>
                    <form class="search-wrapper" method="POST" action="/post/membership/profile">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name"
                                    value="{{ Auth::guard('web')->user()->name }}" name="name"
                                    placeholder="Enter Your Name...">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" readonly
                                    value="{{ Auth::guard('web')->user()->email }}" name="email"
                                    placeholder="Enter Your Email...">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" style="margin-top: 12px;">Update</button>
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
        @if (Session::has('message'))
            toastr.options = {
            "closeButton": true
            , "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
@endsection
