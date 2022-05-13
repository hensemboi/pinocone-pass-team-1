@extends('membership.layouts')
@section('title')
    Pinocone | Feedback Page
@endsection
@section('extra-heads')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="p-5 shadow rounded content">
                        <h2 class="section-title">Get us a Feedback</h2>
                        <form method="POST" action="/post/feedback">
                            @csrf
                            <h5 class="text-center" id="exampleModalLabel">Tell us about yourself.</h5>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname"
                                        placeholder="Your First Name">
                                    @if ($errors->has('fname'))
                                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname"
                                        placeholder="Your Last Name">
                                    @if ($errors->has('lname'))
                                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Your Email Address">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="Your Phone Number">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <h5 class="text-center" id="exampleModalLabel">Give us your feedback.</h5>
                            <div class="form-group">
                                <label for="message">Start Writing From Here...</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Enter your comments (15/600 characters)..."></textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                            <h5 class="text-center" id="exampleModalLabel">Tell us about your item Purchase.</h5>
                            <div class="form-group">
                                <label for="email">Product name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Which product you buy from us?">
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Product Quality</label>
                                <input type="text" class="form-control" id="quality" name="quality"
                                    placeholder="Do you like the quality of the product?">
                                @if ($errors->has('quality'))
                                    <span class="text-danger">{{ $errors->first('quality') }}</span>
                                @endif
                            </div>
                            <p class="text-center">
                                <button type="submit" class="btn btn-primary text-center">Send</button>
                            </p>
                        </form>
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
