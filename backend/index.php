<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/subcategorias.controlador.php";
require_once "controladores/cabeceras.controlador.php";
require_once "controladores/productos.controlador.php";

require_once "modelos/administradores.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/subcategorias.modelo.php";
require_once "modelos/cabeceras.modelo.php";
require_once "modelos/productos.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();


 ?>
