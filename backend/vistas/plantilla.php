<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catalogo | UI</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/skin-purple-light.min.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

   <!-- CUSTOM CSS'S-->
   <link rel="stylesheet" href="vistas/dist/css/customCssPlantilla.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-purple-light sidebar-mini login-page">


<?php 

  session_start();

  if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] == "ok") {
    
    echo '<div class="wrapper">';


    /*================================
    =     CABEZOTE            =
    ================================*/
        
        include "modulos/cabezote.php";

    /*===============================
        =           LATERAL            =
        ===============================*/

        include "modulos/lateral.php";


    /*===============================
        =            CONTENT            =
        ===============================*/

        if (isset($_GET["ruta"])) {
      
      if ($_GET["ruta"] == "inicio" || 
          $_GET["ruta"] == "productos" || 
          $_GET["ruta"] == "salir"){
        
        include "modulos/".$_GET["ruta"].".php";     

      }

    }


    echo '</div>';

  }else{


      include "modulos/login.php";

  }

   ?>





  <?php 


    

    
    
    //
    
    /*=====  CABEZOTE  ======*/
    

    
    
    
    
    /*=====  End ofLATERAL  ======*/

    

    
    
    
    
    /*=====  End of CONTENT  ======*/
    
    /*==============================
    =            FOOTER            =
    ==============================*/
    
    
    
    /*=====  End of FOOTER  ======*/

    /*===============================
    =            OPTIONS            =
    ===============================*/
    
    //include "modulos/options.php";
    
    
    /*=====  End of OPTIONS  ======*/
    
    
   ?>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- Datatables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- JS PRESONALIZADO -->
<script src="vistas/js/gestorProductos.js"></script>

<script src="vistas/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

</body>
</html>
