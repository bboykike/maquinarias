$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "procesar-estados.php",
        data: { estados: "Mexico" },
    }).done(function(data) {
        $("#addestadocliente").html(data);
    });
    // Obtener municipios
    $("#addestadocliente").change(function() {
        var estado = $("#addestadocliente option:selected").val();
        $.ajax({
            type: "POST",
            url: "procesar-estados.php",
            data: { municipios: estado },
        }).done(function(data) {
            $("#addmunicipiocliente").html(data);
        });
    });
    $("#estadocliente").change(function() {
        var estado = $("#estadocliente option:selected").val();
        $.ajax({
            type: "POST",
            url: "procesar-estados.php",
            data: { municipios: estado },
        }).done(function(data) {
            $("#municipiocliente").html(data);
        });
    });
});