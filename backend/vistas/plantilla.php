<?php 

session_start();

 ?>
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

  <!-- Datatables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

   <!-- Dropzone for images -->
   <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css">



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
   <link rel="stylesheet" href="vistas/CSS/modalDesign.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

<!-- Datatables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>   
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>     

 <!-- Dropzone for images -->

 <script src="vistas/plugins/dropzone/dropzone.js"></script>

 <!-- bootstrap tags input -->
  <link rel="stylesheet" href="vistas/plugins/tags/bootstrap-tagsinput.css">

  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="plugins/sweetalert2/sweetalert2.all.js"></script>    


</head>

<body class="hold-transition skin-purple-light sidebar-mini login-page">


<?php 

  

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


<!-- REQUIRED JS SCRIPTS -->

<!-- bootstrap tags input https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/-->
  <script src="vistas/plugins/tags/bootstrap-tagsinput.min.js"></script>


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
