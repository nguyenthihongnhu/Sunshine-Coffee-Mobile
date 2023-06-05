<?php 
    $open = "customer";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    // _dubug($id);

    $EditInformation = $db->fetchID("user", $id);

?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>

   <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="mt-4">Thông tin khách hàng</h1>
                    <!-- Page Heading -->
<!--                     <ol class="breadcrumb mb-4 ">
                        <li class="breadcrumb-item ">
                        <a style="text-decoration: none" href="<?php echo modules("/index.php") ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm
                    </ol>  

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a style="text-decoration: none" href="<?php echo modules("/index.php") ?>">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </a>


                    </div>
                     -->
                    <ol class="breadcrumb mb-4">
                         <div class="d-sm-flex align-items-center justify-content-between">
                            <a style="text-decoration: none" href="<?php echo modules("/index.php") ?>">
                                <h1 class="h6 mb-0 text-gray-800">Trang chủ</h1>
                            </a>
                        </div>
                        <li class="breadcrumb-item active"></li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration: none" class="h6 mb-0 text-gray-800" href="<?php echo modules("customer/index.php") ?>">
                                Quản lý khách hàng
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Thông tin khách hàng
                    </ol>  
                    <div class="clearfix">
                        <!-- thông báo lỗi -->
                        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action=""  >
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"  name="inputName" value="<?php echo $EditInformation['email'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Passwork</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword" value="<?php echo $EditInformation['password'] ?>" readonly>
                                        <input type="checkbox" onclick="myFunction1()" value="">  
                                        <label for="inputPassword6" class="col-form-label"> Show Password </label> 
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control-plaintext" id="inputUsername" value="<?php echo $EditInformation['username'] ?>" readonly >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext" id="inputMobile" value="<?php echo $EditInformation['mobile'] ?>" readonly>
                                    </div>
                                </div>


                               <div class="form-group row" style="text-align:center;">
                                <div class="col-sm">
                                    
                                    <button type="button" class="btn btn-info"   onClick="myFunction()">Exit</button>
                                      <script>
                                          function myFunction() {
                                              window.location.href="<?php echo modules("customer/index.php") ?>";
                                            }
                                          function myFunction1() {
                                            var x = document.getElementById("inputPassword");
                                            if (x.type === "password") {
                                              x.type = "text";
                                            } else {
                                              x.type = "password";
                                            }
                                          }
                                        </script>
                                  </div>
                                </div>
                            </form>
                      </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>

<?php 

?>