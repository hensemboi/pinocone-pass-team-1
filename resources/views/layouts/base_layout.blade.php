<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/your-path-to-uicons/css/uicons-[your-style].css" rel="stylesheet"/> <!--load all styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <title>Pinocone</title>
</head>

<body>
    @if (Auth::check())
        @php
        $user_auth_data = [
            'isLoggedin' => true,
            'user' =>  Auth::user()
        ];
        @endphp
    @else
        @php
        $user_auth_data = [
            'isLoggedin' => false
        ];
        @endphp
    @endif
    
    <script>
        window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
    </script>

    <div id="app"></div>

<!-- built files will be auto injected -->
    <script src="{{  mix('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/2d728a97b6.js" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
   
</body>
</html>
