function showoperador(o) {
    let operador = o.split("||");
    let estado = operador[6];
    let municipio = operador[7];
    $("#estadooperador").val(estado);
    $("#direoperador").val(operador[5]);
    $("#correooperador").val(operador[4]);
    $("#telefonooperador").val(operador[3]);
    $("#apellidooperador").val(operador[2]);
    $("#nombreoperador").val(operador[1]);
    $("#id_operador").val(operador[0]);
    $("#fecha_contrato").val(operador[9]);
    $("#num_imss").val(operador[10]);
    $("#tipo_sangre").val(operador[11]);
    $("#fecha_nacimiento").val(operador[12]);
    if (operador[8] == "activo") {
        $("#estatusoperadorr").prop("checked", true);
    }
    $.ajax({
        type: "POST",
        url: "procesar-estados.php",
        data: { municipios: estado },
    }).done(function (data) {
        $("#municipiooperador").html(data);
        $("#municipiooperador").val(municipio);
    });
    $("#modeditoperadores").modal("show");
}
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "procesar-estados.php",
        data: { estados: "Mexico" },
    }).done(function (data) {
        $("#jmr_contacto_estadooperador").html(data);
    });
    // Obtener municipios
    $("#jmr_contacto_estadooperador").change(function () {
        var estado = $("#jmr_contacto_estadooperador option:selected").val();
        $.ajax({
            type: "POST",
            url: "procesar-estados.php",
            data: { municipios: estado },
        }).done(function (data) {
            $("#jmr_contacto_municipiooperador").html(data);
        });
    });
    $("#estadooperador").change(function () {
        var estado = $("#estadooperador option:selected").val();
        $.ajax({
            type: "POST",
            url: "procesar-estados.php",
            data: { municipios: estado },
        }).done(function (data) {
            $("#municipiooperador").html(data);
        });
    });
});
