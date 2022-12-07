@extends("escritorio")


@section("contenido")
        <title>Configuracion Contable</title>
        <script src="{{ asset('js/cgsetup.js') }}"></script>


        <form name="cgsetup" id="cgsetup" 
              class="form2 mt-4" 
              method="post" 
              action="{{route('guardar_cgsetup')}}" >

            <div class="barra_info"> 
                <strong> Configuracion del Modulo Contable</strong>
                <br><br>
                <a href="{{ route('inicio')}}"  class="btlinks_warning" >Cerrar</a>
                <br><br>
            </div>
            <br><br>
  
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> 
                    Para continuar por primera vez precione el boto primera vez sino Cerrar 
            </div>
            <a href="{{ route('nuevo_cgsetup')}}"  class="btlinks" >Primera Vez</a>
            <br>
            <br>
            <br>

        </form>    
    @endsection