<?php 
    $open = "customer";
    require_once __DIR__. "/../../autoload/autoload.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $data = [
                "name" => postInput('inputName'),
                "slug" => to_slug(postInput('inputName'))   
            ];
        $error = [];

    
        if(postInput('inputName') == ''){
            $error['inputName'] = " Mời bạn nhập đầy đủ tên danh mục";
        }
       
        //error trống ccos nghĩa không có lỗi
        if(empty($error)){
            // $isset = $db->fetchOne("sanphamthue"," tenspthue = '".$data["tenspthue"]."' ");
            // if(count($isset) > 0)
            // {
            //     $_SESSION['error'] = "Tên danh mục đã tồn tại! ";
            // }else{
                 $id_insert = $db->insert("category", $data);
                // print_r($id_insert); 
                if($id_insert > 0){
                    $_SESSION['success'] = "Thêm mới thành công";
                    redirectAdmin("category");
                }else{
                    //thêm thất bại
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
            // }
        }
    }
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>

   <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="mt-4">Thêm danh mục</h1>
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
                            <a style="text-decoration: none" class="h6 mb-0 text-gray-800" href="<?php echo modules("category/index.php") ?>">
                                Danh sách danh mục
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Thêm danh mục
                    </ol>  
                    <div class="clearfix"></div>
                    <!-- thông báo lỗi -->
                    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>



                    <div class="card shadow mb-4">
                        <div class="card-body">
<!--                          <form>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              </div>
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form> -->
                             <form action=""  method="POST">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Tên danh mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Tên danh mục" name="inputName">
                                        <?php if (isset($error['inputName'])): ?>
                                            <p class="text-danger"><?php echo $error['inputName'] ?></p>
                                        <?php endif ?>  
                                    </div>
                                </div>
                              <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-success">Lưu</button>
                                  <button type="button" class="btn btn-info"   onClick="myFunction()">Exit</button>
                                    <script>
                                        function myFunction() {
                                            window.location.href="<?php echo modules("category/index.php") ?>";
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