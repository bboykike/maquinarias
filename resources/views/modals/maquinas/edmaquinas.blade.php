<div class="modal fade" id="edimaquinas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar maquina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formsubmitmaqedit" action="{{ route('edimaquina')}}">
          @csrf @method('PUT')
          <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Horometro</label>
                <input id="horometro_edit" class="form-control" type="number" name="horometro_edit" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Tipo</label>
                <select name="tipo_edit" id="tipo_edit" class="form-control" required>
                <option disabled selected value>Seleccione el tipo</option>
                <option value="Propia">Propia</option>
                <option value="Rentada">Rentada</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Año</label>
                <input id="anio_edit" class="form-control" type="text" name="anio_edit" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Estatus</label>
            <div class="col-sm-10">
              <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label>
                  <input type="checkbox" id="estatusmaquina" name="estatus">
                  <span></span>
                </label>
              </span>
            </div>
            <input type="hidden" id="id_maquina" name="id_maquina">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="bttnguardeditmaq" onclick="this.form.submit(); this.disabled=true;">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div> 