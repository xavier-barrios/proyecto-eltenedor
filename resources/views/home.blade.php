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
    <div class="d-flex py-3 topNav">
        <img src="{{asset('img/banner.png')}}" class="px-5 mr-auto" width="250px" height="50px" alt="Logo ElTenedor">
        
        <form class="px-5 ml-auto" method='get' action="{{url('/logout')}}">
            <button class="btn btn btn-danger" type='submit'><i class="fas fa-sign-out-alt"></i></button>
        </form>
        <form class="px-5 mr-auto" method='get' action="{{url('/baja_restaurante')}}">
            <button class="btn btn btn-success" type='submit'><i class="fas fa-user-plus"></i></button>
        </form>
    </div> 
    
    <div>
        <div class="d-flex justify-content-between mt-5 margin">
            @if (Session::get('usuario'))
            <h1>Bienvenido {{Session::get('usuario')->correo}}</h1>
            @else
            <h1>Bienvenido!</h1>
            @endif
            <input type="hidden" value="{{Session::get('usuario')->rol}}" id="rol"> 
            <div class="p-3 panel panel-login">
                <input type="text" name="searchCocina" id="searchCocina" placeholder="Busca tu tipo de cocina" onkeyup="mostrar()">
                <input type="text" name="searchPrecio" id="searchPrecio" placeholder="Precio medio €" onkeyup="mostrar()">
            </div>
        </div>
        
        <div id="restaurantes" class="margin">
        
        </div>
    </div>
    

</body>
</html>