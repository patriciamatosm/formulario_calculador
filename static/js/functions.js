$(document).ready(function () {
    var name;
    $('#form_calc').modal('show');



    $('#ver').click(function () {
        $('#form_calc').modal('hide');
        $('#ver_columnas').modal('show');
    });

    $('.dropdown-menu a').on('click', function(){
        name = $(this).text();
        $('#nombre-tabla').text(name);
    });



});

function fichero() {
    var filename = document.getElementById("inputGroupFile01").value;
    if (filename.substring(3,11) == 'fakepath') {
        filename = filename.substring(12);
    }
    document.getElementById("choose-file").innerHTML = filename;
}