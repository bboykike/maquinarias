<div class="modal fade" id="modvendedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formsubmitvendadd" action="{{ route('addvendedor') }}">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Nombre</label>
                <input id="nombreven" class="form-control" type="text" name="nombreven" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">Apellido</label>
                <input id="apellidoven" class="form-control" type="text" name="apellidoven" required>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="bttnguardaddvend" onclick="this.form.submit(); this.disabled=true;">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>