$(document).ready(function () {
    var name;
    var usuario_conectado, curva_tipos, cump_fijo, bbdd_excel;
    var r_text;

    /**
     * Mostrar modal
     */
    $('#form_calc').modal('show');

    /**
     * Boton ver de curva de tipos
     */
    $('#ver').click(function () {
        $('#form_calc').modal('hide');
        $('#ver_columnas').modal('show');
    });


    /**
     * mostrar nombre del valor seleccionado
     */
    $('.dropdown-menu a').on('click', function () {
        name = $(this).text();
        $('#nombre-tabla').text(name);
        $('#tituloModalVer').text(name);

    });

    /**
     * Boton rodar
     */
    $('#rodar').click(function () {

        //--->Aqui deberia haber una validacion de los datos
        //recolectamos datos
        if(recolectar_datos()){
            //--->Hacemos peticion para procesar

            $.ajax({
                url: "../static/php/botones_formulario.php",
                data: {
                    bbdd_excel: bbdd_excel,
                    curva_tipos: curva_tipos,
                    cump_fijo: cump_fijo,
                    usuario_conectado: usuario_conectado,
                    action: 'rodar'
                },
                type: 'POST'
            }).fail(function () {
                alert("ERRORRRRR");
                }
            );

            alert("Response: " + r_text);
        }
    });

    /**
     * Boton generar
     */
    $('#generar').click(function () {

        //--->Aqui deberia haber una validacion de los datos

        //recolectamos datos
        if(recolectar_datos()){
            //--->Hacemos peticion para procesar

            $.ajax({
                url: "../static/php/botones_formulario.php",
                data: {
                    bbdd_excel: bbdd_excel,
                    curva_tipos: curva_tipos,
                    cump_fijo: cump_fijo,
                    usuario_conectado: usuario_conectado,
                    action: 'generar'
                },
                success: function (data) {
                    alert("might have worked generar: " + data);
                }
            });
        }
    });

});

/**
 * Funcion que escribe el nombre del fichero seleccionado
 */
function fichero() {
    var filename = document.getElementById("inputGroupFile01").value;
    if (filename.substring(3, 11) == 'fakepath') {
        filename = filename.substring(12);
    }
    document.getElementById("choose-file").innerHTML = filename;
}

/**
 * Funcion que devuelven los datos del formulario recolectados
 * @returns {boolean} true/false dependiendo del exito
 */
function recolectar_datos() {
    //- Nro de proceso se asigna solo

    //- BBDD
    //PROCESAR EXCEL Y SUBIRLO A UNA TABLA.
    bbdd_excel = $('#choose-file').text();

    //- Curva de tipos
    curva_tipos = name;

    //- Cumplimiento fijo
    cump_fijo = document.getElementById("fijo").value;

    //- Usuario conectado (sesion)
    usuario_conectado = document.getElementById("user").value;


    return true;
}