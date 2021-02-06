@extends('layauts/base')

@section('tittle', 'MJ SOLUCIONES | Logs')

@section('container')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="flaticon-map"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Logs
			</h3>
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
								<th>Clave del Servicio</th>
								<th>Fecha Modificacion</th>
								<th>Maquina</th>
								<th>Horometro Inicial</th>
								<th>Horometro Final</th>
								<th>Horas Inactivas</th>
								<th>Horas Activas</th>
								<th>Horometro Actual</th>							
							</tr>
						</thead>
						<tbody>
							@forelse ($logs as $datosLogs)
							<tr>
							    
								<td>{{ $datosLogs->id_servicio }}</td>
								<td>{{ \Carbon\Carbon::parse($datosLogs->created_at)->format('d/m/Y')}}</td>
								<td>{{ $datosLogs->modelo }}</td>
								<td>{{ $datosLogs->hrmt_inicial }}</td>
								<td>{{ $datosLogs->hrmt_final }}</td>
								<td>{{ $datosLogs->hrs_inactivo }}</td>
								<td>{{ $datosLogs->hrs_activo }}</td>
								<td>{{ $datosLogs->horometro }}</td>
					
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

</div>



	@endsection