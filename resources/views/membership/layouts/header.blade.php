<header class="sticky-top navigation">
    <div class=container>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
<<<<<<< Updated upstream
            <a class=navbar-brand href="{{ route('index') }}">
                <h1 class="mb-4">Pinocone</h1>
            </a>
=======
        <a class=navbar-brand href="{{ route('index') }}">
        <div class="col-lg-4 d-lg-block d-none">
                    <img src="{{ asset('assets') }}/images/logo.jpg" alt="Logo" class="img-fluid" width="50" height="50">
        </a>
                </div>
            
>>>>>>> Stashed changes
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                <i class="ti-align-right h4 text-dark"></i></button>
            <div class="collapse navbar-collapse text-center" id=navigation>
                <ul class="navbar-nav mx-auto align-items-center">
                    @if (Auth::guard('web')->check() == true)
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#MembershipPackages">Membership
                                Plans</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="/pinocone/profile">{{ Auth::guard('web')->user()->name }}</a></li>
                                @if (Auth::guard('web')->user()->package == '1')
                                <a href="/pinocone/basic" class="btn btn-sm btn-primary ml-lg-4">Basic</a>
                            @endif
                            @if (Auth::guard('web')->user()->package == '2')
                                <a href="/pinocone/standard" class="btn btn-sm btn-primary ml-lg-4">Standard</a>
                            @endif
                            @if (Auth::guard('web')->user()->package == '3')
                                <a href="/pinocone/premium" class="btn btn-sm btn-primary ml-lg-4">Premium</a>
                            @endif
                        <a href="/pinocone/logout" class="btn btn-sm btn-outline-primary ml-lg-4">Logout</a>


                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#MembershipPackages">Membership
                                Plans</a> </li>
                        <a href="/pinocone/login" class="btn btn-sm btn-outline-primary ml-lg-4">Login</a>
                        <a href="/pinocone/register" class="btn btn-sm btn-primary ml-lg-4">Register</a>
                    @endif
                </ul>

            </div>
        </nav>
    </div>
</header>
