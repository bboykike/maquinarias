<!-- Inicio del modal para agregar cliente -->
<div class="modal fade" id="up_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulomodal">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form name="clienForm" id="formsubmitcliedit" action="{{route('editcliente')}}" method="POST">

                <div class="modal-body">
                    @csrf @method('PUT')
                    <input type="hidden" name="estatus" id="estatus">
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Nombre(s)</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Apellido(s)</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Teléfono/Celular</label>
                        <div class="col-10">
                            <input class="form-control" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telefono" id="telefono" data-mask="(999) 999-9999" type="number" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Correo</label>
                        <div class="col-10">
                            <input class="form-control" name="correo" id="correo" type="email" required />
                        </div>
                    </div>
                    <div class="form-group row" id="ocuestado">
                        <label for="" class="col-2 col-form-label">Estado</label>
                        <div class="col-10">
                            <select class="form-control kt-selectpicker" name="estado" id="estadocliente">
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
                    </div>
                    <div class="form-group row" id="ocumunicipio">
                        <label for="" class="col-2 col-form-label">Municipio</label>
                        <div class="col-10">
                            <select class="form-control kt-selectpicker" name="municipio" id="municipiocliente" required onchange="">

                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="ocudireccion">
                        <label for="" class="col-2 col-form-label">Dirección</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="direccioncliente" name="direccion" required onchange="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Estatus</label>
                        <div class="col-sm-10">
                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                <label>
                                    <input type="checkbox" id="estatuscliente" name="estatus">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <input type="hidden" id="id_cliente" name="id_cliente">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" onclick="this.form.submit(); this.disabled=true;" class="btn btn-primary" id="btn-save" name="btnsave">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> 