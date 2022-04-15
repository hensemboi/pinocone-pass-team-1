<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"/>

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700"/>

    <title>Pinocone</title>
</head>

<body>
    <div id="app">
        <div id="Hero-Image-1">
            <img src="/images/hero-1.jpeg" alt="hero-1.jpeg" style="width: 100%;"/>
            <div id="Hero-Text">
                <h1>We are here to help</h1>
                <p>We can offer you very good deals on a frequent basis.</p>
                <button class="btn-body">Check our full menu listing</button>
            </div>
        </div>

        <div>
            <div id="About-Us">
                <div class="row">
                    <div class="col-lg-7">
                        <img class="about-us" src="/images/about-us.jpeg" alt="about-us.jpeg"/>
                    </div>

                    <div class="col-lg-5">
                        <div id="About-Text">
                            <h1>About Us</h1>
                            <p>Pinocone Catering Company of Sarawak is one of the few catering companies that offers
                                catering services especially to schools and other companies in the state.</p>
                            <button class="btn-body">Learn more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div id="Hero-Image-2">
            <img src="/images/hero-2.jpeg" alt="hero-2.jpeg" style="width: 100%;"/>
            <div id="Hero-Text-2">
                <h1>JOIN US AND GET DISCOUNTS UP TO 50%</h1>
                <button class="btn-body">SIGN UP NOW</button>
            </div>
        </div>

        <div id="Order-Steps">
            <h1 id="Order-Heading">Order in 4 Simple Steps</h1>
            <div class="responsive">
                <div class="gallery">
                    <img src="/images/step1.png" alt="step1.png" width="600" height="400"/>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                    <img src="/images/step2.png" alt="step2.png" width="600" height="400"/>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                    <img src="/images/step3.png" alt="step3.png" width="600" height="400"/>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                    <img src="/images/step4.png" alt="step4.png" width="600" height="400"/>
                </div>
            </div>
        </div>

        <h1 id="Recommended-Menus">Recommendation Menus</h1>
        <div class="row">
            <recommended-menu menu="1"></recommended-menu>
            <recommended-menu menu="2"></recommended-menu>
            <recommended-menu menu="3"></recommended-menu>
        </div>

        <div class="row">
            <recommended-menu menu="4"></recommended-menu>
            <recommended-menu menu="5"></recommended-menu>
            <recommended-menu menu="6"></recommended-menu>
        </div>

        <footer>
            <div class="container">
                <div class="footer-row">
                    <div class="col-md-6">
                        <div class="footer-row">
                            <div class="col-md-6">
                                <div>
                                    <img src="/images/logo.png" class="logo-footer">
                                    <p>Jalan Tunku Abdul Rahman, 93100 Kuching, Sarawak</p>
                                </div>
                            </div>

                            <div class="col-md-6 px-4">
                                <h6>About Company</h6>
                                <p>Pinocone Catering Company of Sarawak is one of the few catering companies that offers
                                    catering services especially to schools and other companies in the state.</p>
                                <a href="#" class="btn-footer"> More Info </a><br>
                                <a href="#" class="btn-footer"> Contact Us</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="footer-row">
                            <div class="col-md-6 px-4">
                                <h6>Help Us</h6>
                                <div class="footer-row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">Service</a></li>
                                            <li><a href="#">Team</a></li>
                                            <li><a href="#">Help</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h6> Follow Us</h6>
                                <div class="social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bar">
                <div class="foot">
                    <ul>
                        <li><a href="">©Copyright </a> | </li>
                        <li><a href="">Privacy Policy </a> | </li>
                        <li><a href="">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{  mix('js/app.js') }}"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>
