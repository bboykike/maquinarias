@extends('layauts/base')

@section('tittle', 'MJ SOLUCIONES | Vendedores')

@section('container')


<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="flaticon-user"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Vendedores
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    &nbsp;
                    <a href="#" class="btn btn-info btn-elevate btn-icon-sm" data-toggle="modal"
                        data-target="#modvendedores">
                        <i class="la la-plus"></i>
                        Agregar Vendedor
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
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
							@forelse($vendedores as $itemven)
							
                                <tr>
                                    <label hidden>{{$itemven->id_vendedor}}</label>
                                    <td>{{ $itemven->nombre }} {{ $itemven->apellido }}</td>
                                    <td>
                                        @if($itemven->estatus=='activo')
                                            <span class='btn btn-label-success btn-pill'>Activo</span>
										@else
										    <span class='btn btn-label-danger btn-pill'>Inactivo</span> 
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
										<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                <a class="dropdown-item" onclick="showVendedor('{{$itemven->id_vendedor}}||{{$itemven->nombre}}||{{$itemven->apellido}}||{{$itemven->estatus}}')">
                                                    <i class="la la-edit"></i>Editar Vendedor
                                                </a>
                                            </div>
                                        </div>
                                    </td>
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
<script src="js/vendedores/editvendedor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>


<script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			
	        case 'AddVendedor':
	            Swal.fire({
                timer: 2000,
                title: 'Vendedor agregado correctamente',
                type: 'success',
                showCloseButton: true
            });
	            break;
         	case 'UpdateVendedor':
	            Swal.fire({
                timer: 2000,
                title: 'Vendedor actualizado correctamente',
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
