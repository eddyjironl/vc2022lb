@extends("escritorio")


@section("contenido")
    <form action="{{ route('guardar_cgmic1') }}" method="POST">
        <div class="contenedor mb-2 barra_info mt-4">
            <strong>Agrupacion de Catalogo 1 </strong> <br>
            <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" for="cgresp">Guardar</button>
            <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm" >Cerrar</a>
        </div>
        @csrf

        @error("cmic1no")
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
                <input type="text" name="cmic1no" id="cmic1no" class="form-control" value="{{ old('cmic1no') }}" placeholder="Indique un codigo">
                <label>Descripcion</label>
                <input type="text" name="cdesc" id="cdesc" class="form-control" value="{{ old('cdesc') }}" placeholder="Indique una descripcion">
                <label>Comentarios</label>
                <textarea name="mnotas" id="mnotas" class="form-control" placeholder="Indique un comentario de ser necesario">{{ old('mnotas') }}</textarea >
            </div>
        </div>
    </form>

    <div class="conteiner mt-5">
        <table class="table" style="color:white">
        <thead style="color:cyan">
            <tr>
                <th scope="col">Grupo Id</th>
                <th scope="col">Nombre </th>
                <th scope="col">Comentarios </th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($odata as $cuenta)
                <tr>
                    <th scope="row"> {{ $cuenta->cmic1no }} </th>
                    <td> {{ $cuenta->cdesc }}</td>
                    <td> {{ $cuenta->mnotas }}</td>
                    <td>
                        <a href="{{ route('editar_cgmic1',$cuenta)}}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{route('borrar_cgmic1',$cuenta) }}" class="d-inline" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>    
    </div>
@endsection


