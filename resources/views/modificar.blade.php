<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./img/favicon.ico" type="image/png" sizes="16x16">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/modificar.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    {{-- JS --}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="./js/modificar.js"></script>
    <title>Actualizar restaurante | El tenedor</title>
</head>
<body>
    {{-- NAV --}}
    <div class="d-flex py-3">
        <form class="px-5 mr-auto" method='get' action="{{url('/home')}}">
            <button class="btn btn btn-success" type='submit'><i class="fas fa-arrow-left"></i></button>
        </form>
        
        <h1>{{$restaurante->nombre}}</h1>
        
        <form class="px-5 ml-auto" method='get' action="{{url('/logout')}}">
            <button class="btn btn btn-danger" type='submit'><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </div> 
    {{-- CUERPO --}}
    <div class="p-5 d-flex">
        @if ($errors->any())
        <div class="alert-danger alert-dismissible errors" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{url('actualizar/'.$restaurante->id_restaurante)}}" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <input type="hidden" class="form-control" name="id_restaurante" value="{{$restaurante->id_restaurante}}">
            </div>
            <div class="form-group">
                <label>Nombre</label><br>
                <input type="text" class="form-control" name="nombre" value="{{$restaurante->nombre}}" required>
            </div>
            <div class="form-group">
                <label>Código postal</label><br>
                <input type="text" class="form-control" name="cp" value="{{$restaurante->cp}}" required>    
            </div>
            <div class="form-group">
                <label>Calle</label><br>
                <input type="text" class="form-control" name="calle" value="{{$restaurante->calle}}" required>    
            </div>
            <div class="form-group">
                <label>Ciudad</label><br>
                <input type="text" class="form-control" name="ciudad" value="{{$restaurante->ciudad}}" required>    
            </div>
            <div class="form-group">
                <label>Tipo cocina</label><br>
                <select class="form-control" name="tipoCocina" id="tipoCocina">
                    @if ($restaurante->tipo_cocina == "Vegana")
                        <option value="3">Vegana</option>
                        <option value="4">Mediterranea</option>
                        <option value="1">India</option>
                        <option value="2">Mexicana</option>
                        @elseif ($restaurante->tipo_cocina == "Mediterranea")
                        <option value="4">Mediterranea</option>
                        <option value="3">Vegana</option>
                        <option value="1">India</option>
                        <option value="2">Mexicana</option>
                        @elseif ($restaurante->tipo_cocina == "India")
                        <option value="1">India</option>
                        <option value="3">Vegana</option>
                        <option value="4">Mediterranea</option>
                        <option value="2">Mexicana</option>
                        @elseif ($restaurante->tipo_cocina == "Mexicana")
                        <option value="2">Mexicana</option>
                        <option value="3">Vegana</option>
                        <option value="4">Mediterranea</option>
                        <option value="1">India</option>
                    @endif  
                </select>
            </div>
            <div class="form-group">
                <label>Precio medio</label><br>
                <input type="number" class="form-control" name="precio_medio" value="{{$restaurante->precio_medio}}" required>    
            </div>
            <div class="form-group">
                <label for="img">Logo</label><br>
                <input type="file" id="img" name="img" accept=".gif, .png, .jpg, .jpeg" value="{{$restaurante->foto}}">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn-success" name="Enviar" value="Enviar">
            </div>
        </form>
        
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>