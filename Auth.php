<?php
require_once('libraries/connection.php');
require_once('libraries/funciones.php');
require_once('libraries/Auth/Auth.php');

switch ($_POST["action"]) {
    case "login":
        //LOGIN
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["user"]) || empty($_POST["password"])) {
                $resultado = [
                    'MENSAJE' => "Completa los campos",
                    'STATUS' => "ERROR"
                ];
                include("Login.php");
            } else {
                $use_name = $_POST['user'];
                $password = $_POST['password'];

                $resultado = Logear($use_name, $password);

                if ($resultado['STATUS'] == 'OK') {
                    setcookie("LOG", 1, time() + 3600, '/');
                    setcookie("USER", $resultado['USER'], time() + 3600, '/');
                    setcookie("FOTO", $resultado['FOTO'], time() + 3600, '/');
                    setcookie("TIPO", $resultado['TIPO'], time() + 3600, '/');

                    header("Location: Escritorio.php");
                } else {
                    //header("Location: Login.php");
                    include("Login.php");
                }
            }
        }
        break;
    case "logout":
        //LOGOUT
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["salir"]) || empty($_POST["action"])) {
                $resultado = [
                    'MENSAJE' => "Completa los campos",
                    'STATUS' => "ERROR"
                ];
                print_r($resultado['STATUS']);
            } elseif ($_POST["salir"] == "salir") {
                setcookie("LOG", 1, time() - 3600, '/');
                setcookie("USER", $resultado['USER'], time() - 3600, '/');

                header("Location: Escritorio.php");
            }
        }
        break;
    default;

        break;
}
