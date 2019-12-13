<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-dark-warning">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="views/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Taller Magadan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            if ($_SESSION["profilePicture"] != ""){
              echo '<img src="'.$_SESSION["profilePicture"].'" class="img-circle elevation-2" alt="User Image">';
            }else{
              echo '<img src="views/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
            }
           ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["name"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create-sale" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Venta</p>
                </a>
              </li>
              <li class="sales">
                <a href="sales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Historial de ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="views/index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de ventas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Control de Inventario</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fab fa-product-hunt nav-icon"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="products" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestión de productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="categories" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestión de categorias</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Control de Usuarios</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestión de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clients" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestión de clientes</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>