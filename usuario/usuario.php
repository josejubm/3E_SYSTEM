<?php

function CategoriaAgregar($datos = []){
    global $connection;
    $response=[
        "STATUS" => "0",
        "MESSAGE" => ""
    ];
    if(empty($datos))
    {
        $response["MESSAGE"]="lOS DATOS SE ENCUENTRAN VACIOS";
        $response["STATUS"]="ERROR";

        return $response;


    }
    $query = "INSERT INTO categoria ( id, nombre) VALUES ( null, ? );";

    //$connection->prepare($query);

    $nombre = $datos["nombre"];

    $prepare = $connection->prepare($query);
    $prepare->bind_param("s",$nombre);
    $prepare->execute();

    $insert_id = $prepare->insert_id;
    $response["MESSAGE"]="lOS DATOS HAN SIDO AGREGADOS CORRECTAMENTE";
    $response["STATUS"]="OK";
    $response["id"]=$insert_id;


    return $response;
}
