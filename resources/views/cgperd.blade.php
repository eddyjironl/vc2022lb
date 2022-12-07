@extends("escritorio")

@section("contenido")
        <title>Definir periodos contables</title>
        <link rel="stylesheet" href="../css/vc_estilos.css?v1">
        <form id="cgperd" name="cgperd" action="{{ route('guardar_cgperd')}}"  method="POST" class="form2 mt-4">
            <div class="barra_info">
                <strong>
                    Generacion de periodos contables
                </strong>
            </div>

            @if(session("mensaje"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Atencion !!</strong> <br> {{ session("mensaje") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @error("cyear")
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Atencion !!</strong> <br> Indique el Ano del periodo
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            @error("dtrndate")
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Atencion !!</strong> <br> Indique la fecha de inicio
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            @method("POST")
            @csrf
            <div class="contenedor_objetos">
                <label class="labelnormal">Año</label>
                <input type="number" class="textqty" id="cyear"    name="cyear"  placeholder="indique el año">
                <br>
                <label class="labelnormal">Fecha de inicia</label>
                <input type="date" class="textqty"   id="dtrndate" name="dtrndate"  placeholder="Indique la fecha">
                <br>
                <label class="labelnormal">Periodos a crear</label>
                <input type="number" class="saykey" value="12" id= "nperid" name="nperid" readonly>
            </div>
            <div class="contenedor_objetos">
                <a href="{{ route('inicio')}}"  class="btlinks_warning" >Cerrar</a>
                <button class="btlinks_warning" type="submit">Guardar</button>

            </div>
        </form>
@endsection