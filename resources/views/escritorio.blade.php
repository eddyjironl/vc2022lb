
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Control Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/vc_estilos.css') }}">
    <!-- <script src="../js/vc_funciones.js?v1"></script> -->
  </head>
    <style>
      
    </style>
  <body class="body_print">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">VC Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Transacciones
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('cgmast_1')}}">Asientos de Diario</a></li>
                    <li><a class="dropdown-item" href="#">Registro de Cheques</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Mayorizacion </a></li>
                    <li><a class="dropdown-item" href="#">Reposteo</a></li>
                    <li><a class="dropdown-item" href="#">Cierre Mensual</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('inicio') }}">Salir</a></li>
                </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reportes
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Libro diario</a></li>
                    <li><a class="dropdown-item" href="#">Reimpresion Asientos</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Balance de Comprobacion</a></li>
                    <li><a class="dropdown-item" href="#">Balance de General</a></li>
                    <li><a class="dropdown-item" href="#">Estado de Resultado</a></li>
                </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Catalogos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('cgresp')}}">Responsables</a></li>
                    <li><a class="dropdown-item" href="{{route('cgmonm')}}">Tipos de Cambio y Moneda</a></li>
                    <li><a class="dropdown-item" href="{{route('cgmic1')}}">Agrupacion 1</a></li>
                    <li><a class="dropdown-item" href="{{route('cgmic2')}}">Agrupacion 2</a></li>
                    <li><a class="dropdown-item" href="{{route('cgmic3')}}">Agrupacion 3</a></li>
                    <li><a class="dropdown-item" href="{{route('cgmic4')}}">Agrupacion 4</a></li>
                    <li><a class="dropdown-item" href="{{route('cgmic5')}}">Agrupacion 5</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('cgctas')}}">Cuentas Operativas</a></li>
                </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Configuracion
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('cgperd') }}">Definicion de Periodos Contables</a></li>
                    <li><a class="dropdown-item" href="#">Detalles de Periodos Contables</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('cgsetup') }}">Configuracion Contabilidad General , VC-2022</a></li>
                    <li><a class="dropdown-item" href="#">Revercion de Cierres</a></li>
                    <li><a class="dropdown-item" href="#">Unificacion Contable Migracion de datos</a></li>
                </ul>
                </li>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            </div>
        </div>
    </nav>
        <div class="container">
            @yield('contenido')
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>