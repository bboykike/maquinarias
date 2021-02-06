function showVendedor(o) {
    let vendedor = o.split("||");
    $("#nombrevened").val(vendedor[1]+" "+vendedor[2]);
    $("#id_vendedor").val(vendedor[0]);
    if (vendedor[3] == 'activo') {
        $("#estatusvendedored").prop("checked", true);
    }
    $("#edivendedores").modal("show");
}