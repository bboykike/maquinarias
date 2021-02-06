<div class="modal fade" id="modmaquinas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar maquina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formsubmitmaqadd" action="{{ route('addmaquina') }}">
          @csrf
          <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="modelo" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Horometro</label>
                <input id="horometro" class="form-control" type="number" name="horometro" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                <option disabled selected value>Seleccione el tipo</option>
                <option value="Propia">Propia</option>
                <option value="Rentada">Rentada</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Año</label>
                <input id="anio" class="form-control" type="text" name="anio" required>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="bttnguardaddmaq" onclick="this.form.submit(); this.disabled=true;">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div> 