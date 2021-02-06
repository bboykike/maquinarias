$(document).ready(function() {
    $(".sorting_asc").click();
    var id_servicio_hidden = $('#example').find('input[name="id_servicio_hidden"]').get();
    $(".sorting_desc").click();
    var lenghid = id_servicio_hidden.length;
    if (lenghid > 0) {
        var idtochange = id_servicio_hidden[0].value;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        $.ajax({
            type: "PUT",
            url: "/Relacion",
            data: { id_servicio: idtochange, identificador: 1 },
        });
    }

    $("#deseofac").on("click", function() {
        $("#deseofac").hide();
        $("#factdatadiv").show();
    });

    $("#modservicios").mousemove(function(event) {
        calcPromesa();
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
    });
    $.ajax({
        type: "POST",
        url: "procesar-estados.php",
        data: { estados: "Mexico" },
    }).done(function(data) {
        $("#jmr_contacto_estado").html(data);
    });
    // Obtener municipios
    $("#jmr_contacto_estado").change(function() {
        var estado = $("#jmr_contacto_estado option:selected").val();
        $.ajax({
            type: "POST",
            url: "procesar-estados.php",
            data: { municipios: estado },
        }).done(function(data) {
            $("#jmr_contacto_municipio").html(data);
        });
    });
    $("#nuevafac").on("click", function() {
        $("#factdatadiv").hide();
        $("#hidnewfactura").show();
    });
});

function savenewrelation() {
    var precio = 0;
    var bandera = 0;
    var pass = 0;
    var pass2 = 0;
    var maquinaid;
    var contador = 0;
    var fecha_realizacion = $("#fecha_realizacion1").val();
    var cliente = $("#cliente").val();
    var nombre = $("#cliente option:selected").text();
    var operador = $("#operador12").val();
    var vendedor = $("#vendedorselserv option:selected").val();
    var direccion = $("#direccionadd").val();
    var estado = $("#jmr_contacto_estado option:selected").text();
    var municipio = $("#jmr_contacto_municipio option:selected").text();
    var rfc = $("#rfcselc").val();
    var cfdi = $("#cfdiadd").val();
    var promesaventa = parseFloat($("#monto_facturacionadd").val());
    if (rfc.length == 0) {
        rfc = null;
    }
    if (cfdi.length == 0) {
        cfdi = null;
    }
    if (promesaventa != 0) {
        promesaventa = 0;
        do {
            var maqui = document.getElementsByClassName("selmaqui");
            if (contador + 1 < maqui.length) {
                if (maqui[contador + 1].selectedIndex != 0) {
                    maquinaid = maqui[contador + 1].selectedIndex;
                    pass = 1;
                    bandera = 0;
                } else {
                    pass = 0;
                    bandera = 1;
                }
            } else {
                pass = 0;
                bandera = 1;
            }
            if (pass != 0) {
                contador2 = contador + 1;
                var precio = $(
                    "input[name='[" + contador2 + "][precio_hr]']"
                ).val();
                var horas = $(
                    "input[name='[" + contador2 + "][num_hr]']"
                ).val();
                var valor = precio * horas;
                var servicio = 0;
                promesaventa = promesaventa + valor;
                if (valor == 0) {
                    pass2++;
                }

                if (pass2 == 0) {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        type: "POST",
                        url: "/AjaxRequest",
                        data: {
                            id_maquina: maquinaid,
                            id_servicio: servicio,
                            precio_hr: precio,
                            num_hr: horas,
                            valor: valor,
                        },
                        beforeSend: function() {
                            document.getElementById("bttnguard").disabled = true;
                        },
                        error: (err) => {
                            document.getElementById("bttnguard").disabled = false;
                            console.error(err);
                        },
                    });
                    contador++;
                } else {
                    bandera++;
                }
            } else {
                bandera++;
            }
        } while (bandera == 0);
        if (pass2 == 0) {
            if ($("input[name=rfcfac]").val().length > 0) {
                rfc = $("input[name=rfcfac]").val();
                var nombreF = $("input[name=nombre_fiscal]").val();
                var direccionF = $("input[name=direccion_fiscal]").val();
                var codigoPostal = $("input[name=codigo_postal]").val();
                cfdi = $("#cfdiadd2").val();
            }
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "/AjaxRequestServ",
                data: {
                    fecha_realizacion: fecha_realizacion,
                    nombre: nombre,
                    id_cliente: cliente,
                    id_operador: operador,
                    id_vendedor: vendedor,
                    direccion: direccion,
                    estado: estado,
                    municipio: municipio,
                    rfc: rfc,
                    cfdi: cfdi,
                    monto_facturacion: promesaventa,
                    estatus: "Activo",
                },
                error: (err) => {
                    document.getElementById("bttnguard").disabled = false;
                    console.error(err);
                },
                complete: function() {
                    if ($("input[name=rfcfac]").val().length > 0) {
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                        });
                        $.ajax({
                            type: "POST",
                            url: "/ServiciosF",
                            data: {
                                id_rfc: rfc,
                                nombre_fiscal: nombreF,
                                direccion_fiscal: direccionF,
                                codigo_postal: codigoPostal,
                                idcopia: rfc,
                            },
                            error: (err) => {
                                document.getElementById("bttnguard").disabled = false;
                                console.error(err);
                            },
                            complete: function() {
                                location.reload();
                            },
                        });
                    } else {
                        location.reload();
                    }
                },
            });
        } else {
            pass = 0;
        }
    }

    Swal.fire({
        timer: 2000,
        title: 'Servicio agregado correctamente',
        type: 'success',
        showCloseButton: true
    });
}

function calcPromesa() {
    var promesaventashow = 0;
    var banderahere = 0;
    contador = 0;
    do {
        if (
            $("input[name='[" + contador + "][precio_hr]']").length &&
            $("input[name='[" + contador + "][num_hr]']").length
        ) {
            var precio = $("input[name='[" + contador + "][precio_hr]']").val();
            var horas = $("input[name='[" + contador + "][num_hr]']").val();
            var valor = precio * horas;
            $("input[name='[" + contador + "][sub]']").val(valor);

            promesaventashow = promesaventashow + valor;
            contador++;
        } else {
            banderahere++;
        }
    } while (banderahere == 0);
    $("#monto_facturacionadd").val(promesaventashow);
}

function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}