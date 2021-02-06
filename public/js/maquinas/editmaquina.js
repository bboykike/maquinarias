function showMaquina(o) {
    let maquina = o.split("||");
    console.log(maquina)
    console.log(maquina[0], "|");
    $("#modelo").val(maquina[1]);
    $("#horometro_edit").val(maquina[2]);
    $("#tipo_edit").val(maquina[3]);
    $("#anio_edit").val(maquina[4]);
    $("#id_maquina").val(maquina[0]);
    if (maquina[5] == "activo") {
        $("#estatusmaquina").prop("checked", true);
    }
    $("#edimaquinas").modal("show");
}