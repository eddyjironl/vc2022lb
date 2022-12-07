@extends("escritorio")


@section("contenido")
    
    <form action="{{ route('actualizar_cgmic5',$odata) }}" method="POST">
        <div class="contenedor mb-2 barra_info mt-4">
            <strong>Agrupacion de Catalogo 5 </strong> <br>
            <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" >Guardar</button>
            <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm" >Cerrar</a>
            <a href="{{ route('cgmic5')}}"  class="btn btn-warning mt-3 btn-sm" >volver</a>
        </div>
        
        @csrf
        @method("PUT")

        @error("cmic5no")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> El codigo es Obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @error("cdesc")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> La descripcion es Obligatoria
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="container">
            <div class="form-group">
                <label>Codigo Grupo</label>
                <input type="text" name="cmic5no" id="cmic5no" class="form-control" readonly value="{{ $odata->cmic5no }}" placeholder="Indique un codigo">
                <label>Descripcion</label>
                <input type="text" name="cdesc" id="cdesc" class="form-control" value="{{ $odata->cdesc }}" placeholder="Indique una descripcion">
                <label>Comentarios</label>
                <textarea name="mnotas" id="mnotas" class="form-control" placeholder="Indique un comentario de ser necesario">{{ $odata->mnotas }}</textarea >
            </div>
        </div>
    </form>
@endsection


