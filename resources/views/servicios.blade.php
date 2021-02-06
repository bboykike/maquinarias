@extends('layauts/base')

@section('tittle', 'MJ SOLUCIONES | Servicios')

@section('container')


<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="flaticon-user"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Servicios
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    &nbsp;
                    <a href="#" class="btn btn-info btn-elevate btn-icon-sm" data-toggle="modal"
                        data-target="#modservicios">
                        <i class="la la-plus"></i>
                        Agregar Servicio
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
                                <th>código servicio</th>
                                <th>Lugar servicio</th>
                                <th>Operador</th>
                                <th>Fecha de realización</th>
                                <th>Promesa de venta</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($servicios as $item)
                                <tr>
                                    <td>{{$item->id_servicio}}</td>
                                    <td>{{ $item->estado }}, {{ $item->municipio }}</td>
                                    <td>{{ $item->nombre }} {{ $item->apellido }}</td>
                                    <td>{{ $item->start }}</td>
                                    <td>${{ number_format($item->monto_facturacion, 2, '.', ',') }}</td>
                                    <td>
                                        @if($item->estatus=='activo')
                                            <span class='btn btn-label-warning btn-pill'>Pendiente</span>
                                        @else
                                            @if($item->estatus=='inactivo')
                                                <span class='btn btn-label-success btn-pill'>Realizado</span>
                                            @else
                                                <span class='btn btn-label-danger btn-pill' title="{{$item->razon_cancelacion}}">Cancelado</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="#" @if($item->estatus=='cancelado' || $item->estatus=='inactivo') style="pointer-events: none; cursor: default;" @endif data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                <a class="dropdown-item" onclick="showservicio('{{ $item->id_servicio }}||{{ $item->title }}||{{ $item->start }}||{{ $item->direccion }}||{{ $item->estado }}||{{ $item->municipio }}||{{ $item->id_rfc }}||{{ $item->cfdi }}||{{ $item->monto_facturacion }}||{{ $item->estatus }}||{{ $item->id_cliente }}||{{ $item->id_operador }}||{{ $item->id_vendedor}} ')">
                                                    <i class="la la-edit"></i>Editar servicio
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <input type="hidden" value="{{ $item->id_servicio }}" name="id_servicio_hidden">
                                @empty
                                    <div class="alert alert-danger" role="alert">
                                        <strong>¡tabla vacia!</strong>
                                    </div>
                            @endforelse
                            </tr>
                        </tbody>
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/servicios/editservicios.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>


<script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			
	        case 'AddServicio':
	            Swal.fire({
                timer: 2000,
                title: 'Servicio agregado correctamente',
                type: 'success',
                showCloseButton: true
            });
	            break;
         	case 'UpdateServicio':
	            Swal.fire({
                timer: 2000,
                title: 'Servicio actualizado correctamente',
                type: 'success',
                showCloseButton: true
            });
	            break;
	       
		}
	@endif
    </script>

     @if ($errors->any())
	   @foreach ($errors->all() as $error)
	    <script>
         Swal.fire({
                timer: 2500,
                title: '{{$error}}',
                type: 'error',
                showCloseButton: true
            });
        </script>
        
	   @endforeach
	@endif
@endsection
