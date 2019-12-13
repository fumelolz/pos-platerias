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
            <tr>
              <td>1</td>
              <td>Daniel Magadan</td>
              <td>magadan</td>
              <td><center><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></center></td>
              <td><center>Administrador</center></td>
              <td><center><button class="btn btn-success btn-sm">Activado</button></center></td>
              <td><center><center>2019-11-30 14:18:00</center></center></td>
              <td>
                <center>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </center>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Daniel Magadan</td>
              <td>magadan</td>
              <td><center><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></center></td>
              <td><center>Administrador</center></td>
              <td><center><button class="btn btn-danger btn-sm">Desactivado</button></center></td>
              <td><center>2019-11-30 14:18:00</center></td>
              <td>
                <center>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </center>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Daniel Magadan</td>
              <td>magadan</td>
              <td><center><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></center></td>
              <td><center>Administrador</center></td>
              <td><center><button class="btn btn-success btn-sm">Activado</button></center></td>
              <td><center>2019-11-30 14:18:00</center></td>
              <td>
                <center>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </center>
              </td>
            </tr>
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


<!-- Modal User -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
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

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Usuario" name="newUserUsername" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" class="form-control" placeholder="Email" name="newUserEmail" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Contraseña" name="newUserPass">
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
              <select name="newUserRol" class="form-control">
                <option value="">Seleccionar Rol</option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
              </select>
            </div>
          </div>
            
          <div class="form-group">
            <div class="panel">Subir Foto</div>
            <input type="file" id="newUserPicture" name="newUserPicture">
            <p class="help-block">Peso maximo de la foto 1Mb</p>
            <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="80px">
          </div>
          
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
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