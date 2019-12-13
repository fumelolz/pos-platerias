<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Taller Magadan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
<!--   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse <?php if($_SESSION["logged"] != 'ok'){ echo 'login-page'; } ?>">


  
  <?php 

    if(isset($_SESSION["logged"]) && $_SESSION["logged"] == "ok") {

    echo '<!-- Site wrapper -->
    <div class="wrapper">';

    // Header
    include "modules/header.php";

    // Sidebar
    include "modules/sidebar.php";

    if (isset($_GET["route"])) {

      if($_GET["route"] == "home" ||
         $_GET["route"] == "users" ||
         $_GET["route"] == "categories" ||
         $_GET["route"] == "products" ||
         $_GET["route"] == "sales" ||
         $_GET["route"] == "create-sale" ||
         $_GET["route"] == "clients" ||
         $_GET["route"] == "logout") {

        // Content
        include "modules/".$_GET["route"].".php"; 
        
      }else {

      include "modules/404.php"; 
      
      }

      
    }else {

      include "modules/home.php";

    }

    // Footer
    include "modules/footer.php";

    echo '</div>
          <!-- ./wrapper -->';

    }else {

      // Login
      include "modules/login.php";

    }

  ?>

  


<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="views/plugins/datatables/jquery.dataTables.js"></script>
<script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="views/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<!-- JS Personalizado -->
<script src="views/js/script.js"></script>
<script src="views/js/users.js"></script>
<script src="views/js/categories.js"></script>
<script src="views/js/products.js"></script>
<script src="views/js/clients.js"></script>
</body>
</html>
