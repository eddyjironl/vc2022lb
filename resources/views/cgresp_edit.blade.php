@extends("escritorio")

@section("contenido")
@if(session("mensaje"))
    
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Atencion !!</strong> <br> {{ session("mensaje") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif

<form method="post" action="{{ route('actualizar_crespno',$odato->id) }}" name="cgresp" id="cgresp">
    <div class="contenedor mb-2 barra_info mt-4">
            <strong>Catalogo de Responsables </strong> <br>
        <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" >Guardar</button>
        <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm">Cerrar</a>
        <a href="{{ route('cgresp')}}"  class="btn btn-warning mt-3 btn-sm" >volver</a>
    </div>

    @method("PUT")
    @csrf
    <!-- Validando algunos campos. -->
    @error("crespno")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atencion !!</strong> <br> El codigo es Obligatorio
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    @error("cfullname")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atencion !!</strong> <br> El Nombre Es Obligatorio
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    <div class="form-group">
        <label class="form-label" style="color:yellow">Codigo</label>
        <input type="text" class="form-control" value="{{ $odato->crespno }}" readonly id="crespno" name="crespno" placeholder="Indique un codigo">
        <label class="form-label" style="color:yellow">Nombre</label>
        <input type="text" class="form-control" value="{{ $odato->cfullname }}" id="cfullname" name="cfullname" placeholder="Nombre">
        <label class="form-label" style="color:yellow">Comentarios</label>
        <textarea id="mnotas" class="form-control" name="mnotas" placeholder="comentarios"> {{ $odato->mnotas }} </textarea>
    </div>
    
</form>

@endsection()