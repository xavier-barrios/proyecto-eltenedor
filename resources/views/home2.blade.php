<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/favicon.ico" type="image/png" sizes="16x16">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/mostrar.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    {{-- JS --}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    {{-- <script src="./js/mostrar.js"></script> --}}
    <script src="./js/ajax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Restaurantes</title>
</head>
<body>
    <div class="d-flex py-3">
        <form class="px-5 mr-auto" method='get'>
        </form>
        @if (Session::get('email_usuario'))
        <h1>Bienvenido {{Session::get('email_usuario')}}</h1>
        @else
        <h1>Bienvenido!</h1>
        @endif
        <form class="px-5 ml-auto" method='get' action="{{url('/logout')}}">
            <button class="btn btn btn-danger" type='submit'><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </div> 
    <div class="container my-auto mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="p-3 panel panel-login">
                <input type="text" name="searchCocina" id="searchCocina" placeholder="Busca tu tipo de cocina" onkeyup="mostrar2()">
                <input type="text" name="searchPrecio" id="searchPrecio" placeholder="Precio medio €" onkeyup="mostrar2()">
            </div>
        </div>
    </div>

    <div id="restaurantes" class="restaurantes">
        
    </div>

</body>
</html>