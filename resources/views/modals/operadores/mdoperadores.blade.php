<div class="modal fade" id="modoperadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar operador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formsubmitopadd" action="{{ route('addoperador') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre(s)</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="apellido" class="col-sm-2 col-form-label">Apellido(s)</label>
                            <input type="text" class="form-control" name="apellido" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="number" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" name="telefono" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_contrato" class="col-sm-2 col-form-label">Fecha de contrato</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="fecha_contrato" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="num_imss" class="col-sm-2 col-form-label">Número de IMSS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="num_imss">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo_sangre" class="col-sm-2 col-form-label">Tipo de sangre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tipo_sangre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_nacimiento" class="col-2 col-form-label">Fecha de nacimiento</label>
                        <div class="col-10">
                            <input class="form-control" name="fecha_nacimiento" id="kt_inputmask_1" type="text" />
                            <span class="form-text text-muted">Formato: <code>MM/DD/AAAA</code></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Estado</label>
                            <select id="jmr_contacto_estadooperador" class="form-control" name="estado" required>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="municipo">Municipio</label>
                            <select id="jmr_contacto_municipiooperador" class="form-control" name="municipio" required>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="bttnguardaddop" class="btn btn-primary" onclick="this.form.submit(); this.disabled=true;">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div> 