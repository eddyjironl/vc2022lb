@extends("escritorio")


@section("contenido")
        <title>Configuracion Contable</title>
        <script src="{{ asset('js/cgsetup.js') }}"></script>


        <form name="cgsetup" id="cgsetup" 
              class="form2 mt-4" 
              method="post" 
              action="{{route('guardar_cgsetup')}}" >

              @csrf

            <div class="barra_info"> 
                <strong> Configuracion del Modulo Contable</strong><br>
                <button class="btlinks_warning" type="submit"> guardar </button>
                <a href="{{ route('inicio')}}"  class="btlinks_warning" >Cerrar</a>
            </div>
            <br><br>
            @if(session("mensaje"))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Atencion !!</strong> <br> {{ session("mensaje") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="tab">
				<button  class="tablinks" id="tbinfo1" >Informacion General</button>
				<button  class="tablinks" id="tbinfo2" >Configuracion de Niveles Catalogo Contable y Apariencia de Estados Financieros</button>
			</div>		
            <div id="finfo1" class="tabcontent">
                <div class="contenedor_objetos">
                    @foreach($odatos1 as $odatos)
                    <label class="labelsencilla">Configuracion de Formatos y Numeracion de comprobantes</label>
                    <br>
                    <label class="labellarge">Id Registro </label>
                    <input type="number" class="textkeyreadonly" id="id" name="id" value={{ $odatos->id }}>
                    <br>
                    <label class="labellarge">Comprobante de Diario No 1MMYYYY   </label>
                    <input type="number" class="textkey" id="ntrnno1" name="ntrnno1" value={{ $odatos->ntrnno1 }}>
                    <br>
                    <label class="labellarge">Comprobante de Ingresos No 2MMYYYY   </label>
                    <input type="number" class="textkey" id="ntrnno2" name="ntrnno2" value={{ $odatos->ntrnno2 }}>
                    <br>
                    <label class="labellarge">Comrabante de Cheques No 3MMYYYY     </label>
                    <input type="number" class="textkey" id="ntrnno3" name="ntrnno3" value={{ $odatos->ntrnno3 }}>
                    <br>
                    <label class="labellarge">Consecutivos Comprobante de Caja chica </label>
                    <input type="number" class="textkey" id="ntrnno4" name="ntrnno4" value={{ $odatos->ntrnno4 }}>

                    <br>
                    <label class="labellarge">Monto Autorizado de Caja Chica  </label>
                    <input type="number" class="textkey" id="ncashamt" name="ncashamt"  value={{ $odatos->ncashamt }}>
                    <br>
                    <label class="labellarge">Porcentaje del Impuesto sbre la renta </label>
                    <input type="number" class="textkey" id="nrentax" name="nrentax" value={{ $odatos->nrentax }}>
                    <br>
                    <label class="labelsencilla">Configuracion de Moneda y Periodo de Trabajo</label>
                    <br>
                    <label class="labellarge">Moneda Base</label>
                    <select name="cmonid" class="listas">
                        <option value = "">Elija la moneda base</option>
                        @foreach($monedas as $moneda)
                            <option value="{{ $moneda->id }}"  {{ ($moneda->id == $odatos->cmonid) ? "selected":"" }} >{{ $moneda->cdesc }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="labellarge">Periodo</label>
                    <select name="cperid" class="listas">
                        <option value="">Indique un Periodo</option>
                        @foreach($periodos as $periodo)
                            <option value="{{ $periodo->id }}" {{ ($periodo->id == $odatos->cperid) ? "selected":"" }}>{{ $periodo->cdesc }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="labelsencilla">Configuracion de Cuentas de cierre Mensual y Anual </label>
                    <br>
                    <label class="labellarge">Utilidad del Periodo </label>
                    <select name="cctano1"  id="cctano1" class="listas">
                        <option value=""> Indique la Cuenta </option>
                        @foreach($cuentas as $cuenta)
                            <option value="{{ $cuenta->id }}" {{ ($cuenta->id == $odatos->cctano1) ? "selected":"" }} >{{ $cuenta->cdesc }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="labellarge">Cta Utilidad del Mes (NP) </label>
                    <select name="cctano2"  id="cctano2" class="listas">
                        <option value=""> Indique la Cuenta </option>
                        @foreach($cuentas as $cuenta)
                            <option value="{{ $cuenta->id }}" {{ ($cuenta->id == $odatos->cctano2) ? "selected":"" }}  >{{ $cuenta->cdesc }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="labellarge">Gasto IR </label>
                    <select name="cctano3" class="listas">
                        <option value=""> Indique la Cuenta </option>
                        @foreach($cuentas as $cuenta)
                            <option value="{{ $cuenta->id }}" {{ ($cuenta->id == $odatos->cctano3) ? "selected":"" }} >{{ $cuenta->cdesc }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="labellarge">Cuenta por Pagar IR </label>
                    <select name="cctano4" class="listas">
                        <option value=""> Indique la Cuenta </option>
                        @foreach($cuentas as $cuenta)
                            <option value="{{ $cuenta->id }}" {{ ($cuenta->id == $odatos->cctano4) ? "selected":"" }}  >{{ $cuenta->cdesc }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="labelsencilla">Configuracion del Formato de cheques</label>
                    <br>
                    <select id="lnConfRChk" name="lnConfRChk" class="listas">
                        <option value=1 {{ (1 == $odatos->lnConfRChk) ? "selected":"" }} >Usar Formato Standar del Sistema</option>
                        <option value=2 {{ (2 == $odatos->lnConfRChk) ? "selected":"" }} >Usar Formato Standar Sin Impresion de area de cheque</option>
                        <option value=3 {{ (3 == $odatos->lnConfRChk) ? "selected":"" }} >Usar Formato Personalizado del Cliente a</option>
                    </select>    
                </div>
                @endforeach
            </div>

            <div id="finfo2" class="tabcontent">
                @foreach($odatos1 as $odatos)
                <div class="contenedor_objetos">
                    <table class="table" style="font-size: 12px;">
                        <thead class="grid_header">
                            <tr>
                                <th ></th>
                                <th ></th>
                                <th ></th>
                                <th ></th>

                                <th>Balance General<br> Detallado</th>
                                <th ></th>
                                <th>Balance General <br>Sumarizado</th>
                            </tr>
                            <tr>
                                <th>Descripcion</th>
                                <th>Texto Personalizado</th>
                                <th style="text-align:center;">Activar</th>
                                <th style="text-align:center;">Sangria</th>
                                <th style="text-align:center;">Desc / Grupo</th>
                                <th style="text-align:center;">Suma / Grupo</th>
                                <th style="text-align:center;">Desc / Grupo</th>
                                <th style="text-align:center;">Suma / Grupo</th>
                            </tr>
                        </thead>
                        <tbody class="grid_detail">
                            <tr>
                                <td>Agrupacion 1</td>
                                <td style="text-align:center;"><input type="text" class="textcdesc" name="cmic1desc" id="cmic1desc" value="{{$odatos->cmic1desc}}"></td>
                                <td style="text-align:center;" ><input type="checkbox" id="lmic1desc" name="lmic1desc"></input></td>
                                <td style="text-align:center;"><input type="number" class="textqty" name="nmic1desc" id="nmic1desc"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic1desc1" name="lmic1desc1"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic1desc2" name="lmic1desc2"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic1desc3" name="lmic1desc3"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic1desc4" name="lmic1desc4"></input></td>
                            </tr>
                            <tr>
                                <td>Agrupacion 2</td>
                                <td style="text-align:center;"><input type="text" class="textcdesc" name="cmic2desc" id="cmic2desc" value="{{$odatos->cmic2desc}}"></td>
                                <td style="text-align:center;" ><input type="checkbox" id="lmic2desc" name="lmic2desc"></input></td>
                                <td style="text-align:center;"><input type="number" class="textqty" name="nmic2desc" id="nmic2desc"></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic2desc1" name="lmic2desc1"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic2desc2" name="lmic2desc2"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic2desc3" name="lmic2desc3"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic2desc4" name="lmic2desc4"></input></td>
                            </tr>

                            <tr>
                                <td>Agrupacion 3</td>
                                <td style="text-align:center;"><input type="text" class="textcdesc" name="cmic3desc" id="cmic3desc" value="{{$odatos->cmic3desc}}"></td>
                                <td style="text-align:center;" ><input type="checkbox" id="lmic3desc" name="lmic3desc"></input></td>
                                <td style="text-align:center;"><input type="number" class="textqty" name="nmic5desc" id="nmic3desc"></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic3desc1" name="lmic3desc1"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic3desc2" name="lmic3desc2"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic3desc3" name="lmic3desc3"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic3desc4" name="lmic3desc4"></input></td>
                            </tr>

                            <tr>
                                <td>Agrupacion 4</td>
                                <td style="text-align:center;"><input type="text" class="textcdesc" name="cmic4desc" id="cmic4desc" value="{{$odatos->cmic4desc}}"></td>
                                <td style="text-align:center;" ><input type="checkbox" id="lmic4desc" name="lmic4desc"></input></td>
                                <td style="text-align:center;"><input type="number" class="textqty" name="nmic4desc" id="nmic4desc"></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic4desc1" name="lmic4desc1"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic4desc2" name="lmic4desc2"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic4desc3" name="lmic4desc3"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic4desc4" name="lmic4desc4"></input></td>
                            </tr>

                            <tr>
                                <td>Agrupacion 5</td>
                                <td style="text-align:center;"><input type="text" class="textcdesc" name="cmic5desc" id="cmic5desc" value="{{$odatos->cmic5desc}}"></td>
                                <td style="text-align:center;" ><input type="checkbox" id="lmic5desc" name="lmic5desc"></input></td>
                                <td style="text-align:center;"><input type="number" class="textqty" name="nmic5desc" id="nmic5desc"></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic5desc1" name="lmic5desc1"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic5desc2" name="lmic5desc2"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic5desc3" name="lmic5desc3"></input></td>
                                <td style="text-align:center;"><input type="checkbox" id="lmic5desc4" name="lmic5desc4"></input></td>
                            </tr>

                        </tbody>
                    </table>
                    <br>
                    <label class="labelnormal"> Agrupar al nivel </label>
                    <input type="number" class="textkey" id="ngrupid" name="ngrupid" value="{{$odatos->ngrupid}}">
                </div>    
                <div class="contenedor_objetos">
                    <label class="labelsencilla"> Configuracion de Firmas </div>
                    
                    <label class="labelnormal">1er Nombre  </label>
                    <input type="text" class="textcdesc" name="cfirma1" id="cfirma1" value="{{$odatos->cfirma1}}">
                    <br>
                    <label class="labelnormal">Titulo  </label>
                    <input type="text" class="textcdesc" name="ctitulo1" id="ctitulo1"  value="{{$odatos->ctitulo1}}">
                    <input type="checkbox" id="lviewf1" name="lviewf1" {{ ($odatos->lviewf1 == 1)?"selected":""}} >Ver Firma 1</input>
                    <br>
                    <label class="labelnormal">2do Nombre  </label>
                    <input type="text" class="textcdesc" name="cfirma2" id="cfirma2" value="{{$odatos->cfirma2}}">
                    <br>
                    <label class="labelnormal">Titulo  </label>
                    <input type="text" class="textcdesc" name="ctitulo2" id="ctitulo2" value="{{$odatos->ctitulo2}}">
                    <input type="checkbox" id="lviewf2" name="lviewf2">Ver Firma 2</input>
                    <br>
                    <label class="labelnormal">3er Nombre  </label>
                    <input type="text" class="textcdesc" name="cfirma3" id="cfirma3" value="{{$odatos->cfirma3}}">
                    <br>
                    <label class="labelnormal">Titulo  </label>
                    <input type="text" class="textcdesc" name="ctitulo3" id="ctitulo3"  value="{{$odatos->ctitulo3}}">
                    <input type="checkbox" id="lviewf3"  name="lviewf3">Ver Firma 3</input>
                </div>
                @endforeach
            </div>
        </form>    
    @endsection