@extends("escritorio")

@section("contenido")
<div class="container row">
    <form method="post" action="{{route('actualizar_cgmond',$odata->id)}}">
        <div class="barra_info mb-4 mt-4">
            <strong>Edicion de Tipo de Cambio</strong><br>
            <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" for="cgresp">Guardar</button>
            <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm" >Cerrar</a>
            <a href="{{ route('editar_cgmonm',$ocgmond)}}"  class="btn btn-warning mt-3 btn-sm" >volver</a>
        </div>
        @csrf
        @method("PUT")

        <label class="form-label">Id</label>
        <input type="text" readonly class="form-control" style="color:blue;" name="id" value="{{ $odata->id }}">

        <label class="form-label">Fecha</label>
        <input type="date" class="form-control" name="dtrndate" value="{{ $odata->dtrndate }}">

        <label class="form-label">Tipo Cambio</label>
        <input type="number" class="form-control" name="ntc" value="{{ $odata->ntc}}">
    </form>
</div>

@endsection