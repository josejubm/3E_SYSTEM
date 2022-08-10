<?php
require_once ('libraries/Auth/Security.php');
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
$template1 = CargarPagina('template/Template1.php');
$Search = [
    '<!--STYLES-->',
    '<!--MY STYLES-->',
    '<!--SIDEBAR-->',
    '<!--HEADER-->',
    '<!--BREADCRUMB-->',
];

$Replace = [
    $styles,
    $myStyles,
    $sidebar,
    $header,
    $breadcrumb,
];

$template = str_replace($Search, $Replace, $template);
print $template;

switch ($_GET["action"]) {
    case "leer":
    
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
