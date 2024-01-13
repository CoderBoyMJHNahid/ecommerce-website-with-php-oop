<?php include "includes/header.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Products </h1>
                <a href="add-product.php" class="btn btn-primary mt-3">Add Product</a>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Products</li>
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
                <div class="card">
                  <div class="card-body">
                    <table
                      id="categoryTable"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Reference</th>
                          <th>Position</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>MeasureUnit</th>
                          <th>Material</th>
                          <th>Size</th>
                          <th>Color</th>
                          <th>Category</th>
                          <th>Cost</th>
                          <th>TVA %</th>
                          <th>TVA </th>
                          <th>SubTotal</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                          $db = new Database();
                          $db->select("product","*","category ON product.cat = category.c_id",null,"serial_num ASC");
                          $result = $db->getResult();
                          $i = 0;
                          foreach ($result as $row) {
                            $i++;
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['reference'] ?></td>
                          <td><?php echo $row['serial_num'] ?></td>
                          <td><img src="dist/img/products/<?php echo $row['p_image'] ?>" alt=""></td>
                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['description'] ?></td>
                          <td><?php echo $row['measure_unit'] ?></td>
                          <td><?php echo $row['material'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['color'] ?></td>
                          <td><?php echo $row['c_name'] ?></td>
                          <td><?php echo $row['cost'] ?></td>
                          <td><?php echo $row['ivaPercent'] ?></td>
                          <td><?php echo $row['iva'] ?></td>
                          <td><?php echo $row['subtotal'] ?></td>
                          <td>
                            <a href="edit-product.php?p_id=<?php echo $row['p_id']?>" class="btn btn-sm btn-success my-1">Edit</a>
                            <a onclick="return confirm('Are you sure to delete this product?')" href="includes/delete-product.php?p_id=<?php echo $row['p_id']?>" class="btn btn-sm btn-danger my-1">Delete</a>
                          </td>
                        </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
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
    <!-- ./wrapper -->
<?php include "includes/footer.php"; ?>