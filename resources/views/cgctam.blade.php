@extends("escritorio")

@section("contenido")
       
    @if(session("mensaje"))
        {{ session("mensaje") }}
    @endif
<form method="post" action="{{ route('guardar_cgctam') }}">

    <div class="contenedor mb-2 barra_info mt-4">
        <strong>Catalogo de Cuentas Operativas</strong><br>
        <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" for="cgresp">Guardar</button>
        <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm" >Cerrar</a>
    </div>
    @csrf

    @error("cctaid")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atencion !!</strong> <br> El codigo es Obligatorio
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    @error("cdesc")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atencion !!</strong> <br> La descripcion es Obligatorio
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    @error("ctype")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atencion !!</strong> <br> Indique el saldo de cuenta
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    @error("cgrupid")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Atencion !!</strong> <br> Inidque el grupo de la cuenta
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    <div class="row">
        <div class="form-group col -md 1">
            <strong style="color:yellowgreen">Informacion General </strong><br>

            <label class="form-label">Codigo Id</label>
            <input type="text" class="form-control sm" id="cctaid" name="cctaid" value=" {{ old('cctaid') }}" placeholder="Indique un numero de cuenta">

            <label class="form-label" for="cdesc">Descripcion</label>
            <input type="text" class="form-control" id="cdesc" name="cdesc" value=" {{ old('cdesc') }}"  placeholder="Indique una Descripcion">

            <label class="form-label"  for="cgrupid">Categoria</label>
            <select class="form-select" name="cgrupid" id="cgrupid">
                <option value="">Seleccione Categoria</option>
                <option value="A">Activos</option>
                <option value="B">Pasivos</option>
                <option value="C">Capital</option>
                <option value="D">Ingresos</option>
                <option value="E">Gastos</option>
                <option value="F">Cuenta de Orden Deudor</option>
                <option value="G">Cuenta de Orden Acreedor</option>
            </select>

            <label class="form-label" for="ctype">Tipo de saldo</label>
            <select class="form-select" id="ctype" name="ctype">
                <option value="">Seleccione Tipo de Saldo</option>
                <option value="D">Debe</option>
                <option value="H">Haber</option>
            </select>
            <div class="container">
                <input type="checkbox" class="form-checkbox mt-3" name="lpost" id="lpost" > <strong> Cuenta posteable por el usuario </strong></input>
            </div>
            <div class="container">
                <input type="checkbox" class="form-checkbox mt-3" name="lapplyir" id="lapplyir" > <strong> Incluir en calculo del IR </strong></input>
            </div>
            
        </div>

        <div class="form-group col -md 1">
            <label class="form-label" for="mnotas">Comentarios Generales de la Cuenta</label>
            <textarea id="mnotas" class="form-control" name="mnotas" placeholder="comentarios" rows="13"></textarea>
        </div>

        <div class="form-group col -md 1">

            <strong style="color:yellowgreen">Niveles del Catalogo Contable</strong><br>
            <label class="form-label" for="cmic1no">Grupo 1</label>
            <select class="form-select" name="cmic1no" id="cmic1no">
                <option value="" >Seleccione un Grupo-1</option>
                @foreach($omic1 as $omicx)
                    <option value="{{$omicx->cmic1no}}" >{{ $omicx->cdesc }}</option>
                @endforeach
            </select>

            <label class="form-label" for="cmic2no">Grupo 2</label>
            <select class="form-select" name="cmic2no" id="cmic2no">
                <option value="">Seleccione un Grupo-2</option>
                @foreach($omic2 as $omicx2)
                    <option value="{{$omicx2->cmic2no}}" >{{ $omicx2->cdesc }}</option>
                @endforeach
            </select>

            <label class="form-label" for="cmic3no">Grupo 3</label>
            <select class="form-select"  name="cmic3no" id="cmic3no">
                <option value="">Seleccione un Grupo-3</option>
                @foreach($omic3 as $omicx)
                    <option value="{{$omicx->cmic3no}}" >{{ $omicx->cdesc }}</option>
                @endforeach
            </select>

            <label class="form-label" for="cmic4no">Grupo 4</label>
            <select class="form-select" name="cmic4no" id="cmic4no">
                <option value="">Seleccione un Grupo-4</option>
                @foreach($omic4 as $omicx)
                    <option value="{{$omicx->cmic4no}}" >{{ $omicx->cdesc }}</option>
                @endforeach
            </select>

            <label class="form-label" for="cmic5no">Grupo 5</label>
            <select class="form-select" name="cmic5no" id="cmic5no">
                <option value="">Seleccione un Grupo-5</option>
                @foreach($omic5 as $omicx)
                    <option value="{{$omicx->cmic5no}}" >{{ $omicx->cdesc }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group col -md 1">
            <label class="form-label" for="ndebe">Total Debe</label>
            <input type="text" class="form-control d-inline" id="ndebe" name="ndebe" readonly>
            <label class="form-label" for="nhaber">Total Haber</label>
            <input type="text" class="form-control" id="nhaber" name="nhaber" readonly>
            <label class="form-label" for="namount">Saldo</label>
            <input type="text" class="form-control" id="namount" name="namount" readonly>

        </div>
    </div>
</form>

<div class="conteiner mt-5">
    <table class="table" style="color:white">
    <thead style="color:cyan">
        <tr>
        <th scope="col">Cuenta Id</th>
        <th scope="col">Nombre </th>
        <th scope="col">Tipo</th>
        <th scope="col">Grupo 1</th>
        <th scope="col">Grupo 2</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>

        @foreach($odata as $cuenta)
            <tr>
                <th scope="row"> {{ $cuenta->cctaid }} </th>
                <td> {{ $cuenta->cdesc }}</td>
                <td> {{ $cuenta->ctype }}  </td>
                <td> {{ $cuenta->cmic1no }}  </td>
                <td> {{ $cuenta->cmic2no }}  </td>
                <td>
                    <a href="{{ route('editar_cgctam',$cuenta)}}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{route('borrar_cgctam',$cuenta) }}" class="d-inline" method="post">
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