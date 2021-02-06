var clone;
var procede = 0;
var maximarelacion = 0;

function showservicio(o) {
    var idrelmax = $('#modalbodyedit').find('label[name="idsrel"]').get();
    var lengmax = idrelmax.length;
    var maxidrelacion = idrelmax[lengmax - 1].textContent;
    maxidrelacion = maxidrelacion.split("//");
    maxidrelacion = maxidrelacion[5];
    maxidrelacion = parseInt(maxidrelacion);
    maximarelacion = maxidrelacion;

    let servicio = o.split("||");

    var contadorserv = 0;
    var contadorclon = 1;
    var tempcont = 0;
    var countmaqs = 0;
    var tempcountarraymaq = 0;
    var tempcountarraylogs = 0;

    var idmaqmax = $('#modalbodyedit').find('label[name="maqrelhid"]').get();
    var maqlength = idmaqmax.length;
    var lastid = idmaqmax[maqlength - 1].textContent;
    lastid = lastid.split("//");
    lastid = lastid[0];
    lastid = parseInt(lastid);

    var arraymaquinas = new Array();
    for (countmaqs = 0; countmaqs <= lastid; countmaqs++) {
        if ($('#idrelmaq' + countmaqs).length > 0) {
            arraymaquinas[tempcountarraymaq] = $('#idrelmaq' + countmaqs)[0].innerText;
            tempcountarraymaq++;
        }
    }

    for (i = 0; i < maxidrelacion; i++) {
        contadorserv++;
        if ($('#serviciosgetid' + contadorserv).length > 0) {


            var reldata = ($('#serviciosgetid' + contadorserv)).text();
            reldata = reldata.split("//");



            var idserv = reldata[0];
            if (idserv == servicio[0]) {
                contadorclon++;
                tempcont++;
                $('#clonaraqui' + tempcont).html('<div class="form-row dead">' +
                    '<div class="form-group col-md-3">' +
                    '<div>' +
                    '<label for="nombre" >Maquina</label>' +
                    '</div>' +
                    '<select class="form-control kt-selectpicker selmaqui2 mb-2" name="maquina" class="temp" required>' +
                    '<option value="" style="display: none;">Seleccionar</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-3"><div><label for="nombre"> Precio por hora </label></div>' +
                    '<input type="number" onkeypress="validate(event)" class="form-control mb-2 prehr prepost" name="precio_hr1"  onclick="calcPromesa("siga")" required>' +
                    '</div>' +
                    '<div class="form-group col-md-3">' +
                    '<div>' +
                    '<label for="nombre">Total de horas</label>' +
                    '</div>' +
                    '<input type="number" class="form-control mb-2 nuhr nupost1" name="num_hr" id="num_hrvecesedit"  required>' +
                    '</div>' +
                    '<div class="form-group col-md-3">' +
                    '<div>' +
                    '<label for="nombre">Horometro actual</label>' +
                    '</div>' +
                    '<input type="number" class="form-control mb-2 horomt horopost1" name="horometro" id="horometroedit"  disabled>' +
                    '<input type="number"  name="horometrohidden" id="horometroedithidden" hidden>' +
                    '</div>'+

                    '<div class="form-group col-md-2">' +
                    '<div>' +
                    '<label for="nombre">Horometro inicial</label>' +
                    '</div>' +
                    '<input type="number" class="form-control mb-2 horomtini horinipost1" name="horometroinicial" id="horometroinicial">' +
                    '</div>' +
                    '<div class="form-group col-md-2">' +
                    '<div>' +
                    '<label for="nombre">Horometro final</label>' +
                    '</div>' +
                    '<input type="number" class="form-control mb-2 horomtfin horfinipost1" name="horometrofinal" id="horometrofinal">' +
                    '</div>' +
                    '<div class="form-group col-md-2">' +
                    '<div>' +
                    '<label for="nombre">Horas activas</label>' +
                    '</div>' +
                    '<input type="number" class="form-control mb-2 hrencen encenpost1" name="horasencendidas" id="horasencendidas">' +
                    '</div>' +
                    '<div class="form-group col-md-2">' +
                    '<div>' +
                    '<label for="nombre">Horas en reposo</label>' +
                    '</div>' +
                    '<input type="number" class="form-control mb-2 hrrep repospost1" name="horasreposo" id="horasreposo">' +
                    '</div>' +

                    '<div class="form-group col-md-4">' +
                    '<div>' +
                    '<label for="subtotal">Precio/hrs total por maquina</label>' +
                    '</div>' +
                    '<input type="text" class="form-control mb-2 subed subpost1" name="subed" id="subedit" disabled>' +
                    '</div>'

                    +
                    '</div>' +
                    '<div id="clonaraqui' + contadorclon + '"> <div>'
                );
                var idmaqmax = $('#modalbodyedit').find('label[name="idmaqrel"]').get();
                var maqgmax = idmaqmax.length;
                for (var t = maqgmax; t > 0; t--) {
                    var modeloname = idmaqmax[t - 1].innerText;
                    modeloname = modeloname.split("//");

                    $('.selmaqui2').prepend("<option value='" + modeloname[0] + "' >" + modeloname[1] + "</option>");
                }
                $('.selmaqui2').html();
                $("#botonProductosedit").click();
                $(".prehr").val(reldata[1]);
                $('.prehr').addClass("prehr_done" + contadorserv);
                $('.prehr').removeClass("prehr");
                $(".nuhr").val(reldata[2]);
                $('.nuhr').addClass("nuhr_done" + contadorserv);
                $('.nuhr').removeClass("nuhr");

                for (var t = 0; t < arraymaquinas.length; t++) {
                    if (reldata[4] == (arraymaquinas[t].split("//"))[0]) {
                        if (arraymaquinas[t].split("//")[1] == null || arraymaquinas[t].split("//")[1] == "") {
                            $(".horomt").val(0);
                        } else {
                            $(".horomt").val(arraymaquinas[t].split("//")[1]);
                        }
                    }
                }
                $('.horomt').addClass("horomt_done" + contadorserv);
                $('.horomt').removeClass("horomt");

                $('.horomtini').addClass("horomtini_done" + contadorserv);
                $('.horomtini').removeClass("horomtini");

                $('.horomtfin').addClass("horomtfin_done" + contadorserv);
                $('.horomtfin').removeClass("horomtfin");

                $('.hrencen').addClass("hrencen_done" + contadorserv);
                $('.hrencen').removeClass("hrencen");

                $('.hrrep').addClass("hrrep_done" + contadorserv);
                $('.hrrep').removeClass("hrrep");

                $(".subed").val(reldata[3]);
                $('.subed').addClass("subed_done" + contadorserv);
                $('.subed').removeClass("subed");

                $('.selmaqui2').val(reldata[4]);
                $('.selmaqui2').addClass("selmaqui2_done" + contadorserv);
                $('.selmaqui2').removeClass("selmaqui2");
            }

        }
    };



    var estado = servicio[4];
    let municipio = servicio[5];
    if (servicio[6] == "" || servicio[6] == null) {
        $('#editrfcsect').hide();
        $('#desdivdacedit').show();
        $("#rfc").prop('disabled', false);
        $("#cfdi").prop('disabled', false);
        $('#hidnewfacturaedi').hide();
    } else {
        $("#rfc").prop('disabled', true);
        $("#cfdi").prop('disabled', true);
        $("#nuevafacturaedit").hide();
        $('#editrfcsect').show();
        $('#desdivdacedit').hide();
        $('#hidnewfacturaedi').hide();
    }

    $("#nombrecliente").val(servicio[10]);
    $("#fecha_realizacion").val(servicio[2]);
    $('#operadoreditserv').val(servicio[11]);
    $("#direccion").val(servicio[3]);
    $("#estadoserv").val(estado);
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
        data: { municipios: estado },
    }).done(function(data) {
        $("#municipioeditserv").html(data);
        $("#municipioeditserv").val(municipio);
    });
    $("#rfc").val(servicio[6]);
    $("#cfdi").val(servicio[7]);
    $("#rfchidden").val(servicio[6]);
    $("#cfdihidden").val(servicio[7]);
    $("#monto").val(servicio[8]);
    if (servicio[9] == "activo") {
        $("#estatuseditservicio").prop("checked", false);
    } else if (servicio[9] == "inactivo") {
        $("#estatuseditservicio").prop("checked", true);
    } else {
        $('#divrazones').removeAttr('hidden');
        $('#estatuseditsercacelado').prop("checked", true);
        $("#estatusfirst").hide();
    }
    $("#id_serviciohidden").val(servicio[0]);
    $("#vendedorselsered").val(parseInt(servicio[12]));
    
    $("#modeditservicios").modal("show");
}

