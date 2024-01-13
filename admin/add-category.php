<?php 
    include "includes/header.php";

    if(isset($_POST['submit'])){

        $db = new Database();

        $db->insert("category",["c_name" => $db->escapeString($_POST['cname'])]);

        $result = $db->getResult();
        
        if (!empty($result)){
            header("Location:{$db->hostname}/admin/category.php");
        }else{
            header("Location:{$db->hostname}/admin/category.php?err");
        }
        

    }
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Add Category</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Add Category</li>
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
                <div id="notification_wrapper">
                    <?php 
                        if(isset($_GET['err'])){
                            echo "<div class='alert alert-danger'>
                                        <p>Something is wrong. Please try again!</p>
                                </div>";
                        }
                    ?>
                </div>
                <div class="card">
                  <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <div class="card-body row">
                        <div class="col-lg-12">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="cname" class="form-control mb-2" placeholder="Enter the product name.." required/>
                        </div>
                        
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <input type="submit" name="submit" value="Add Category" class="btn btn-info">
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