<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestión de Productos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Gestión de Productos</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Agregar Producto</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped productTable">
          <thead>

            <tr>
              <th style="width: 10px;">#</th>
              <th>Imagen</th>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th>Precio de compra</th>
              <th>Precio de venta</th>
              <th>Agregado</th>
              <th>Acciones</th>
            </tr>
          </thead>

        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal Producto -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <form role="form" method="Post" enctype="multipart/form-data">
      <div class="modal-header" style="background: #007bff; color: white;">
        <h5 class="modal-title" id="addProductModal">Agregar Producto</h5>
      </div>

      <div class="modal-body">

        <div class="box-body">



          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-th"></i></span>
              </div>
              <select name="newProductCategorie" id="newProductCategorie" class="form-control" required>
                <option value="">Seleccionar Categoria</option>

                <?php 
                $item = null;
                $value = null;

                $showCategories = CategoriesController::ctrShowCategories($item,$value);

                foreach ($showCategories as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingresar Codigo" name="newCode" id="newCode" value="" readonly="" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingrese Descripción" name="newDescription" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-check"></i></span>
              </div>
              <input type="number" class="form-control" placeholder="Stock" name="newStock" min="0" required>
            </div>
          </div>

          <div class="form-group row">

            <div class="col-6">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                </div>
                <input type="number" class="form-control" placeholder="Precio de compra" name="newPP" id="newPP" min="0" step="any" required>
              </div>
            </div>

            <div class="col-6">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                </div>
                <input type="number" class="form-control" value="" placeholder="Precio de venta" name="newSP" id="newSP" min="0" step="any" readonly required>
              </div>

              <br>
              <div class="row">
                <div class="col-6">
                  <div class="custom-control custom-checkbox mt-2" >
                    <input class="custom-control-input" type="checkbox" id="percentageCheckBox" checked>
                    <label for="percentageCheckBox" class="custom-control-label">Utilizar porcentaje</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-group">
                    <input type="number" class="form-control nuevoPorcentaje" min="0" max="100" value="40" required>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


              <div class="form-group">
                <div class="panel">Subir Foto</div>
                <input type="file" class="newProductPicture" name="newProductPicture">
                <p class="help-block">Peso maximo de la foto 5Mb</p>
                <img class="prevImage" src="views/img/products/default/anonymous.png" class="img-thumbnail" width="100px">
              </div>

          </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>

      <?php 

      $createProduct = new ProductsController();
      $createProduct -> ctrCreateProduct();

       ?>

    </div>
  </div>
</div>

<!-- Modal Editar Producto -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <form role="form" method="Post" enctype="multipart/form-data">
      <div class="modal-header" style="background: #007bff; color: white;">
        <h5 class="modal-title" id="editProductModal">Editar Producto</h5>
      </div>

      <div class="modal-body">

        <div class="box-body">



          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-th"></i></span>
              </div>
              <select name="editProductCategorie"  class="form-control" readonly required>
                <option id="editProductCategorie" value=""></option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code"></i></span>
              </div>
              <input type="text" class="form-control" name="editCode" id="editCode" value="" readonly required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
              </div>
              <input type="text" class="form-control" value="" id="editDescription" name="editDescription" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-check"></i></span>
              </div>
              <input type="number" class="form-control" value="" id="editStock" name="editStock" min="0" required>
            </div>
          </div>

          <div class="form-group row">

            <div class="col-6">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                </div>
                <input type="number" class="form-control" value="" name="editPP" id="editPP" min="0" step="any" required>
              </div>
            </div>

            <div class="col-6">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                </div>
                <input type="number" class="form-control" value="" name="editSP" id="editSP" min="0" step="any" readonly required>
              </div>

              <br>
              <div class="row">
                <div class="col-6">
                  <div class="custom-control custom-checkbox mt-2" >
                    <input class="custom-control-input" type="checkbox" id="percentageCheckBox2" checked>
                    <label for="percentageCheckBox2" class="custom-control-label">Utilizar porcentaje</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-group">
                    <input type="number" class="form-control editPorcentaje" min="0" max="100" value="40" required>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


              <div class="form-group">
                <div class="panel">Subir Foto</div>
                <input type="file" class="newProductPicture" name="editProductPicture">
                <input type="hidden" name="actualPicture" id="actualPicture">
                <p class="help-block">Peso maximo de la foto 5Mb</p>
                <img class="prevImage" src="views/img/products/default/anonymous.png" class="img-thumbnail" width="100px">
              </div>

          </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>

      <?php 

        $editProduct = new ProductsController();
        $editProduct -> ctrEditProduct();

       ?>

    </div>
  </div>
</div>


<?php 
  
  $deleteProduct = new ProductsController();
  $deleteProduct -> ctrDeleteProduct();

 ?>

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
</script>