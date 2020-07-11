<?php

include 'db.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $bbdd_excel = $_POST['bbdd_excel'];
    $curva_tipos = $_POST['curva_tipos'];
    $cump_fijo = $_POST['cump_fijo'];
    $usuario_conectado = $_POST['usuario_conectado'];
    switch ($action) {
        case 'rodar':
            rodar($bbdd_excel, $curva_tipos, $cump_fijo, $usuario_conectado);
            break;
        case 'generar':
            generar($bbdd_excel, $curva_tipos, $cump_fijo, $usuario_conectado);
            break;
        default:
            die('not a function');

    }
}


/**
 * Funcion que se ejecuta desde la llamada ajax del boton rodar
 * @param $bbdd_excel excel a subir
 * @param $curva_tipos curva de tipos seleccionada
 * @param $cump_fijo valor del cumplimiento fijo
 * @param $usuario_conectado usuario de la sesion
 * @return bool true/false dependiendo del exito
 */
function rodar($bbdd_excel, $curva_tipos, $cump_fijo, $usuario_conectado)
{
    $pdo = new Database();

    //insertar sql
    $sql = $pdo->connect()->prepare('insert into a (number) values (120);');

    $sql->execute();
    $data = $sql->fetchAll();

    return true;
}

/**
 * Funcion que se ejecuta desde la llamada ajax del boton generar
 * @param $bbdd_excel excel a subir
 * @param $curva_tipos curva de tipos seleccionada
 * @param $cump_fijo valor del cumplimiento fijo
 * @param $usuario_conectado usuario de la sesion
 * @return bool true/false dependiendo del exito
 */
function generar($bbdd_excel, $curva_tipos, $cump_fijo, $usuario_conectado)
{
    $pdo = new Database();

    //insertar sql
    $sql = $pdo->connect()->prepare('insert into a (number) values (100);');


    $sql->execute();
    $data = $sql->fetchAll();
    return true;
}
