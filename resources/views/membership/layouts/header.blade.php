<header class="sticky-top navigation">
    <div class=container>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <a class=navbar-brand href="{{ route('index') }}">
        <div class="col-lg-3 d-lg-block d-none">
                    <img src="{{ asset('assets') }}/images/logo.jpg" alt="Logo" class="img-fluid" width="50" height="50" style="    border-radius: 10px;">
        </a>
                </div>

            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                <i class="ti-align-right h4 text-dark"></i></button>
            <div class="collapse navbar-collapse text-center" id=navigation>
                <ul class="navbar-nav mx-auto align-items-center">
                    @if (Auth::guard('web')->check() == true)
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#MembershipPackages">Membership
                                Plans</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('get.feedback') }}">Feedback</a></li> --}}
                                <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#exampleModal">Feedback</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="/membership/profile">{{ Auth::guard('web')->user()->name }}</a></li>
                                @if (Auth::guard('web')->user()->package == '1')
                                <a href="/membership/basic" class="btn btn-sm btn-primary ml-lg-4">Basic</a>
                            @endif
                            @if (Auth::guard('web')->user()->package == '2')
                                <a href="/membership/standard" class="btn btn-sm btn-primary ml-lg-4">Standard</a>
                            @endif
                            @if (Auth::guard('web')->user()->package == '3')
                                <a href="/membership/premium" class="btn btn-sm btn-primary ml-lg-4">Premium</a>
                            @endif
                        <a href="/membership/logout" class="btn btn-sm btn-outline-primary ml-lg-4">Logout</a>


                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#MembershipPackages">Membership
                                Plans</a> </li>

                        <a href="/membership/login" class="btn btn-sm btn-outline-primary ml-lg-4">Login</a>
                        <a href="/membership/register" class="btn btn-sm btn-primary ml-lg-4">Register</a>
                    @endif
                </ul>

            </div>
        </nav>
    </div>
</header>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Feedback To Pinocone</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="container">
            <form method="POST" action="/post/feedback">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" value="{{ Auth::guard('web')->user()->name ?? '' }}"  readonly id="name" name="name"
                            placeholder="Your Name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ Auth::guard('web')->user()->email ?? '' }}" readonly class="form-control" id="email" name="email"
                            placeholder="Your Email Address">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
