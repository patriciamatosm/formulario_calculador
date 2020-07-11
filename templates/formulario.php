<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculador </title>
    <?php require_once(dirname( __DIR__ )."/templates/ver_contenido_tabla.php");?>
    <?php require_once (dirname( __DIR__ ).'/static/php/db.php'); ?>

    <link href="../static/css/styles.css" rel="stylesheet">

    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script crossorigin="anonymous"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script crossorigin="anonymous"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script src="../static/js/functions.js"></script>


    <?php
    //insertar sql
    $pdo = new Database();

    $sql = $pdo->connect()->prepare('SELECT DISTINCT V_NOMBRETABLA FROM mae_curva_libre_riesgos');
    ?>


</head>
<body>
<h1> Formulario de prueba </h1>

<!-- Modal de prueba -->
<div class="modal fade" id="form_calc" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- header -->
            <div class="modal-header" id="sesion">
                <h4 class="modal-title text-center" id="tituloIniciar">Titulo</h4>
            </div>

            <!-- body -->
            <div class="modal-body iniciar-sesion">
                <form action="" id="form_c" method="post">

                    <!-- N PROC -->
                    <!-- 1 row -->
                    <div class="form-group row">
                        <div class="offset-5 col-xs-6">
                            <div class="form-group">
                                <label for="proc" id="n_proceso"> Número de proceso </label>
                                <input class="form-control" disabled id="proc" name="proceso" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- 2 row -->
                    <div class="form-group row">

                        <!-- EXCEL -->
                        <div class="offset-1 col-md-4">
                            <div class="form-group text-center">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">BBDD</span>
                                    </div>
                                    <div class="custom-file">
                                        <input accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                               aria-describedby="inputGroupFileAddon01" class="custom-file-input"
                                               id="inputGroupFile01"
                                               onchange="fichero()" type="file">
                                        <label class="custom-file-label" for="inputGroupFile01" id="choose-file">
                                            Choose file</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- CURVA DE TIPOS -->
                        <div class="offset-1 col-md-6">
                            <div class="form-group text-center">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                            type="button" id="nombre-tabla" aria-haspopup="true" aria-expanded="false">
                                        Nombre de la tabla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="nombre-tabla">
                                        <?php
                                        $sql->execute();
                                        $data = $sql->fetchAll();
                                        foreach ($data as $row) {
                                            echo '<a class="dropdown-item" href="#">' . $row['V_NOMBRETABLA'] . '</a>';
                                        }
                                        ?>
                                    </div>

                                    <button type="button" class="btn btn-info btn-sm" id="ver" name="ver-btn">Ver
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- 3 row -->
                    <div class="form-group row">

                        <!-- CUMPLIMIENTO FIJO -->
                        <div class="col-md-4">
                            <div class="form-group text-center">
                                <label for="fijo" id="c_fijo"> Cumplimiento fijo </label>
                                <input class="form-control" id="fijo" type="text">
                            </div>
                        </div>

                        <!-- USUARIO CONECTADO -->
                        <div class="col-md-4">
                            <div class="form-group text-center">
                                <label for="user" id="u_conectado"> Usuario conectado </label>
                                <input class="form-control" id="user" type="text">
                            </div>
                        </div>

                        <!-- CAMPO OBLIGATORIO -->
                        <div class="col-md-4">
                            <div class="form-group text-center">
                                <label for="obl" id="obligatorio"> Campo obligatorio </label> <label style="color: red">
                                    * </label>
                                <input class="form-control" id="obl" type="text" required>
                            </div>
                        </div>
                    </div>


                </form>
            </div>

            <!-- footer -->
            <div class="modal-footer">
                <div class="container-fluid" id="botones-finalizar">
                    <div class="form-group row">
                        <div class="offset-5 col-xs-6">
                            <button type="button" class="btn btn-danger btn-lg" id="rodar">Rodar</button>
                            <button type="button" class="btn btn-success btn-lg" id="generar">Generar</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</body>
</html>