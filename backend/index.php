<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/productos.controlador.php";

require_once "modelos/administradores.modelo.php";
require_once "modelos/productos.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();


 ?>
