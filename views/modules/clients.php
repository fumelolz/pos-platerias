<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestión de Clientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Gestión de Clientes</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#addClientModal">Agregar Cliente</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped userTable">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>RFC</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Dirección</th>
              <th>Total de compras</th>
              <th>Ultima Compra</th>
              <th>Fecha de registro</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>

            <?php 

              $item = null;
              $value = null;

              $clients = ClientsController::ctrShowClients($item,$value);

              foreach ($clients as $key => $value) {
                echo '  
                <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["name"].'</td>
                <td>'.$value["rfc"].'</td>
                <td>'.$value["phone"].'</td>
                <td>'.$value["email"].'</td>
                <td>'.$value["address"].'</td>
                <td>124</td>
                <td>2019-20-03 15:03:11</td>  
                <td>'.$value["date"].'</td> 
                <td>
                <center>
                <div class="btn-group">
                <button class="btn btn-warning btnEditClient" clientid="'.$value["id"].'" data-toggle="modal" data-target="#editClientModal"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btnDeleteClient" clientid="'.$value["id"].'"><i class="fas fa-times"></i></button>
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


<!-- Modal Cliente-->
<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <form role="form" method="Post">
      <div class="modal-header" style="background: #007bff; color: white;">
        <h5 class="modal-title" id="addClientModal">Agregar Cliente</h5>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre del cliente" name="newClient" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingresa RFC" name="newRFC" id="newRFC" maxlength="11">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Dirección" name="newAddress" id="newAddress">
            </div>
          </div>

          <div class="form-group row">
            <div class="input-group mb-1 col-6">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingresa telefono" name="newTel" id="newTel" maxlength="10" required>
            </div>

            <div class="input-group mb-1 col-6">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" class="form-control" placeholder="Ingresa email" name="newEmail" id="newEmail">
            </div>
          </div>
          
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar Cliente</button>
      </div>
      </form>
      <?php 

        $CreateClient = new ClientsController();
        $CreateClient -> ctrCreateClient();

       ?>
    </div>
  </div>
</div>



<!-- Modal editar Cliente-->
<div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="editClientModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <form role="form" method="Post">
      <div class="modal-header" style="background: #007bff; color: white;">
        <h5 class="modal-title" id="editClientModal">Editar Cliente</h5>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" value="" class="form-control" name="editClient" id="editClient" required>
              <input type="hidden" value="" id="editID" name="editID">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
              </div>
              <input type="text" value="" class="form-control" name="editRFC" id="editRFC" maxlength="11">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input type="text" value="" class="form-control"name="editAddress" id="editAddress">
            </div>
          </div>

          <div class="form-group row">
            <div class="input-group mb-1 col-6">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" value="" class="form-control" name="editTel" id="editTel" maxlength="10" required>
            </div>

            <div class="input-group mb-1 col-6">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" value="" class="form-control" name="editEmail" id="editEmail">
            </div>
          </div>
          
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
      </div>
      </form>
      <?php 

        $CreateClient = new ClientsController();
        $CreateClient -> ctrEditClient();

       ?>
    </div>
  </div>
</div>

<?php 
  
  $deleteClient = new ClientsController();
  $deleteClient -> ctrDeleteClient();
  
 ?>