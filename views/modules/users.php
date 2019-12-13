<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestión de Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Gestión de Usuarios</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Agregar Usuario</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped userTable">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Ultimo Login</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>

            <?php 

            $item = null;
            $value =null;

            $users = UsersController::ctrShowUsers($item,$value);

            foreach ($users as $key => $value) {
              echo '  
                <tr>
                <td>'.$value["id"].'</td>
                <td>'.$value["name"].'</td>
                <td>'.$value["user"].'</td>';

                if ($value["image"] != ""){
                  echo '<td><center><img src="'.$value["image"].'" class="img-thumbnail" width="40px"></center></td>';
                }else{
                  echo '<td><center><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></center></td>';
                }


                echo '<td><center>'.$value["role"].'</center></td>';
                
                if($value["state"] == 1){
                  echo '<td><center><button class="btn btn-success btn-sm btnActivate" state="0" userID="'.$value["id"].'">Activado</button></center></td>';
                }else{
                   echo '<td><center><button class="btn btn-danger btn-sm btnActivate" state="1" userID="'.$value["id"].'">Desactivado</button></center></td>';
                }

                echo'
                <td><center><center>'.$value["last_login"].'</center></center></td>
                <td>
                <center>
                <div class="btn-group">
                <button class="btn btn-warning btnEditUser" userID="'.$value["id"].'" data-toggle="modal" data-target="#editUserModal"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btnDeleteUser" username="'.$value["user"].'" userID="'.$value["id"].'" userPicture="'.$value["image"].'"><i class="fas fa-times"></i></button>
                </div>
                </center>
                </td>
                </tr>';
          }

             ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal create User -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <form role="form" method="Post" enctype="multipart/form-data">
      <div class="modal-header" style="background: #007bff; color: white;">
        <h5 class="modal-title" id="addUserModal">Agregar Usuario</h5>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre completo" name="newUserName" required>
            </div>
          </div>
          
          <small id="userHelpBlock" class="form-text text-muted">
            El usuario no debe de contener caracteres extraños
          </small>
          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Usuario" name="newUserUsername" id="newUserUsername" required>
            </div>
          </div>

<!--           <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" class="form-control" placeholder="Email" name="newUserEmail" required>
            </div>
          </div> -->
          <small id="passHelpBlock" class="form-text text-muted">
            La contraseña no puede contener caracteres especiales, ni espacios en blanco. 
          </small>
          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Contraseña" name="newUserPass" autocomplete="on">
              <!-- <div class="input-group-append">
                <span class="input-group-text" id="loc"><i class="fas fa-eye"></i></span>
              </div> -->
            </div>
          </div>


          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <select name="newUserRole" class="form-control">
                <option value="">Seleccionar Rol</option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
              </select>
            </div>
          </div>
            
          <div class="form-group">
            <div class="panel">Subir Foto</div>
            <input type="file" class="newUserPicture" name="newUserPicture">
            <p class="help-block">Peso maximo de la foto 1Mb</p>
            <img src="views/img/users/default/anonymous.png" class="img-thumbnail prevImage" width="100px">
          </div>
          
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?php 

        $createUser = new UsersController();
        $createUser -> ctrCreateUser();

       ?>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit User -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <form role="form" method="Post" enctype="multipart/form-data">
      <div class="modal-header" style="background: #007bff; color: white;">
        <h5 class="modal-title" id="editUserModal">Editar Usuario</h5>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" value="" id="editUserName"  name="editUserName" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" value="" id="editUserUsername" name="editUserUsername" readonly>
            </div>
          </div>

<!--           <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" class="form-control" placeholder="Email" name="editUserEmail" required>
            </div>
          </div> -->

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Escriba nueva contraseña" name="editUserPass" autocomplete="on">
              <input type="hidden" id="actualPass" name="actualPass">
              <!-- <div class="input-group-append">
                <span class="input-group-text" id="loc"><i class="fas fa-eye"></i></span>
              </div> -->
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <select name="editUserRole" class="form-control">
                <option value="" id="selectedRole"></option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
              </select>
            </div>
          </div>
            
          <div class="form-group">
            <div class="panel">Subir Foto</div>
            <input type="file" class="newUserPicture" name="editUserPicture">
            <input type="hidden" name="actualPicture" id="actualPicture">
            <p class="help-block">Peso maximo de la foto 1Mb</p>
            <img src="views/img/users/default/anonymous.png" class="img-thumbnail prevImage" width="100px">
          </div>
          
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      
      <?php 

        $editUser = new UsersController();
        $editUser -> ctrEditUser();

       ?> 
      </form>
    </div>
  </div>
</div>

<!-- <script>
  var eye = document.querySelector(".passInput")
  var lo = document.querySelector("#loc")
  var band = false;
  function see() {
    if(!band){
      eye.setAttribute('type','text')
      lo.classList.remove("fa-eye-slash")
      lo.classList.add("fa-eye")
      band = true;
    }else {
      eye.setAttribute('type','password')
      band = false;
      lo.classList.add("fa-eye-slash")
      lo.classList.remove("fa-eye")
    }

  }
</script> -->

<?php 
  
  $deleteUser = new UsersController();
  $deleteUser -> ctrDeleteUser();

 ?>