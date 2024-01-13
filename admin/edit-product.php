<?php include "includes/header.php";

    $db = new Database();

    
    if(!isset($_GET['p_id'])){

        header("Location:{$db->hostname}/admin/products.php");

    }

    $pid = $db->escapeString($_GET['p_id']);
    $db->select("product","*","category ON product.cat = category.c_id","p_id = $pid");
    $val = $db->getResult();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Edit Product</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Edit Product</li>
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
                    <form id="updateProduct">
                      <div class="card-body row">
                        <div class="col-lg-6">
                            <label for="" class="form-label">Name</label>
                            <input type="text" id="ol_pname" value="<?php echo $val[0]['name']?>" name="pname" class="form-control mb-2" placeholder="Enter the product name.." />
                            <input type="hidden" id="up_id" value="<?php echo $val[0]['p_id']?>" name="up_id" />
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Serial Number</label>
                            <input type="text" value="<?php echo $val[0]['serial_num']; ?>" id="serial_num" name="serial_num" class="form-control mb-2" placeholder="Enter the product Serial Number.." />
                            <input type="hidden" value="<?php echo $val[0]['serial_num']; ?>" id="old_num" name="old_num" class="form-control mb-2" placeholder="Enter the product Serial Number.." />
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Reference</label>
                            <input type="text" value="<?php echo $val[0]['reference'] ?>" id="pref" name="pref" class="form-control mb-2" placeholder="Enter the product Reference.." />
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Description</label>
                            <textarea name="pdesc" id="ol_pdesc" cols="10" rows="2" class="form-control mb-2"><?php echo $val[0]['description'] ?></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Product Image</label>
                            <input type="file" id="p_image" name="p_image" class="form-control">
                            <input type="hidden" value="<?php echo $val[0]['p_image'] ?>" name="ol_p_image" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Measure Unit</label>
                            <input type="text" value="<?php echo $val[0]['measure_unit'] ?>" id="ol_meanuni" name="meanuni" class="form-control mb-2" placeholder="Enter the product Measure Unit..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Material</label>
                            <input type="text" id="ol_mater" value="<?php echo $val[0]['material'] ?>" name="mater" class="form-control mb-2" placeholder="Enter the product material..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Brand</label>
                            <input type="text" id="ol_pbrand" value="<?php echo $val[0]['brand'] ?>" name="pbrand" class="form-control mb-2" placeholder="Enter the product Brand..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label mt-4">Size</label>
                            <input type="text" value="<?php echo $val[0]['size'] ?>" name="size-tags-input" id="size-tags-input" class="form-control mb-2" placeholder="Add product Size.." required>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label mt-4">Color</label>
                            <input type="text" value="<?php echo $val[0]['color'] ?>" name="color-tags-input" id="color-tags-input" class="form-control mb-2" placeholder="Add product Color.." required>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Category</label>
                            <select name="pcat" id="ol_pcat" class="form-control">
                                <?php 
                                    $db->select("category");
                                    $result = $db->getResult();
                                    foreach ($result as $cat) {
                                        if ($cat['c_id'] === $val[0]['cat'] ) {
                                          $selected = "selected";
                                        }else{
                                          $selected = "";
                                        }
                                        echo "<option {$selected} value='{$cat['c_id']}'>{$cat['c_name']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">Cost</label>
                            <input type="text" id="ol_pcost" value="<?php echo $val[0]['cost'] ?>" name="pcost"  class="form-control mb-2" placeholder="Enter the product Cost..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">TVA %</label>
                            <input type="text" id="ol_ptvaper" value="<?php echo $val[0]['ivaPercent'] ?>" name="ptvaper" class="form-control mb-2" placeholder="Enter the product TVA %..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">TVA</label>
                            <input type="text" id="ol_ptva" value="<?php echo $val[0]['iva'] ?>" name="ptva" class="form-control mb-2" placeholder="Enter the product TVA..">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="form-label">SubTotal</label>
                            <input type="text" value="<?php echo $val[0]['subtotal'] ?>" id="ol_subtotal" name="subtotal" class="form-control mb-2" placeholder="Enter the product SubTotal..">
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <input value="Update Your Product" type="submit"  class="btn btn-info" />
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