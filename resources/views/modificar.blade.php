<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/modificar.css')}}">
    {{-- JS --}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="./js/modificar.js"></script>
    <title>Actualizar restaurante | El tenedor</title>
</head>
<body>
    {{-- NAV --}}
    <div class="d-flex py-3">
        <form class="px-5 mr-auto" method='get' action="{{url('/crear')}}">
            <button class="btn btn btn-success" type='submit'><i class="fas fa-user-plus"></i></button>
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
    {{-- CUERPO --}}
    <div class="p-5">
        @if ($errors->any())
        <div class="alert-danger alert-dismissible errors" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form  action="{{url('/modificar/'.$usuarios->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label>Nombre</label><br>
                <input type="text" class="form-control" name="nombre" value="{{$usuarios->nombre}}" required>
            </div>
            <div class="form-group">
                <label>Correo</label><br>
                <input type="email" class="form-control" name="correo" value="{{$usuarios->correo}}" required>    
            </div>
            <div class="form-group">
                <label>Contraseña</label><br>
                <input type="password" class="form-control" name="contra" value="{{$usuarios->contra}}" required>    
            </div>
            <div class="form-group">
                <label>Rol</label><br>
                <input type="date" class="form-control" name="rol" value="{{$usuarios->rol}}" required>    
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn-success" name="Enviar" value="Enviar">
            </div>
        </form>
        
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>