$(document).ready(function() {
    $('#modeditservicios').on('hidden.bs.modal', function(e) {
        $('.dead').remove();
    });

    $('#estatuseditsercacelado').on('click', function() {
        if ($('#estatuseditsercacelado').is(':checked')) {
            $("#estatusfirst").hide();
            $('#divrazones').removeAttr('hidden');
            $('#divrazones').show()
        } else {
            $("#estatusfirst").show();
            $('#divrazones').hide();
        }
    });

    $("#modeditservicios").mousemove(function(event) {
        calcValor();
    });

    $('#desdivdacedit').on('click', function() {
        $('#editrfcsect').show();
        $('#desdivdacedit').hide();
        $('#hidnewfacturaedi').hide();
        $('#nuevafacturaedit').show();
    });

    $('#nuevafacturaedit').on('click', function() {
        $('#editrfcsect').hide();
        $('#desdivdacedit').hide();
        $('#hidnewfacturaedi').show();
    });
});

function saveeverything(e) {
    e.preventDefault();
    document.getElementById("bttnsavedserv").disabled = true;
    var relacioned;
    var precioed;
    var numed;
    var subed;
    var maqed;
    var horometro = 0;
    var horini;
    var horfin;
    var horas_encendido;
    var horas_reposo;
    var ajcont = 1;
    var exitaj = 0;
    var nosave = 0;
    var ajconttemp = 0;

    do {
        relacioned = $('#serviciosgetid' + ajcont).text();
        var servicioid = $('#id_serviciohidden').val();
        if ($('#serviciosgetid' + ajcont).length > 0) {
            var idrelcomp = (($('#serviciosgetid' + ajcont)[0].innerText).split("//"))[0];
        } else {
            var idrelcomp = 0;
        }
        if (servicioid == idrelcomp) {
            ajconttemp = ajcont;
            relacioned = relacioned.split("//");
            relacionedtouse = relacioned[5];
            precioed = $(".prehr_done" + ajcont).val();
            numed = $(".nuhr_done" + ajcont).val();
            subed = $(".subed_done" + ajcont).val();
            maqed = $(".selmaqui2_done" + ajcont).val();

            if(($(".horomtini_done"+ajcont).val()).length > 0 || ($(".horomtfin_done"+ajcont).val()).length > 0 || ($(".hrencen_done"+ajcont).val()).length > 0 || ($(".hrrep_done"+ajcont).val()).length > 0){
                if(($(".horomtini_done"+ajcont).val()).length < 1 || ($(".horomtfin_done"+ajcont).val()).length < 1 || ($(".hrencen_done"+ajcont).val()).length < 1 || ($(".hrrep_done"+ajcont).val()).length < 1){
                    exitaj++;
                    nosave++;
                }else{
                    horini = parseFloat($(".horomtini_done"+ajcont).val());
                    horometro = parseFloat($(".horomtfin_done" + ajcont).val());
                    horas_encendido = parseFloat($(".hrencen_done" + ajcont).val());
                    horas_reposo = parseFloat($(".hrrep_done" + ajcont).val());
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
                        data: {
                            identificador: 3,
                            id_relacion: relacionedtouse,
                            id_maquina: maqed,
                            precio_hr: precioed,
                            num_hr: numed,
                            horometro: horometro,
                            valor: subed
                        },
                        beforeSend: function() {
                            document.getElementById("bttnsavedserv").disabled = true;
                        },
                        error: (err) => {
                            document.getElementById("bttnsavedserv").disabled = false;
                            console.error(err);
                        },
                    })
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });

                    $.ajax({
                        type: "POST",
                        url: "/Logs",
                        data: {
                            id_relacion: relacionedtouse,
                            horometro_inicial: horini,
                            horas_encendido: horas_encendido,
                            horas_reposo: horas_reposo,
                            horometro: horometro,
                            valor: horas_reposo+horas_encendido
                        },
                        error: (err) => {
                            document.getElementById("bttnsavedserv").disabled = false;
                            console.error(err);
                        },
                    })
                
                    ajcont++;
                }
            }else{
                horometro = parseFloat($(".horomt_done" + ajcont).val());
                
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
                    data: {
                        identificador: 2,
                        id_relacion: relacionedtouse,
                        id_maquina: maqed,
                        precio_hr: precioed,
                        num_hr: numed,
                        horometro: horometro,
                        valor: subed
                    },
                    error: (err) => {
                        document.getElementById("bttnsavedserv").disabled = false;
                        console.error(err);
                    },
                });
                ajcont++;
            }

            
        } else {
            if ((maximarelacion + 1) == ajcont) {
                exitaj++;
            } else {
                ajcont++;
            }
        }
    } while (exitaj == 0);
    if(nosave == 0){
        $('#formsubmitedit').submit();
    }else{
        if($('.horomtini_done'+ajcont).val() < 1){
            $('.horomtini_done'+ajcont).focus();
        }else if($(".horomtfin_done"+ajcont).val() < 1){
            $(".horomtfin_done"+ajcont).focus();
        }else if($(".hrencen_done"+ajcont).val() < 1){
            $(".hrencen_done"+ajcont).focus();
        }else{
            $(".hrrep_done"+ajcont).focus()
        }
        alert("LLene todos los campos correspondientes a los servicios de cada maquina");
    }
    
}



function calcValor() {
    var promesaventashow = 0;
    var contador = 0;
    var idmaqmax = $('#modalbodyedit').find('label[name="idsrel"]').get();
    var maqgmax = idmaqmax.length;
    var limite = ((idmaqmax[maqgmax - 1].innerText).split("//"))[5];
    do {
        if ($(".prehr_done" + contador).length > 0 && $(".nuhr_done" + contador).length > 0) {
            var precio = $(".prehr_done" + contador).val();
            var horas = $(".nuhr_done" + contador).val();
            var valor = precio * horas;
            $(".subed_done" + contador).val(valor);
            promesaventashow = promesaventashow + valor;
            contador++;
        } else {
            contador++;
        }
    } while (contador <= limite);
    $('input[name="monto"]').val(promesaventashow);
    $('input[name="montohidden"]').val(promesaventashow);
}