<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- BOOTSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/home.css">

    <title>Pinocone</title>
  </head>
  
  <body>
    <div id="Hero-Image">
      <div id="Hero-Text">
        <h1>Hero image</h1>
        <p>Description</p>
        <button>Button</button>
      </div>
    </div>

    <div id="About-Us">
      <div class="row">
        <div class="col-lg-7">
          <img class="about-us" src="/images/about-us.jpg" alt="about-us.jpg"/>
        </div>
        
        <div class="col-lg-5">
          <div id="About-Text">
            <h1>About Us</h1>
            <p>Description</p>
            <button>Learn more</button>
          </div>
        </div>
      </div>
    </div>
  
    <div id="Hero-Image-2">
      <div id="Hero-Text-2">
        <h1>Title over image</h1>
      </div>
    </div>

    <div>
      <h1 id="Why-Heading">Why Choose Us</h1>
    	<img class="why-choose-us" src="/images/why-choose-us-1.jpg" alt="why-choose-us.jpg"/>
      <img class="why-choose-us" src="/images/why-choose-us-2.jpg" alt="why-choose-us.jpg"/>
      <img class="why-choose-us" src="/images/why-choose-us-3.jpg" alt="why-choose-us.jpg"/>
      <img class="why-choose-us" src="/images/why-choose-us-4.jpg" alt="why-choose-us.jpg"/>
    </div>

    {{-- Vue Components --}}
    <div id="app">
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
	  </div>

    <footer>
      <div>
        <img id="Footer-Logo" src="/images/logo.png" alt="LOGO" />
        <p>Description</p>
        <img class="" src="/images/ig-logo.png" alt="INSTAGRAM" onclick=""/>
        <img class="" src="/images/fb-logo.png" alt="FACEBOOK" onclick=""/>
        <img class="" src="/images/tt-logo.png" alt="TWITTER" onclick=""/>
      </div>

      <div class="footer-text">
        <div class="footer-container">
          <div class="row">
            <div class="col-item">
              <h3>Title1</h3>
              <ul>
                  <li><a href="">Section1</a></li>
                  <li><a href="">Section2</a></li>
                  <li><a href="">Section3</a></li>
                  <li><a href="">Section4</a></li>
              </ul>
            </div>

            <div class="col-item">
              <h3>Title1</h3>
              <ul>
                  <li><a href="">Section1</a></li>
                  <li><a href="">Section2</a></li>
                  <li><a href="">Section3</a></li>
                  <li><a href="">Section4</a></li>
              </ul>
            </div>

            <div class="col-item">
              <h3>Title1</h3>
              <ul>
                  <li><a href="">Section1</a></li>
                  <li><a href="">Section2</a></li>
                  <li><a href="">Section3</a></li>
                  <li><a href="">Section4</a></li>
              </ul>
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

    <script src="{{  mix('js/app.js') }}"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
