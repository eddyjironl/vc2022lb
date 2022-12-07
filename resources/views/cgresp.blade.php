@extends("escritorio")

@section("contenido")
            @if(session("mensaje"))
                {{ session("mensaje") }}
            @endif
        <form method="post" action="{{ route('guardar_cgresp') }}" name="cgresp" id="cgresp" >
            <div class="contenedor mb-2 barra_info mt-4">
                <strong>Catalogo de Responsables </strong> <br>
                    <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" for="cgresp">Guardar</button>
                    <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm" >Cerrar</a>
                </div>
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
                    <input type="text" class="form-control" id="crespno" name="crespno" value=" {{ old('crespno') }}" placeholder="Indique un codigo">
                    <label class="form-label" style="color:yellow">Nombre</label>
                    <input type="text" class="form-control" id="cfullname" name="cfullname"  value=" {{ old('cfullname') }}" placeholder="Nombre">
                    <label class="form-label" style="color:yellow">Comentarios</label>
                    <textarea id="mnotas" class="form-control" name="mnotas" placeholder="comentarios"> {{ old('mnotas') }}"</textarea>
                </div>
        </form>
        <div class="conteiner mt-5">
            <table class="table" style="color:white">
            <thead style="color:cyan">
                <tr>
                <th scope="col">Responsable Id</th>
                <th scope="col">Nombre </th>
                <th scope="col">Comentarios</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($odatos as $persona)
                    <tr>
                        <th scope="row"> {{ $persona->crespno }} </th>
                        <td>  {{ $persona->cfullname }} </td>
                        <td> {{ $persona->mnotas }}</td>
                        <td>
                            <form action="{{ route('borrar_crespno',$persona) }}" class="d-inline" action="post">
                                @method("DELETE")
                                @csrf
                                <button type= "submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <a href="{{ route('editar_crespno',$persona)}}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>    
        </div>
@endsection