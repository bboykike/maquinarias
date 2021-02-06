<!-- Inicio del modal para agregar cliente -->
<div class="modal fade" id="add_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulomodal">Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form name="clienForm" id="formsubmitcliadd" action="{{route('addcliente')}}" method="POST">
                <div class="modal-body">
                    {{ csrf_field()}}
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Nombre(s)</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" required onchange="validate()">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Apellido(s)</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="apellido" name="apellido" required onchange="validate()">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Teléfono/Celular</label>
                        <div class="col-10">
                            <input class="form-control" maxlength="10" 
							oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
							name="telefono" id="telefono" data-mask="(999) 999-9999" type="number" required onchange="validate()" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Correo</label>
                        <div class="col-10">
                            <input class="form-control" name="correo" id="correo" type="email" required onchange="validate()" />
                        </div>
                    </div>
                    <div class="form-group row" id="ocuestado">
                        <label for="" class="col-2 col-form-label">Estado</label>
                        <div class="col-10">
                            <select class="form-control kt-selectpicker" name="estado" id="addestadocliente" onchange="">
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="ocumunicipio">
                        <label for="" class="col-2 col-form-label">Municipio</label>
                        <div class="col-10">
                            <select class="form-control kt-selectpicker" name="municipio" id="addmunicipiocliente" required onchange="">
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="ocudireccion">
                        <label for="" class="col-2 col-form-label">Dirección</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="direccion" name="direccion" required onchange="">
                        </div>
                    </div>						
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit"onclick="this.form.submit(); this.disabled=true;" class="btn btn-primary" id="btn-save-cliadd" name="btnsave">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> 
