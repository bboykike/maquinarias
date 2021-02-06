@extends('layauts/base')

@section('tittle', 'MJ SOLUCIONES | Disponibilidad')

@section('container')


<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="flaticon-map-location"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Disponibilidad
            </h3>
        </div>
        <!-- <div class="kt-portlet__head-toolbar"> -->
        <!-- <div class="kt-portlet__head-wrapper"> -->
        <!-- <div class="kt-portlet__head-actions"> -->
        <!-- &nbsp; -->
        <!-- <a class="btn btn-info btn-elevate btn-icon-sm" href="/" data-target="#add_cliente" data-toggle="modal">
                        <i class="la la-plus"></i>
                        Agregar Servicio
                    </a> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div>         -->
    </div>
    <!-- begin:: Page -->
    <div style="margin-top:-60px" class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="row">
                            <div class="col-lg-3">
                                <!--begin::Portlet Codigo estatus-->
                                <div class="kt-portlet" id="kt_portlet">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <span class="kt-portlet__head-icon">
                                                <i class="flaticon-list-2"></i>
                                            </span>
                                            <h3 class="kt-portlet__head-title">
                                                Estatus
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div id="kt_calendar_external_events" class="fc-unthemed">                                            
                                            <div style="background-color:#FBB822;"><center><h5 style="color:white;">Pendientes</h5></center></div>
                                            <br>
                                            {{-- <div style="background-color:#5867DD;"><center><h5 style="color:white">En Proceso</h5></center></div> --}}
                                        </div>
                                    </div>
                                </div>

                                <!--end::Portlet Codigo estatus-->
                            </div>
                            <div class="col-lg-9">
                                <!--begin::Portlet-->
                                <div class="kt-portlet">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <span class="kt-portlet__head-icon">
                                                <i class="flaticon-map-location"></i>
                                            </span>
                                            <h3 class="kt-portlet__head-title">
                                                Servicios
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <div class="kt-portlet__head-group">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-info btn-elevate btn-icon-sm" data-toggle="modal" data-target="#modservicios">
                                                        <i class="la la-plus"></i> Agregar Servicio
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div id="kt_calendar"></div>
                                    </div>
                                </div>
                                <!--end::Portlet-->
                            </div>
                        </div>
                    </div>
                    <!-- end:: Content -->
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Page -->


    <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/components/calendar/external-events.js" type="text/javascript"></script>
    <!--end::Page Scripts -->
    <script>
       var MostrarEventos = "{{url('/disponibilidad/show')}}";
   </script>
</div>
    
    

@endsection