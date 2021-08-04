
$(document).ready(function () {

    $("#zip_code").mask("00000-000");
    $("#number").mask("0000", { reverse: true });
    $("#release_year").mask("0000", { reverse: true });
    $("#cpf").mask('000.000.000-00', { reverse: true });
    $("#rg").mask('00.000.000', { reverse: true });
    $("#titration").mask('0000-0000-00-00', { reverse: true });

});