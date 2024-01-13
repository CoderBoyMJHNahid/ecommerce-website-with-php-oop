<?php include "includes/header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Add Product</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Add Product</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div id="notification_wrapper"></div>
                <div class="card">
                  <div class="card-body">
                    <form id="addProductForm">
                      <div class="card-body row">
                        <div class="col-lg-6">
                            <label for="" class="form-label">Name</label>
                            <input type="text" id="pname" name="pname" class="form-control mb-2" placeholder="Enter the product name.." />
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Reference</label>
                            <input type="text" id="pref" name="pref" class="form-control mb-2" placeholder="Enter the product Reference.." />
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Description</label>
                            <textarea id="pdesc" name="pdesc"cols="10" rows="2" class="form-control mb-2"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Product Image</label>
                            <input type="file" id="p_image" name="p_image" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Measure Unit</label>
                            <input type="text" name="meanuni" id="meanuni" class="form-control mb-2" placeholder="Enter the product Measure Unit..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Material</label>
                            <input type="text" name="mater" id="mater" class="form-control mb-2" placeholder="Enter the product material..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Brand</label>
                            <input type="text" name="pbrand" id="pbrand" class="form-control mb-2" placeholder="Enter the product Brand..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label mt-4">Size</label>
                            <input type="text" id="size-tags-input" 
                            name="size-tags-input" class="form-control mb-2" placeholder="Add product Size..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label mt-4">Color</label>
                            <input type="text" id="color-tags-input"  name="color-tags-input" class="form-control mb-2" placeholder="Add product Color..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Category</label>
                            <select name="pcat" id="pcat" class="form-control">
                                <?php 
                                    $db = new Database();
                                    $db->select("category");
                                    $result = $db->getResult();
                                    foreach ($result as $cat) {
                                        echo "<option value='{$cat['c_id']}'>{$cat['c_name']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Cost</label>
                            <input type="text" name="pcost" id="pcost" class="form-control mb-2" placeholder="Enter the product Cost..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">TVA %</label>
                            <input type="text" id="ptvaper" name="ptvaper" class="form-control mb-2" placeholder="Enter the product TVA %..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">TVA</label>
                            <input type="text" name="ptva" id="ptva" class="form-control mb-2" placeholder="Enter the product TVA..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">SubTotal</label>
                            <input type="text" name="subtotal" id="subtotal" class="form-control mb-2" placeholder="Enter the product SubTotal..">
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info">
                          Add Product
                        </button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
    </div>

<?php include "includes/footer.php"; ?>