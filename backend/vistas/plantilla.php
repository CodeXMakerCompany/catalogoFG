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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- fullCalendar -->
  <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- end fullCalendar -->

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  
  <!-- ColorPicker -->
  <link rel="stylesheet" href="plugins/clockPicker/bootstrap-clockpicker.min.css">

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

   <!-- CUSTOM CSS'S-->
   <link rel="stylesheet" href="vistas/dist/css/customCssPlantilla.css">
   <link rel="stylesheet" href="vistas/CSS/modalDesign.css">
  <link rel="stylesheet" href="vistas/CSS/login.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3.4 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
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
          $_GET["ruta"] == "calendario" || 
          $_GET["ruta"] == "salir"){
        
        include "modulos/".$_GET["ruta"].".php";     

      }

    }


    include_once 'modulos/footer.php';

    echo '</div>';

  }else{


      include "modulos/login.php";

  }

   ?>

<?php 
    
    include 'modals/modalsEvento.php';
    include_once 'modals/modalsInversion.php';

 ?>

 <script src="plugins/clockPicker/bootstrap-clockpicker.min.js"></script> 

 <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="plugins/sweetalert2/sweetalert2.all.js"></script>  
<!-- Fullcalendar -->
 <script src="vistas/plugins/fullcalendar/fullcalendarConsultorio.js"></script>
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
  
  

  <!-- fullCalendar -->
  <script src="vistas/bower_components/moment/moment.js"></script>
  <script src="vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

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

<script src="vistas/js/modalsEvents.js"></script>
 


</body>
</html>
