<?php
function CargarPagina($file = "template/template.php")
{
    ob_start();
    require_once($file);

    $template_string = ob_get_clean();
    return $template_string;
}

function CargarImgen($file = [], $ruta = "rutaGuardar/Imagenes/", $id = 0)
{
    global $connection;
    ob_start();
    if ($id != 0) {
        $rutaFoto = $connection->query("SELECT foto from usuario WHERE id = '$id';");
        $resultado = $rutaFoto->fetch_all(MYSQLI_ASSOC);
    }

    $nombre = date('YmdHis') . $file['name'];
    print $resultado[0]['foto'];
    if (isset($nombre) && $nombre != "") {
        $tipo = $file['type'];
        $tamano = $file['size'];
        $temp = $file['tmp_name'];
        $error = $file['error'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            return [
                "STATUS" => "ERROR",
                "MENSAJE" => "NO ES EL FORMATO CORRECTO",
                "ERROR" => $error
            ];
        } else {
            $subirImagen = move_uploaded_file($temp, $ruta . $nombre);
            if ($subirImagen) {
                chmod($ruta . $nombre, 0777);
                unlink($resultado[0]['foto']);
            } else {
                return [
                    "STATUS" => "ERROR",
                    "MENSAJE" => "NO SE GUARDO EN EL SERVIDOR",
                    "ERROR" => $error
                ];
            }
            return [
                "STATUS" => "OK",
                "MENSAJE" => "SE GURARDO CORRECTAMENTE EN EL SERVIDOR",
                "NOMBRE" => $nombre,
                "TIPO" => $tipo,
                "TAMAÑO" => $tamano,
                "RUTA" => $ruta . $nombre
            ];
        }
    }
}

function eliminarFoto ($id = 0 ){
    global $connection;
    ob_start();
    if ($id != 0) {
        $rutaFoto = $connection->query("SELECT foto from usuario WHERE id = '$id';");
        $resultado = $rutaFoto->fetch_all(MYSQLI_ASSOC);

        unlink($resultado[0]['foto']);

        return [
            "STATUS" => "OK",
            "MENSAJE" => "FORO BORRADA CON EXITO",
        ];

    }else {
        return [
            "STATUS" => "ERROR",
            "MENSAJE" => "NO SE ELIMINO LA FOTO",
        ];
    }
}

/**
 * @param array $data
 * @param array $etiquetas
 * @param string $template
 * @param string $dir
 * @param string $name
 * @return string
 */

function generaReporte(
    array  $data,
    array  $etiquetas,
    string  $template,
    string $dir = "temporal/",
    string $name = "report"
): string {
    /**
     * Si el nombre no gue enviado se adjunta como string la fecha actual y la hr para hacer único el nombre del archivo,
     */
    if ($name == "report") {
        $name .= date('YmdHis');
    }
    /**
     * Se obtiene como string el contenido del archivo $template
     */
    $html = file_get_contents($template);

    /**
     * Se recorre cada index de data para cambiarlo por su etiqueta correspondiente
     */
    for ($i = 0; $i < count($data); $i++) {
        $html = str_replace($etiquetas[$i], $data[$i], $html);
    }

    /**
     * Se guarda el archivo HTML temporal que ejecutara wkhtmltopdf
     */
    file_put_contents("temporal/" . $name . ".html", $html);

    /**
     * Se define el lugar del binario de wkhtmltopdf:
     * Si se tiene en la variable de entorno PATH se puede mandar a llamar de manera directa
     * Si no, se tiene que cargar desde la dirección de donde está el binario
     */
    //$bin = "wkhtmltopdf";
    $bin = "/usr/bin/wkhtmltopdf";

    /**
     * Se genera el comando a ejecutar
     * Para más parámetros de configuración checar la documentación de wkhtmltopdf
     */
    //$cmd = "$bin -s Letter --enable-local-file-access temporal/$name.html $dir$name.pdf";

    /**
     * En caso de windows la dirección del html como del pdf a generar debe estar en comillas dobles (").
     */
    print $cmd = $bin . ' -s Letter --enable-local-file-access ' . $dir . $name . '.html ' . $dir . $name . '.pdf';
    // $cmd = "$bin -s Letter --enable-local-file-access \"$dir$name\" \"$dir$namePDF\"";
    $cmd2 = "wkhtmltopdf -s Letter --enable-local-file-access " . $dir . $name . ".html " . $dir . $name . ".pdf";

    /**
     * Se manda a ejecutar el comando previamente generado a la terminal del SO.
     * El proceso es síncrono, lo que significa que va a esperar el resultado de la ejecución del comando
     */

    print exec($cmd);
    exit();
    //$resu = shell_exec('php exec(./script.sh)');
    //print $resu;


    /**
     * Borramos el archivo temporal html para no generar basura
     */
    //unlink("temporal/$name.html");

    /**
     * Retornamos la dirección de donde fue guardado el PDF resultante
     */
    return $dir . $name . ".pdf";
}
