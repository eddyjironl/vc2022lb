@extends("escritorio")
@section("contenido")
    <form action="{{route('actualizar_cgmonm',$ocgmonm)}}" method="POST" class="form2 mt-4">
        <div class="barra_info mb-4">
            <strong>Catalogo de Moneda y Tipo de Cambio</strong><br>
            <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" for="cgresp">Guardar</button>
            <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm" >Cerrar</a>
            <a href="{{ route('cgmonm')}}"  class="btn btn-warning mt-3 btn-sm" >volver</a>
        </div>
        @csrf
        @method("PUT")

        @error("cmonid")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> Codigo de Moneda es obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @error("cdesc")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> La descripcion es Obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @error("cmetodo")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> La Metodo es Obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @error("csimbolo")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> El simbolo de moneda es Obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        <div class="contenedor_objetos">
                <label class="labelnormal">Id</label>
				<input type="text" id="id" name="id" class="saykey" value="{{ $ocgmonm->id }}" autocomplete="off" readonly>
				<br>
                <label class="labelnormal">Id Moneda</label>
				<input type="text" id="cmonid" name="cmonid" class="saykey" value="{{ $ocgmonm->cmonid }}" autocomplete="off" readonly>
				<br>
				<label class="labelnormal">Descripcion</label>
				<input type="text" id="cdesc" name="cdesc" class="textcdesc" autocomplete="off" value="{{ $ocgmonm->cdesc}}">
				<br>
				<label class="labelnormal">Simbolo </label>
				<input type="text" id="csimbolo" name="csimbolo" class="textkey" autocomplete="off" value="{{$ocgmonm->csimbolo}}">
				<br>
				<label class="labelnormal">Methodo Cal</label>
				<select id="cmetodo" name="cmetodo" class="listas">
					<option value="">Elija un procedimiento</option>
					<option value="D" {{ ($ocgmonm->cmetodo == "D")? "selected":"" }} >Divicion</option>
					<option value="M" {{ ($ocgmonm->cmetodo == "M")? "selected":"" }} >Multiplicacion</option>
				</select>
				<br>
				<label class="labelsencilla">Comentarios Generales</label><br>
				<textarea id="mnotas" name="mnotas" class="mnotas" rows=4 cols=55>{{ $ocgmonm->mnotas }} </textarea>
			</div>
    </form>
 

            <div class="conteiner mt-5">
                <a href="#" class="btn btn-warning btn-sm">Adicionar</a>
                
                <table class="table" style="color:white">
                <thead  style="color:cyan">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo Cambio </th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($odata as $xdata)
                        <tr>
                        <th scope="row"> {{ $xdata->id }} </th>
                        <th> {{ $xdata->dtrndate }} </th>
                            <td> {{ $xdata->ntc }}</td>
                            <td>
                                <a href="{{ route('editar_cgmond',[$ocgmonm->id,$xdata])}}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{route('borrar_cgmond',$xdata) }}" class="d-inline" method="post">
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