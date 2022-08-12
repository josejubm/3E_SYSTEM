<?php
require_once('libraries/Auth/Security.php');
require_once('libraries/connection.php');
require_once('libraries/funciones.php');
require_once('usuario/usuario.php');

$styles = CargarPagina('template/TemplateStyles.php');
$myStyles = "";
$sidebar = CargarPagina('template/TemplateSidebar.php');
$breadcrumb = CargarPagina('template/TemplateBreadcrumb.php');
$header = CargarPagina('template/TemplateHeader.php');
$footer = CargarPagina('template/TemplateFooter.php');
$scripts = CargarPagina('template/TemplateScripts.php');
$myScripts = "";
$template = CargarPagina('template/Template.php');
$templatebread = CargarPagina('template/TemplateBread.php');
$template1 = CargarPagina('template/Template1.php');

$Search = [
    '<!--STYLES-->',
    '<!--MY STYLES-->',
    '<!--SIDEBAR-->',
    '<!--HEADER-->',
];

$Replace = [
    $styles,
    $myStyles,
    $sidebar,
    $header,
];

$template = str_replace($Search, $Replace, $template);
print $template;

switch ($_GET["action"]) {
    case "leer";


        $bread = str_replace('<!--BREADCRUMB-->', $breadcrumb, $templatebread);
        print $bread;

        print_r($pages);

        include('usuario/usuarioVistaLeer.php');
        break;
    case "table":
        $template = str_replace("<!--TITLE-->", "Tabla Usuarios", $template);

        include('usuario/usuarioVistaTable.php');
        break;
    case "agregar":
        $template = str_replace("<!--TITLE-->", "Crear Usuario", $template);
        include('usuario/usuarioVistaCrear.php');
        break;
    case "registrar":
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['email'];
        $contrasena = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $fechaRegistro = date('Y-m-d h:i:s');
        $estado = $_POST['estado'];
        $tipo = $_POST['tipo'];
        $permisoVer = $_POST['permisoVer'];
        $permisoCrear = $_POST['permisoCrear'];
        $permisoEliminar = $_POST['permisoEliminar'];

        $ruta = "imagesUser/";
        $resultado = CargarImgen($_FILES['foto'], $ruta);
        $imagen = $resultado['RUTA'];

        $query = "INSERT INTO usuario (nombreCompleto, usuario, correo, contrasena, fechaRegistro, estado, tipo, foto, permisoVer, permisoCrear, PermisoEliminar) 
                  VALUES ('$nombre', '$usuario', '$correo', '$contrasena', '$fechaRegistro', '$estado', '$tipo', '$imagen', '$permisoVer', '$permisoCrear', '$permisoEliminar');";
        if ($insertar = $connection->query($query)) {
            $alert["flash"] = ["message" => "Usuario {$nombre} Agregado.", "type" => "alert-success"];
        } else {
            $alert["flash"] = ["message" => "Usuario {$nombre} No se Agrego .", "type" => "alert-danger"];
        }
        include('usuario/usuarioVistaLeer.php');
        break;
    case "actualizar":
        $template = str_replace("<!--TITLE-->", "Actualizar Usuario", $template);

        include('usuario/usuarioVistaActualizar.php');
        break;
    case "actualizando":
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['email'];
        $estado = $_POST['estado'];
        $tipo = $_POST['tipo'];
        $permisoVer = $_POST['permisoVer'];
        $permisoCrear = $_POST['permisoCrear'];
        $permisoEliminar = $_POST['permisoEliminar'];

        if ($_POST['checkImage'] == "simon") {
            $foto = $_POST['fotoAnterior'];
            //$resultado = eliminarFoto($id);
        } else {
            if (isset($_FILES['fotoactu']) && $_FILES['fotoactu']['name'] == "" && $_POST['checkImage'] == "") {
                $foto = "";
                $resultado = eliminarFoto($id);
            } else {
                $ruta = "imagesUser/";
                $resultado = CargarImgen($_FILES['fotoactu'], $ruta, $id);
                $foto = $resultado['RUTA'];
            }
        }

        $query = "UPDATE usuario SET nombreCompleto = '$nombre', usuario = '$usuario', correo = '$correo', estado = '$estado', tipo = '$tipo', foto = '$foto', permisoVer = '$permisoVer',  permisoCrear = '$permisoCrear', permisoEliminar = '$permisoEliminar' WHERE id = $id;";
        if ($update = $connection->query($query)) {
            $alert["flash"] = ["message" => "Usuario {$nombre} Actualizado.", "type" => "alert-warning"];
        } else {
            $alert["flash"] = ["message" => "Usuario {$nombre} No se Actualizo .", "type" => "alert-danger"];
        }
        include('usuario/usuarioVistaLeer.php');
        break;
    case "borrar":
        $id = $_GET["id"];
        $nombre = $_GET["nombre"];

        $resultado = eliminarFoto($id);

        if ($resultado['STATUS'] == "OK") {
            $query = "DELETE FROM usuario WHERE id = $id";
            $eliminar = $connection->query($query);
        }

        $alert["flash"] = ["message" => "Usuario {$nombre} Eliminado .", "type" => "alert-danger"];
        include('usuario/usuarioVistaLeer.php');
        break;
    case "reporte":
        $datos = [];

        $datos[0] = '<th scope="col"> ID </th>';
        $datos[1] = '<th scope="col"> NOMBRE </th>';
        $datos[2] = '<th scope="col"> FECHA LOGIN </th>';

        $etiqueta = [];
        $etiqueta[0] = "<!--TH1-->";
        $etiqueta[1] = "<!--TH2-->";
        $etiqueta[2] = "<!--TH3-->";

        $etiqueta[3] = "<!--TD1-->";
        $etiqueta[4] = "<!--TD2-->";
        $etiqueta[5] = "<!--TD3-->";

        $resultados = $connection->query("SELECT usuario.id, nombreCompleto, usuario, tipo, reportelog.fechaLogin 
        FROM usuario INNER JOIN reportelog 
        ON usuario.id = reportelog.idUser;");
        $resultado = $resultados->fetch_all(MYSQLI_ASSOC);

        $count = 3;
        foreach ($resultado as $index => $dato) :
            foreach ($dato[$index] as $inde => $final) :

                print $final[$inde];

            //$datos[$count++] = $resultado[$index];
            endforeach;
        endforeach;

        // print_r($datos);


        $resultadopdf = generaReporte($datos, $etiqueta, 'plantillaReporte/TemplateReporte.html', 'temporal/', 'reporteUser');
        //print $resultadopdf;

        //header("Content-type: application/pdf");
        //header("Content-Disposition: inline; filename=documento.pdf");
        //readfile("$resultadopdf");

        break;
    default:
        print "No se detecto variable";
        break;
}

$Search2 = [
    '<!--FOOTER-->',
    '<!--SCRIPT-->',
    '<!--MY SCRIPTS-->'
];

$Replace2 = [
    $footer,
    $scripts,
    $myScripts
];

$template1 = str_replace($Search2, $Replace2, $template1);
print $template1;
