<?php
function  Logear($user, $password)
{
    global $conn;

    $statement = $conn->prepare("SELECT * FROM usuario WHERE usuario = :usuario LIMIT 1");
    $statement->bindParam(":usuario", $user);
    $statement->execute();

    $datos = $statement->fetch(PDO::FETCH_ASSOC);

    if ($statement->rowCount() == 0) {
        return [
            'MENSAJE' => "Correo o contraseña inválidos",
            'STATUS' => "ERROR"
        ];
    } else {

        if (!password_verify($password, $datos['contrasena'])) {
            return [
                'MENSAJE' => "Correo o contraseña inválidos",
                'STATUS' => "ERROR"
            ];
        } else {
            return [
                'MENSAJE' => "Usuario Logeado",
                'STATUS' => "OK",
                'USER' => $datos['usuario'],
                'FOTO' => $datos['foto'],
                'TIPO' => $datos['tipo'],
                'ID' => $datos['id']
            ];
        }
    }
}


function LogOut($status)
{
    if ($status == 0) {
        return [
            'MENSAJE' => "ADIOS",
            'STATUS' => "OK"
        ];
    } else {
        return [
            'MENSAJE' => "ADIOS",
            'STATUS' => "ERROR"
        ];
    }
}
