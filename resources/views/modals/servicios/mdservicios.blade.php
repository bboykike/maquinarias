<div class="modal fade" id="modservicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form method="POST" > -->
                @csrf
                <div class="form-group row">
                    <label for="fecha_realizacion1" class="col-sm-2 col-form-label">Fecha de realización</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" name="fecha_realizacion1"
                               id="fecha_realizacion1" required>
                    </div>
                </div>
                <div id="kt_repeater_2" style="border-top: 1px solid #eeeef4;" id="calcprom">
                    <div class="kt-heading kt-heading--md">Selecciona la maquina
                    </div>
                    <div class="form-group form-group-last row" id="kt_repeater_2">
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item="" class="form-group row align-items-center" style="display: none;">
                                <div class="form-row align-items-center">
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label for="nombre">Maquina</label>
                                        </div>
                                        <select class="form-control kt-selectpicker selmaqui mb-2" name="maquina"
                                                required>
                                            <option value="" style="display: none;">Seleccionar</option>
                                            @forelse ($maquinas as $item3)
                                                @if ($item3->estatus=='activo')
                                                    <option value="{{$item3->id_maquina}}">{{$item3->modelo}}</option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label for="nombre"> Precio por hora </label>
                                        </div>
                                        <input type="number" onkeypress='validate(event)' class="form-control mb-2"
                                               name="precio_hr" id="precio_hrveces" onclick="calcPromesa('siga')"
                                               required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label for="nombre">Total de horas</label>
                                        </div>
                                        <input type="number" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                               class="form-control mb-2" name="num_hr" id="num_hrveces"
                                               onclick="calcPromesa('siga')" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label for="subtotal">Total por maquina</label>
                                        </div>
                                        <input type="text" class="form-control mb-2" name="sub" id="sub" disabled>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <label class="kt-label m-label--single"></label>
                                    <a href="javascript:;" data-repeater-delete=""
                                       class="btn-sm btn btn-label-danger btn-bold" onclick="quitar()"><i
                                                class="la la-trash-o"></i>Quitar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <label class="col-lg-5 col-form-label"></label>
                        <div class="col-lg-4">
                            <a href="javascript:;" data-repeater-create="" id="botonProductos"
                               class="btn btn-bold btn-sm btn-label-brand"><i class="la la-plus"></i> Agregar</a>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Cliente</label>
                    <select class="form-control kt-selectpicker" name="cliente" id="cliente" required>
                        <option value="" style="display: none;">Seleccionar</option>
                        @forelse ($clientes as $item8)
                            @if ($item8->estatus=='activo')
                                <option value="{{$item8->id_cliente}}"> {{$item8->nombre}} {{$item8->apellido}}</option>
                            @endif
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Operador</label>
                    <select class="form-control kt-selectpicker" name="operador" id="operador12" href="" required>
                        <option value="" style="display: none;">Seleccionar</option>
                        @forelse ($operadores as $item2)
                            @if ($item2->estatus=='activo')
                                <option value="{{$item2->id_operador}}"> {{$item2->nombre}} {{$item2->apellido}}</option>
                            @endif
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Vendedor</label>
                    <select class="form-control kt-selectpicker mb-2" name="vendedorselserv" id="vendedorselserv" href="" required>
                        <option value="" style="display: none;">Seleccionar</option>
                        @forelse ($vendedores as $itemvendser)
                            @if ($itemvendser->estatus=='activo')
                                <option value="{{$itemvendser->id_vendedor}}">{{$itemvendser->nombre}} {{$itemvendser->apellido}}</option>
                            @endif
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccionadd" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity">Estado</label>
                        <select id="jmr_contacto_estado" class="form-control" name="estado" required>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="municipo">Municipio</label>
                        <select id="jmr_contacto_municipio" class="form-control" name="municipio" required>
                        </select>
                    </div>
                </div>
                <div>
                    <label id="deseofac" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='blue'"
                           style="color:blue;">¿Desea facturar?</label>
                </div>
                <div id="factdatadiv" class="form-row" style="display: none;">
                    <div class="form-group col-md-4" id="divrfc">
                        <label for="nombre" class="col-sm-2 col-form-label">RFC</label>
                        <select class="form-control kt-selectpicker" name="rfcselc" id="rfcselc">
                            <option value="" style="display: none;">Seleccionar</option>
                            @forelse ($facturas as $item4)
                                <option value="{{$item4->idcopia}}"> {{$item4->nombre_fiscal}}</option>
                            @empty

                            @endforelse
                        </select>
                        <div>
                            <label onMouseOver="this.style.color='red'" onMouseOut="this.style.color='blue'"
                                   style="color:blue;font-size:12px;" id="nuevafac">Nueva Facturacion</label>
                        </div>
                    </div>
                    <div></div>
                    <div class="form-group col-md-4" id="divcfdi">
                        <label for="nombre" class="col-sm-2 col-form-label">CFDI</label>
                        <input type="text" class="form-control" name="cfdi" id="cfdiadd">
                    </div>
                </div>
                <div id="hidnewfactura" class="form-group row" style="display: none;">
                    <div class="form-group col-md-5">
                        <div class="col-sm-10">
                            <label for="nombre" class="col-form-label">RFC</label>
                        </div>
                        <input type="text" class="form-control" name="rfcfac">
                    </div>
                    <div class="form-group col-md-5">
                        <div class="col-sm-10">
                            <label for="nombre" class=" col-form-label">Nombre de facturación</label>
                        </div>
                        <input type="text" class="form-control" name="nombre_fiscal">

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
								oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control"
                               name="codigo_postal">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="nombre" class="col-form-label">CFDI</label>
                        <input type="text" class="form-control" name="cfdi" id="cfdiadd2">
                    </div>
                </div>
                <div id="divfactmonto" class="form-group col-md-15">
                    <label for="nombre" class="col-sm-6 col-form-label">Monto de facturación</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="monto_facturacion" id="monto_facturacionadd"
                               disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="bttnguard" onclick="savenewrelation()">Guardar
                </button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<script src="js/servicios/modservicios.js"></script>
<script src="assets/js/pages/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>