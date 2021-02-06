function uploadData(c) {
    let cliente = c.split("||");
    // Variables
    let id_cliente = cliente[0];
    let nombre = cliente[1];
    let apellido = cliente[2];
    let telefono = cliente[3];
    let correo = cliente[4];
    let estado = cliente[5];
    let municipio = cliente[6];
    let direccion = cliente[7];
    let estatus = cliente[8];

    $("#estadocliente").val(estado);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#telefono").val(telefono);
    $("#correo").val(correo);
    $("#direccioncliente").val(direccion);
    $("#id_cliente").val(id_cliente);
    if (cliente[8] == "activo") {
        $("#estatuscliente").prop("checked", true);
    }
    $.ajax({
        type: "POST",
        url: "procesar-estados.php",
        data: { municipios: estado },
    }).done(function (data) {
        $("#municipiocliente").html(data);
        $("#municipiocliente").val(municipio);
    });
    $("#up_cliente").modal("show");
}
