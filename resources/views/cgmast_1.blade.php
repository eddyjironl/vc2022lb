@extends("escritorio")

@section("contenido")
    <script src="{{ asset('js/cgmast_1.js') }}"></script>
    <form class="form2 mt-4" action="{{route('guardar_cgmast_1')}}" method="POST" id="cgmast_1">
        <div class="contenedor mb-2 barra_info">
            <strong>Asientos de Diario </strong> <br>
            <!--
            <button class="btn btn-primary btn-block mt-3 btn-sm" type="submit">Guardar</button>
            -->
            <input type="button" id="btnguardar" class="btlinks_warning" value="Guardar">
            <a href="{{ route('inicio')}}"  class="btlinks_warning" >Cerrar</a>
        </div>
        @csrf

        @error("cperid")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> El Periodo es Obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @error("dtrndate")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> La Fecha es Obligatoria
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @error("ctype")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> El Tipo de documento es Obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @error("crespno")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atencion !!</strong> <br> El Responsable es Obligatorio
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        <div class="contenedor_objetos mt-4 row">
            <div class="form-group col -md 2">
                <label class="labelnormal">Responsables </label>
                <select name="crespno" id="crespno" class="listas" placeholder="Seleccione un responsable para iniciar el registro " >
                    <option value="">Elija El Responsable </option>
                    @foreach($orespnos as $orespno)
                        <option value="{{ $orespno->id}}">{{ $orespno->cfullname}} </option>
                    @endforeach
                </select>
                <br>
                <label class="labelnormal">Fecha Registro</label>
                <input type="date" name="dtrndate" id="dtrndate" class="form-input">
                <br>
                <label class="labelnormal">Periodo Id</label>
                <select name="cperid" id="cperid" class="listas">
                <option value="">Seleccione un Periodo Contable</option>
                    @foreach($ocgperds as $cgperd)
                        <option value="{{ $cgperd->id}}">{{$cgperd->cdesc}}</option>
                    @endforeach
                </select>
                <br>
                <label class="labelnormal">Tipo Doc</label>
                <select name="ctype" id="ctype"  class="listas">
                    <option value="">Seleccione Tipo de Documento</option>
                    <option value="1">Asiento de Diario</option>
                    <option value="2">Asiento de Ingresos</option>
                    <option value="4">Asiento de Compras</option>
                    <option value="0">Balance Inicial (Automatico)</option>
                </select>
                <br>
                <label class="labelnormal">Descripcion </label>
                <input type="text" name="cdesc" class="textcdesc" placeholder="Descripcion del Comprobante">
                <br>
                <label class="labelnormal">Referencia # </label>
                <input type="text" name="crefno" class="textcdesc" placeholder="Referencia del documento">
                <br>
                <label class="labelnormal">Tipo Cambio </label>
                <input type="text" name="nrate" class="textcdesc" placeholder="Tipo de Cambio para dolares">
                <br><br>
                <label class="labelnormal">Cuenta Id</label>
                <select name="cctaid1"   id="cctaid1"  class="listas">
                    <option value="">Seleccione Cuenta</option>
                    @foreach($ocuentas as $ocuenta)
                        <option value="{{ $ocuenta->id}}">{{ $ocuenta->cdesc}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col -md 2">
                <Label>Comentarios</Label><br>
                <textarea cols="60" rows="7"></textarea><br>
            </div>
        </div>
        <div class="contenedor_objetos grid_area_detalles" style="height: 350px;" >
                <table class="table" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th scope="col">Cuenta Id</th>
                            <th scope="col">Nombre </th>
                            <th scope="col">Debe</th>
                            <th scope="col">Haber</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody name="tdatalles" id="tdetalles">

                    </tbody>
                </table>    
        </div>    
        <div class="contenedor_objetos">
            <label class="labelnormal">Total Debe</label>
            <input type="number" id="tdebe" class="saykey" ><br>
            <label class="labelnormal">Total haber</label>
            <input type="number" id="thaber" class="saykey" ><br>
            <label class="labelnormal">Diferencia</label>
            <input type="number" id="tdiferencia" class="saykey" >
        </div>    
    </form>
@endsection