<div class="modal fade" id="modeditservicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalbodyedit">
        @forelse ($relacion as $itemserv)
        <label name="idsrel" id="serviciosgetid{{$itemserv->id_relacion}}" style="display: none;">{{$itemserv->id_servicio}}//{{$itemserv->precio_hr}}//{{$itemserv->num_hr}}//{{$itemserv->valor}}//{{$itemserv->id_maquina}}//{{$itemserv->id_relacion}}</label>
        @empty
        @endforelse

        
        <form method="POST" id="formsubmitedit" action="{{ route('ediservicio')}}">
          @csrf @method('PUT')
          <div class="form-group row">
            <label for="id_cliente" class="col-sm-2 col-form-label">Nombre cliente</label>
            <div class="col-sm-10">
              <select class="form-control kt-selectpicker" id="nombrecliente" name="idcliente" required>
                <option value="" style="display: none;">Seleccionar</option>
                @forelse ($clientes as $item9)
                <option value="{{$item9->id_cliente}}"> {{$item9->nombre}} {{$item9->apellido}}</option>
                @empty

                @endforelse
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="fecha_realizacion" class="col-sm-2 col-form-label">Fecha de realización</label>
            <div class="col-sm-10">
              <input type="datetime" class="form-control" id="fecha_realizacion" name="fecha_realizacion">
            </div>
          </div>
          <div hidden>
            @forelse ($logs as $itemlogs)
            <label name="idlogs" id="logs{{$itemlogs->id_log}}">{{$itemlogs->id_log}}//{{$itemlogs->hrmt_inicial}}//{{$itemlogs->hrmt_final}}//{{$itemlogs->hrs_activo}}//{{$itemlogs->hrs_inactivo}} </label>
            @empty
            @endforelse
          </div>
          <div hidden>
            @forelse ($maquinas as $itemmaq)
            <label name="idmaqrel" id="{{$itemmaq->id_maquina}}">{{$itemmaq->id_maquina}}//{{$itemmaq->modelo}} </label>
            <label name="maqrelhid" id="idrelmaq{{$itemmaq->id_maquina}}">{{$itemmaq->id_maquina}}//{{$itemmaq->horometro}}</label>
            @empty
            @endforelse
          </div>
          <div id="clonaraqui1">
          
          </div>
          <div class="form-group row">
            <label for="operador" class="col-sm-2 col-form-label">Operador</label>
            <div class="col-sm-10">
              <select class="form-control kt-selectpicker" name="idoperador" id="operadoreditserv" href="" required>
                <option value="" style="display: none;">Seleccionar</option>
                @forelse ($operadores as $item6)
                <option value="{{$item6->id_operador}}"> {{$item6->nombre}} {{$item6->apellido}}</option>
                @empty

                @endforelse
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="vendedor" class="col-sm-2 col-form-label">Vendedor</label>
            <div class="col-sm-10">
              <select class="form-control kt-selectpicker" name="vendedorselsered" id="vendedorselsered" href="" disabled>
                  <option value="" style="display: none;">Seleccionar</option>
                  @forelse ($vendedores as $itemvendsered)
                  <option value="{{$itemvendsered->id_vendedor}}"> {{$itemvendsered->nombre}} {{$itemvendsered->apellido}}</option> 
                  @empty
                  @endforelse
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity" >Estado</label>
              <select class="form-control" id="estadoserv" name="estado" required>
                <option value="Aguascalientes">Aguascalientes</option>
                <option value="Baja California">Baja California</option>
                <option value="Baja California Sur">Baja California Sur</option>
                <option value="Campeche">Campeche</option>
                <option value="Chiapas">Chiapas</option>
                <option value="Chihuahua">Chihuahua</option>
                <option value="Coahuila">Coahuila</option>
                <option value="Colima">Colima</option>
                <option value="Distrito Federal">Distrito Federal</option>
                <option value="Durango">Durango</option>
                <option value="México">México</option>
                <option value="Guanajuato">Guanajuato</option>
                <option value="Guerrero">Guerrero</option>
                <option value="Hidalgo">Hidalgo</option>
                <option value="Jalisco">Jalisco</option>
                <option value="Michoacán">Michoacán</option>
                <option value="Morelos">Morelos</option>
                <option value="Nayarit">Nayarit</option>
                <option value="Nuevo León">Nuevo León</option>
                <option value="Oaxaca">Oaxaca</option>
                <option value="Puebla">Puebla</option>
                <option value="Querétaro">Querétaro</option>
                <option value="Quintana Roo">Quintana Roo</option>
                <option value="San Luis Potosí">San Luis Potosí</option>
                <option value="Sinaloa">Sinaloa</option>
                <option value="Sonora">Sonora</option>
                <option value="Tabasco">Tabasco</option>
                <option value="Tamaulipas">Tamaulipas</option>
                <option value="Tlaxcala">Tlaxcala</option>
                <option value="Veracruz">Veracruz</option>
                <option value="Yucatán">Yucatán</option>
                <option value="Zacatecas">Zacatecas</option>
              </select>
            </div>
            <div class="form-group col-md-4">
                <label for="municipio" >Municipio</label>
                <select id="municipioeditserv" class="form-control" name="municipio"  required>
                </select>
            </div>
          </div>
          <div class="form-row" id="editrfcsect">
            <div class="form-group col-md-4">
                <label for="rfc" class="col-sm-2 col-form-label">RFC</label>
                <select class="form-control kt-selectpicker" name="rfc" id="rfc">
                  <option value="" style="display: none;">Seleccionar</option>
                  @forelse ($facturas as $item5)
                  <option value="{{$item5->idcopia}}"> {{$item5->nombre_fiscal}}</option>
                  @empty

                  @endforelse
                </select>
                <div id="nuevafacturaedit">
                    <label onMouseOver="this.style.color='red'" onMouseOut="this.style.color='blue'" style="color:blue;font-size:12px;" id="nuevafac">Nueva Facturacion</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="input" class="col-sm-2 col-form-label">CFDI</label>
                <input type="text" id="cfdi" class="form-control" name="cfdi" >
            </div>
            <div><input type="text" id="rfchidden" name="rfchidden" hidden></div>
            <div><input type="text" id="cfdihidden" name="cfdihidden" hidden></div>
          </div>
          <div style="display: none;" id="desdivdacedit">
              <label id="deseofacedit" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='blue'" style="color:blue;">¿Desea facturar?</label>
          </div>
          <div id="hidnewfacturaedi" class="form-group row" style="display: none;">
            <div class="form-group col-md-5">
              <div class="col-sm-10">
              <label for="nombre" class="col-form-label">RFC</label>
              </div>
                <input type="text" class="form-control" name="rfcfac" >
              
            </div>
            <div class="form-group col-md-5">
              <div class="col-sm-10">
              <label for="nombre" class=" col-form-label">Nombre de facturación</label>
              </div>
                <input type="text" class="form-control" name="nombre_fiscal" >
              
            </div>
            <div class="form-group col-md-5">
              <div class="col-sm-10">
              <label for="nombre" class="col-form-label">Dirección de facturación</label>
              </div>
                <input type="text" class="form-control" name="direccion_fiscal">
              
            </div>
            <div class="form-group col-md-5">
              <div class="col-sm-10">
                <label for="nombre" class="col-form-label">Código Postal</label>
              </div>
              <input type="number" maxlength="5" 
								oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" name="codigo_postal">
            </div>    
            <div class="form-group col-md-5" >
                <label for="nombre" class="col-form-label">CFDI</label>
                <input type="text" class="form-control" name="cfdiadd3" id="cfdiadd3">
            </div>      
          </div>
          <div class="form-group row">
            <label for="monto" class="col-sm-2 col-form-label">Monto de facturación</label>
              <input type="text" class="form-control" id="montoed" name="monto" disabled>
              <input type="text" class="form-control" id="montoedhidden" name="montohidden" hidden>
          </div>
          <div class="form-group row" id="estatusfirst">
            <label for="status" class="col-sm-2 col-form-label">Realizado</label>
            <div class="col-sm-10">
              <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label >
                    <input type="checkbox" class="form-control" id="estatuseditservicio" name="estatus">
                    <span></span>
                </label>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Cancelado</label>
            <div class="col-sm-10">
              <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label id="estatusfirst">
                    <input type="checkbox" class="form-control" id="estatuseditsercacelado" name="estatuscancelado">
                    <span></span>
                </label>
              </span>
              
            </div>
            
          </div>
          <div class="form-row" id="divrazones" hidden>
            <label for="rfc" class="col-sm-2 col-form-label">Razón de cancelación</label>
            <select class="form-control kt-selectpicker" name="razon_cancelacion" id="razon_cancelacionedit">
              <option value="" style="display: none;">Seleccionar</option>
              <option value="Error de validacion interna"> Error de validación interna</option>
              <option value="El cliente eligio a la competencia" >El cliente eligió a la competencia</option>
              <option value="El operador no llegó a tiempo" >El operador no llegó a tiempo</option>
            </select>
            <label style="color: red" for="">Una vez cancelado el servicio no podrá ser editado de nuevo</label>
          </div>

          <input type="hidden" id="id_serviciohidden" name="id_servicio">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="eventlistenercan">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="bttnsavedserv" onclick="saveeverything(event)">Guardar</button>
        
      </div>
    </form>
    </div>
  </div>
</div>
</div>