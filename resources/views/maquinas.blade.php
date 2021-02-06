@extends('layauts/base')

@section('tittle', 'MJ SOLUCIONES | Maquinas')

@section('container')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="flaticon-user"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Maquinas
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					&nbsp;
					<a href="#" class="btn btn-info btn-elevate btn-icon-sm" data-toggle="modal" data-target="#modmaquinas">
						<i class="la la-plus"></i>
						Agregar Maquina
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
								<th>Modelo</th>
								<th>Horometro</th>
								<th>Año</th>
								<th>Tipo</th>
								<th>Estatus</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($maquinas as $item)
							<tr>
								<label hidden>{{$item->id_maquina}}</label>
								<td>{{ $item->modelo }}</td>
								<td>{{ $item->horometro }}</td>
								<td>{{ $item->anio }}</td>
								<td>{{ $item->tipo }}</td>
								
								<td>
									@if ($item->estatus=='activo')
									<span class='btn btn-label-success btn-pill'>Activo</span>
									@else
									<span class='btn btn-label-danger btn-pill'>Inactivo</span>
									@endif 
								</td>
									<td>
										<div class="btn-group" role="group">
											<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
											<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
												<a class="dropdown-item" href="#" onclick="showMaquina('{{$item->id_maquina}}||{{$item->modelo}}||{{ $item->horometro}}||{{ $item->tipo}}||{{ $item->anio}}||{{ $item->estatus}}')"><i class="la la-edit"></i>Editar maquina</a>
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
	<script src="js/maquinas/editmaquina.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

    <script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			
	        case 'AddMaquina':
	            Swal.fire({
                timer: 2000,
                title: 'Maquina agregada correctamente',
                type: 'success',
                showCloseButton: true
            });
	            break;
         	case 'UpMaquina':
	            Swal.fire({
                timer: 2000,
                title: 'Maquina actualizado correctamente',
                type: 'success',
                showCloseButton: true
            });
	            break;
	       
		}
	@endif
    </script>
@endsection