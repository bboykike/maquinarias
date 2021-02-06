<div class="modal fade" id="edivendedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formsubmitvendedit" action="{{ route('edivendedor')}}">
          @csrf @method('PUT')
          <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre completo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombrevened" name="nombrevened" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Estatus</label>
            <div class="col-sm-10">
              <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label>
                  <input type="checkbox" id="estatusvendedored" name="estatusvendedored">
                  <span></span>
                </label>
              </span>
            </div>
            <input type="hidden" id="id_vendedor" name="id_vendedor">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="bttnguardeditvend" onclick="this.form.submit(); this.disabled=true;">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>