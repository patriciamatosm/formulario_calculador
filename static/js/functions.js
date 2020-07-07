$(document).ready(function () {
    $('#form_calc').modal('show');
});

function fichero() {
    var filename = document.getElementById("inputGroupFile01").value;
    if (filename.substring(3,11) == 'fakepath') {
        filename = filename.substring(12);
    }
    document.getElementById("choose-file").innerHTML = filename;
}