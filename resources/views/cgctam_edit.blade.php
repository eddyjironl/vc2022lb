@extends("escritorio")

@section("contenido")
        @if(session("mensaje"))
            {{ session("mensaje") }}
        @endif

    <form method="post" action="{{ route('actualizar_cgctam',$odata) }}">
        <div class="contenedor mb-2 barra_info mt-4">
            <strong>Catalogo de Cuentas Operativas</strong><br>

            <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit" for="cgresp">Guardar</button>
            <a href="{{ route('inicio')}}"  class="btn btn-primary mt-3 btn-sm" >Cerrar</a>
            <a href="{{ route('cgctas')}}"  class="btn btn-warning mt-3 btn-sm" >volver</a>

        </div>
        @method("PUT")
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
                <input type="text" class="form-control sm" id="cctaid" name="cctaid" value=" {{ $odata->cctaid }}" placeholder="Indique un numero de cuenta">

                <label class="form-label" for="cdesc">Descripcion</label>
                <input type="text" class="form-control" id="cdesc" name="cdesc" value=" {{ $odata->cdesc }}"  placeholder="Indique una Descripcion">

                <label class="form-label"  for="cgrupid">Categoria</label>
                <select class="form-select" name="cgrupid" id="cgrupid">
                    <option value="" >Seleccione Categoria</option>
                    <option value="A" {{ ($odata->cgrupid == 'A')? 'selected':'' }}>Activos</option>
                    <option value="B" {{ ($odata->cgrupid == 'B')? 'selected':'' }}>Pasivos</option>
                    <option value="C" {{ ($odata->cgrupid == 'C')? 'selected':'' }}>Capital</option>
                    <option value="D" {{ ($odata->cgrupid == 'D')? 'selected':'' }}>Ingresos</option>
                    <option value="E" {{ ($odata->cgrupid == 'E')? 'selected':'' }}>Gastos</option>
                    <option value="F" {{ ($odata->cgrupid == 'F')? 'selected':'' }}>Cuenta de Orden Deudor</option>
                    <option value="G" {{ ($odata->cgrupid == 'G')? 'selected':'' }}>Cuenta de Orden Acreedor</option>
                </select>
                <label class="form-label" for="ctype">Tipo de saldo</label>
                <select class="form-select" id="ctype" name="ctype">
                    <option value="">Seleccione Tipo de Saldo</option>
                    <option value="D" {{ ($odata->ctype == 'D')? 'selected':'' }}>Debe</option>
                    <option value="H" {{ ($odata->ctype == 'H')? 'selected':'' }}>Haber</option>
                </select>
                <div class="container">
                    <input type="checkbox" class="form-checkbox mt-3" name="lpost" id="lpost" {{ ($odata->lpost == 1)? 'checked':'' }} > Cuenta posteable por el usuario </input>
                </div>
                <div class="container">
                    <input type="checkbox" class="form-checkbox mt-3" name="lapplyir" id="lapplyir" {{ ($odata->lapplyir == 1)? 'checked':'' }}>Incluir en calculo del IR </input>
                </div>
                
            </div>

            <div class="form-group col -md 1">
                <label class="form-label" for="mnotas">Comentarios Generales de la Cuenta</label>
                <textarea id="mnotas" class="form-control" name="mnotas" placeholder="comentarios" rows="13">{{$odata->mnotas}}</textarea>
            </div>

            <div class="form-group col -md 1">
                <strong style="color:yellowgreen">Niveles del Catalogo Contable</strong><br>
                <label class="form-label" for="cmic1no">Grupo 1</label>
                <select class="form-select" name="cmic1no" id="cmic1no">
                    <option value="" >Seleccione un Grupo-1</option>
                    @foreach($omic1 as $omicx)
                        <option value="{{$omicx->cmic1no}}" {{ ($omicx->cmic1no == $odata->cmic1no) ? "selected":"" }} >{{ $omicx->cdesc }}</option>
                    @endforeach
                </select>

                <label class="form-label" for="cmic2no">Grupo 2</label>
                <select class="form-select" name="cmic2no" id="cmic2no">
                    <option value="">Seleccione un Grupo-2</option>
                    @foreach($omic2 as $omicx2)
                        <option value="{{$omicx2->cmic2no}}" {{ ($omicx2->cmic2no == $odata->cmic2no) ? "selected":"" }}  >{{ $omicx2->cdesc }}</option>
                    @endforeach
                </select>

                <label class="form-label" for="cmic3no">Grupo 3</label>
                <select class="form-select"  name="cmic3no" id="cmic3no">
                    <option value="">Seleccione un Grupo-3</option>
                    @foreach($omic3 as $omicx)
                        <option value="{{$omicx->cmic3no}}" {{ ($omicx->cmic3no == $odata->cmic3no) ? "selected":"" }}  >{{ $omicx->cdesc }}</option>
                    @endforeach
                </select>

                <label class="form-label" for="cmic4no">Grupo 4</label>
                <select class="form-select" name="cmic4no" id="cmic4no">
                    <option value="">Seleccione un Grupo-4</option>
                    @foreach($omic4 as $omicx)
                        <option value="{{$omicx->cmic4no}}" {{ ($omicx->cmic4no == $odata->cmic4no) ? "selected":"" }}  >{{ $omicx->cdesc }}</option>
                    @endforeach
                </select>

                <label class="form-label" for="cmic5no">Grupo 5</label>
                <select class="form-select" name="cmic5no" id="cmic5no">
                    <option value="">Seleccione un Grupo-5</option>
                    @foreach($omic5 as $omicx)
                        <option value="{{$omicx->cmic5no}}"  {{ ($omicx->cmic5no == $odata->cmic5no) ? "selected":"" }} >{{ $omicx->cdesc }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group col -md 1">
                <label class="form-label" for="ndebe">Total Debe</label>
                <input type="text" class="form-control d-inline" id="ndebe" name="ndebe"  value=" {{ $odata->ndebe }}" readonly>
                <label class="form-label" for="nhaber">Total Haber</label>
                <input type="text" class="form-control" id="nhaber" name="nhaber"  value=" {{ $odata->nhaber }}" readonly>
                <label class="form-label" for="namount">Saldo</label>
                <input type="text" class="form-control" id="namount" name="namount"  value=" {{ $odata->namount }}" readonly>

            </div>
        </div>
    </form>

@endsection
