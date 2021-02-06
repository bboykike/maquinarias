<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>@yield('tittle')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
	<!--end::Fonts -->
	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<link rel="icon" href="https://mj-construcciones.com/wp-content/uploads/2020/03/cropped-logo-copia-32x32.png" sizes="32x32" />
</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
	<!-- begin:: Header Mobile -->
	@extends('layauts/navMovi')
	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<!-- begin:: Header -->
				@extends('layauts/nav')
				<!-- END:: Header -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-container  kt-container--fluid ">
						<div class="kt-subheader__main">
						</div>
					</div>
				</div>
				<!-- begin:: Content -->
				<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
					<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
						@yield('container')
					</div>
				</div>
				<!-- END:: Content -->
				
				<!-- begin:: footer -->
				@extends('layauts/footer')
				<!-- END:: footer -->
			</div>
		</div>
	</div>

	<!-- begin::modales -->
	@extends('modals/operadores/mdoperadores')
	@extends('modals/operadores/mdeditoperador')

	@extends('modals/clientes/addcliente')
	@extends('modals/clientes/editcliente')

	@extends('modals/maquinas/mdmaquinas')
	@extends('modals/maquinas/edmaquinas')

	@extends('modals/servicios/edservicios')
	@extends('modals/servicios/mdservicios')

	@extends('modals/vendedores/mdvendedores')
	@extends('modals/vendedores/edvendedores')

<!-- begin::modales-->
	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#2c77f4",
					"light": "#ffffff",
					"dark": "#282a3c",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};
	</script>
	<!-- end::Global Config -->
	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
	<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->
	<!--begin::Page Vendors(used by this page) -->
	<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
	<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
	<script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
	<!--end::Page Vendors -->
	<script src="assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
	<script src="assets/js/pages/crud/metronic-datatable/base/html-table.js" type="text/javascript"></script>
	<!--end::Page Scripts -->
	<script>
		$(document).ready(function() {
			$('#example tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" placeholder="Buscar'+title+'" />' );
			} );
			
			var table = $('#example').DataTable({
				"language": {
					search: 'Buscar:',
					"lengthMenu": "Mostrando _MENU_ registros por pagina",
					"zeroRecords": "Sin datos",
					"info": "Mostrando _PAGE_ de _PAGES_",
					"infoEmpty": "Sin registros",
					"infoFiltered": "(filtrados de _MAX_)",
					paginate: {
						first: 'Primero',
						previous: 'Anterior',
						next: 'Siguiente',
						last: 'Último',
					}
				}
			});
		} );
	</script>
</body>
<!-- end::Body -->
</html>