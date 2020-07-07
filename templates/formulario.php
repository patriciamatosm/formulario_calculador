<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculador </title>


    <link href="../static/css/styles.css" rel="stylesheet">

    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">

    <script crossorigin="anonymous"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script crossorigin="anonymous"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script src="../static/js/functions.js"></script>
    <?php
    $host = 'localhost';
    $db = 'prueba_patri';
    $user = 'root';
    $password = "Pm15081999";
    $charset = 'utf8mb4';

    $connection = "mysql:host=" . $host . ";dbname=" . $db . ";charset=" . $charset;
    $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($connection, $user, $password, $options);

    $sql = $pdo->prepare('SELECT DISTINCT V_NOMBRETABLA FROM mae_curva_libre_riesgos');
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
                    <div class="form-group row">
                        <div class="offset-5 col-xs-6">
                            <div class="form-group">
                                <label for="proc" id="n_proceso"> Número de proceso </label>
                                <input class="form-control" disabled id="proc" name="proceso" type="password">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">

                        <!-- EXCEL -->
                        <div class="offset-1 col-md-4">
                            <div class="form-group">
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
                        <div class="offset-3 col-md-4">
                            <div class="form-group">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                            type="button">
                                        Nombre de la tabla
                                    </button>
                                    <div class="dropdown-menu">
                                        <?php
                                        $sql->execute();
                                        $data = $sql->fetchAll();
                                        foreach ($data as $row) {
                                            echo '<a class="dropdown-item" href="#">' . $row['V_NOMBRETABLA'] . '</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="form-group row">
                        <label for="pwd" id="tit_pwd">
                            <span class="glyphicon glyphicon-eye-close"></span> Contraseña</label>
                        <input class="form-control" id="pwd" name="password" type="password">
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-success btn-block" type="submit"> Login</button>
                    </div>
                </form>
            </div>

            <!-- footer -->
            <div class="modal-footer">
                <div class="container-fluid" id="sinCuenta">
                    <p> No tienes cuenta?
                        <a data-dismiss="modal" data-target="#registrar" data-toggle="modal" href="#" id="link1">
                            Registrate</a></p>
                    <button class="btn btn-default btn-cerrar" data-dismiss="modal"
                            style="background: red; color: white"
                            type="button">
                        Cerrar
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>
</body>
</html>