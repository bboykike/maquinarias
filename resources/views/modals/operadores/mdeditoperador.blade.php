<div class="modal fade" id="modeditoperadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar operador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formsubmitopedit" action="{{ route('editoperador') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreoperador" name="nombre" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidooperador" name="apellido" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="number" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" id="telefonooperador" name="telefono" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correooperador" name="correo" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_contrato" class="col-sm-2 col-form-label">Fecha de contrato</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="fecha_contrato" id="fecha_contrato" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="num_imss" class="col-sm-2 col-form-label">Número de IMSS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="num_imss" id="num_imss">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo_sangre" class="col-sm-2 col-form-label">Tipo de sangre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tipo_sangre" id="tipo_sangre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_nacimiento" class="col-2 col-form-label">Fecha de nacimiento</label>
                        <div class="col-10">
                            <input class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" type="date" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Estatus</label>
                        <div class="col-sm-10">
                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                <label>
                                    <input type="checkbox" id="estatusoperadorr" name="estatus">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direoperador" name="direccion" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Estado</label>
                            <select class="form-control" id="estadooperador" name="estado" required>
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
                            <label for="municipo">Municipio</label>
                            <select class="form-control" id="municipiooperador" name="municipio" required>
                            </select>
                        </div>
                        <input type="hidden" id="id_operador" name="id_operador">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="bttnguardeditop" class="btn btn-primary" onclick="this.form.submit(); this.disabled=true;">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div> 