<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pinocone | Feedback Page</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/themify-icons/themify-icons.css">
    <!-- Main Stylesheet -->
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.html" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets') }}/images/favicon.html" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
    <header class="sticky-top navigation">
        <div class=container>
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <a class=navbar-brand >
                    <div class="col-lg-3 d-lg-block d-none">
                        <img src="{{ asset('assets') }}/images/logo.jpg" alt="Logo" class="img-fluid" width="50"
                            height="50" style="    border-radius: 10px;">
                </a>
        </div>

        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
            <i class="ti-align-right h4 text-dark"></i></button>

        </nav>
        </div>
    </header>
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
                                <textarea name="message" id="message" class="form-control"
                                    placeholder="Enter your comments (15/600 characters)..."></textarea>
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
    <footer>
        <div class="container">
            <div class="row align-items-center border-bottom py-5">
                <div class="col-lg-4">
                    <a href="/pinocone/contact-us" class="btn btn-sm btn-primary ml-lg-4" data-toggle="modal" data-target="#exampleModal">Contact Us</a>

                </div>
                <div class="col-lg-4 text-center mb-4 mb-lg-0">
                    <a class="navbar-brand" href="{{ route('index') }}">

                    </a>
                </div>
                <div class="col-lg-4">
                    <ul class="list-inline social-icons text-lg-right text-center">
                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>


                    </ul>
                </div>
            </div>

        </div>
    </footer>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Conatct Us</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="container">
                <form method="POST" action="/post/pinocone/contact-us">
                    @csrf
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
                        <label for="reason">Reason of Contact</label>
                        <select id="reason" class="form-control custom-select" name="reason">
                            <option selected disabled>Choose Your Reason</option>
                            <option value="menu">Menu</option>
                            <option value="membership">Membership Packages</option>
                            <option value="Promotions">Project</option>
                        </select>
                        @if ($errors->has('reason'))
                            <span class="text-danger">{{ $errors->first('reason') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message">Start Writing From Here</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Your Text here ..."></textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- plugins -->
    <script src="{{ asset('assets') }}/plugins/jQuery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/masonry/masonry.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/clipboard/clipboard.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/match-height/jquery.matchHeight-min.js"></script>

    <!-- Main Script -->
    <script src="{{ asset('assets') }}/js/script.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
            "closeButton": true
            , "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
</body>

</html>
