<?php 

  if(isset($_POST['submit'])){
    include "includes/database.php";

    $db = new Database();

    $email = $db->escapeString($_POST['email']);
    $password = $db->escapeString($_POST['password']);

    $pwd = sha1(md5(sha1($password)));

    $update_data = [
      "email_address" => $email,
      "pwd" => $pwd,
    ];

    $db->update("users", $update_data,"u_id = 1");
    $result = $db->getResult();
    if (!empty($result)) {
      header("Location:logout.php");
    }


  }

  include "includes/header.php";


?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Settings</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Settings</li>
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
                    <?php 
                      $email = $_SESSION['user_info']['email'];
                    ?>
                      <form action ="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="form-horizontal" >
                        <div class="card-body">
                          <div class="form-group row">
                            <label
                              for="inputEmail3"
                              class="col-sm-2 col-form-label"
                              >Email</label
                            >
                            <div class="col-sm-10">
                              <input
                                type="email"
                                class="form-control"
                                id="inputEmail3"
                                name="email"
                                placeholder="Email"
                                value = "<?php echo $_SESSION['user_info']['email'] ?>"
                                required
                                />
                            </div>
                          </div>
                          <div class="form-group row">
                            <label
                              for="inputPassword3"
                              class="col-sm-2 col-form-label"
                              >Password</label
                            >
                            <div class="col-sm-10">
                              <input
                                type="password"
                                class="form-control"
                                id="inputPassword3"
                                name="password"
                                placeholder="Password"
                                required
                              />
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <input type="submit" name="submit" class="btn btn-info" value="Change Your info" />
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
    <!-- ./wrapper -->
<?php include "includes/footer.php"; ?>