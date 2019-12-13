<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear Venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Crear Venta</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-lg-5 col-sm-12">

        <div class="bg-success" style="height: 4px;"></div>
        <div class="card">
          <form>
            <div class="card-body p-2">

              <div class="form-group">
                <div class="input-group mb-1 mt-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="text" class="form-control"  name="newBill" id="newBill" value="1000101" required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group mb-1 mt-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control"  name="newSeller" id="newSeller" value="Daniel Magadan" readonly required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group mb-1 mt-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                  </div>
                  <select class="form-control" name="saleClient" id="saleClient" required>
                    <option value="">Selecciónar cliente</option>
                  </select>
                  <div class="input-group-append">
                    <button class="btn btn-info" data-toggle="modal" data-target="#addClientModal">Agregar cliente</button>
                  </div>
                </div>
              </div>

              <div class="form-group row nuevoProducto">
                <div class="col-6" style="padding-right: 0px;">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                    </div>
                    <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="DEscripción del producto" required="">
                  </div>
                </div>

                <div class="col-3">
                  <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" min="1" placeholder="0" required>
                </div>
                
                <div class="col-3">
                  <div class="input-group">
                    <input type="text" class="form-control" id="precioProducto" name="precioProducto" placeholder="0000" required>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                  </div>
                </div>

              </div>

              

            </div>
          </form>
        </div>

      </div>
      <div class="col-lg-7 hidden-md hidden-sm-down">
        <div class=" bg-warning" style="height: 4px;"></div>
      </div>
    </div>

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