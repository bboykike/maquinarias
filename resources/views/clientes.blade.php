@extends('layauts/base')

@section('tittle', 'MJ SOLUCIONES | Clientes')

@section('container')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="flaticon-user"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Clientes
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					&nbsp;
					<a class="btn btn-info btn-elevate btn-icon-sm" href="/" data-target="#add_cliente" data-toggle="modal">
						<i class="la la-plus"></i>
						Agregar Cliente
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
							@forelse ($clientes as $Viewclient)
							<tr>
							    
								<td>{{ $Viewclient->nombre }} {{ $Viewclient->apellido }}</td>
								<td>{{ $Viewclient->telefono }}</td>
								<td>{{ $Viewclient->correo }}</td>
								<td>{{ $Viewclient->direccion }}</td>
								<td>
									@if ($Viewclient->estatus=='activo')
										<span class='btn btn-label-success btn-pill'>Activo</span>
									@else
										<span class='btn btn-label-danger btn-pill'>Inactivo</span>
									@endif 
								<td>
										<div class="btn-group" role="group">
											<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
											<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
												<a class="dropdown-item" href="#"
                                                onclick="uploadData('{{ $Viewclient->id_cliente }}||{{$Viewclient->nombre}}||{{ $Viewclient->apellido}}||{{ $Viewclient->telefono}}||{{$Viewclient->correo}}||{{$Viewclient->estado}}||{{$Viewclient->municipio}}||{{$Viewclient->direccion}}||{{$Viewclient->estatus}}');" data-toggle="modal" data-id=""><i class="la la-edit"></i>Editar cliente</a>											</div>
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

    
    <script src="js/clientes/cargaEstados.js"></script>
    <script src="js/clientes/editcliente.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

    <script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			
	        case 'nuevo':
	            Swal.fire({
                timer: 2000,
                title: 'Cliente agregado correctamente',
                type: 'success',
                showCloseButton: true
            });
	            break;
         	case 'actualizar':
	            Swal.fire({
                timer: 2000,
                title: 'Cliente actualizado correctamente',
                type: 'success',
                showCloseButton: true
            });
	            break;
	       
		}
	@endif
    </script>

    @if ($errors->any())
	   @foreach ($errors->all() as $error)
	     <!-- <div class="alert alert-danger"><strong>* {{$error}}</strong></div> -->
         <script>
         Swal.fire({
                timer: 4000,
                title: 'El cliente ya se encuentra registrado',
                type: 'warning',
                showCloseButton: true
            });
         </script>
	   @endforeach
	@endif

	@endsection