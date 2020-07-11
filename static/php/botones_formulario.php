<?php


if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'rodar':
            rodar($_POST['bbdd_excel'], $_POST['curva_tipos'], $_POST['cump_fijo'], $_POST['usuario_conectado']);
            break;
        case 'generar':
            generar($_POST['bbdd_excel'], $_POST['curva_tipos'], $_POST['cump_fijo'], $_POST['usuario_conectado']);
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
function rodar($bbdd_excel, $curva_tipos, $cump_fijo, $usuario_conectado){
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

    //insertar sql
    $sql = $pdo->prepare('insert into a (number) values (101);');

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
function generar($bbdd_excel, $curva_tipos, $cump_fijo, $usuario_conectado){
    $pdo = new Database();

    //insertar sql
    $sql = $pdo->connect()->prepare('insert into a (number) values (102);');

    //insertar sql

    $sql->execute();
    $data = $sql->fetchAll();
    return true;
}
