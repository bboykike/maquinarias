@extends('layauts/base')

@section('tittle', 'MJ SOLUCIONES | Operadores')

@section('container')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="flaticon-user"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Operadores
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					&nbsp;
					<a href="#" class="btn btn-info btn-elevate btn-icon-sm" data-toggle="modal" data-target="#modoperadores">
						<i class="la la-plus"></i>
						Agregar Operador
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="row" id="tableContainer">
			<div class="table-responsive">
				<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
					<!--begin: Datatable -->
					<table class="table table-bordered table-hover" id="example">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Teléfono</th>
								<th>Correo</th>
								<th>Dirección</th>
								<th>Estatus</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($operadores as $item)
							<tr>
								<td>{{ $item->nombre }} {{ $item->apellido }}</td>
								<td>{{ $item->telefono }}</td>
								<td>{{ $item->correo }}</td>
								<td>{{ $item->direccion }}</td>
								<td>
									@if ($item->estatus=='activo')
									<span class='btn btn-label-success btn-pill'>Activo</span>
									@else
									<span class='btn btn-label-danger btn-pill'>Inactivo</span>
									@endif 
									<td>
										<div class="btn-group" role="group">
											<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
											<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
												<a class="dropdown-item" href="#" onclick="showoperador('{{ $item->id_operador }}||{{ $item->nombre }}||{{ $item->apellido }}||{{ $item->telefono }}||{{ $item->correo }}||{{ $item->direccion }}||{{ $item->estado }}||{{ $item->municipio }}||{{ $item->estatus }}||{{ $item->fecha_contrato }}||{{ $item->num_imss }}||{{ $item->tipo_sangre }}||{{ $item->fecha_nacimiento }}')"><i class="la la-edit"></i>Editar operador</a>
											</div>
										</div>
									</td>
									@empty
									<div class="alert alert-danger" role="alert">
										<strong>¡tabla vacia!</strong>
									</div>
								</tr>
								@endforelse
							</tbody>
						</table>
						<!--end: Datatable -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/operadores/editoperador.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
	<script src="assets/js/pages/crud/forms/widgets/input-mask.js" type="text/javascript"></script>
<script>
@if(Session::has('message'))
	var Opera="{{Session::get('alert-type','info')}}"

	switch(Opera){
		
		case 'AddOperador':
			Swal.fire({
			timer: 2000,
			title: 'Operador agregado correctamente',
			type: 'success',
			showCloseButton: true
		});
			break;
		 case 'UpOperador':
			Swal.fire({
			timer: 2000,
			title: 'Operador actualizado correctamente',
			type: 'success',
			showCloseButton: true
		});
			break;
	   
	}
@endif
</script>
@endsection