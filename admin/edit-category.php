<?php 
    include "includes/header.php";
    $db = new Database();

    if(isset($_POST['submit'])){

        $db->update("category",["c_name" => $db->escapeString($_POST['cname'])],"c_id = {$db->escapeString($_POST['c_id'])}");

        $result = $db->getResult();
        
        if (!empty($result)){
            header("Location:{$db->hostname}/admin/category.php");
        }else{
            header("Location:{$db->hostname}/admin/category.php?err");
        }
        

    }

    if(!isset($_GET['cat_id'])){
        header("Location:{$db->hostname}/admin/category.php");
    }
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Edit Category</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Edit Category</li>
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
                        <?php 

                            $db->select("category","*",null,"c_id = {$_GET['cat_id']}");
                            $row = $db->getResult();
                        
                        ?>
                        <div class="col-lg-12">
                            <label for="" class="form-label">Name</label>
                            <input type="text" value="<?php echo $row[0]["c_name"]?>" name="cname" class="form-control mb-2" placeholder="Enter the product name.." required/>
                            <input type="hidden" value="<?php echo $row[0]["c_id"]?>" name="c_id"/>
                        </div>
                        
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <input type="submit" name="submit" value="Edit Category" class="btn btn-info">
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