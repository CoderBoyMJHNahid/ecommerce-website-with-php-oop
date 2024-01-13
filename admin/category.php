<?php include "includes/header.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Category</h1>
                <a href="add-category.php" class="btn btn-primary mt-3">Add Category</a>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Category</li>
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
                          <th>Serial Number</th>
                          <th>Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                          $db = new Database();
                          $db->select("category");
                          $result = $db->getResult();
                          $i = 0;
                          foreach ($result as $row) {
                            $i++;
                        ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $row['c_name'] ?></td>
                          <td>
                            <a class="btn btn-sm btn-success" href="edit-category.php?cat_id=<?php echo $row['c_id'] ?>">Edit</a>
                            <a onclick="return confirm('Are you sure to delete this category?')" class="btn btn-sm btn-danger" href="includes/delete-category.php?cat_id=<?php echo $row['c_id'] ?>">Delete</a>
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