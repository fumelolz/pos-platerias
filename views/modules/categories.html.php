<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestión de Categorias</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Gestión de Categorias</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategorieModal">Agregar Categoria</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped userTable">
          <thead>
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Anillos de plata</td>
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
              <td>Collares de perla</td>
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
              <td>Collares de plata</td>
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
<div class="modal fade" id="addCategorieModal" tabindex="-1" role="dialog" aria-labelledby="addCategorieModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <form role="form" method="Post">
      <div class="modal-header" style="background: #007bff; color: white;">
        <h5 class="modal-title" id="addCategorieModal">Agregar Categoria</h5>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-th"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre categoria" name="newCategorie" required>
            </div>
          </div>
          
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar Categoría</button>
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