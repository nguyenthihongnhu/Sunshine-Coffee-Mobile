<?php 
    $open = "products";
    require_once __DIR__. "/../../autoload/autoload.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $data = [
                "id_loai" => postInput('inputIdsp'),
                "tensp" => postInput('inputTensp'),
 
                "giasp" => to_slug_tien_te(postInput('inputGiasp')),
                "soluong" => postInput('inputSoluong'),
                "hinhanh" => postInput('inputHinhanh'),
                "mota" => postInput('inputMota'),
                
            ];
        $error = [];

    
        if(postInput('inputIdsp') == ''){
            $error['inputIdsp'] = " Thông tin loại sản phẩm chưa chính xác";
        }
        if(postInput('inputTensp') == ''){
            $error['inputTensp'] = " Thông tin tên sản phẩm chưa chính xác";
        }

        if(postInput('inputGiasp') == ''){
            $error['inputGiasp'] = " Thông tin giá sản phẩm sản phẩm chưa chính xác";
        }
        if(postInput('inputSoluong') == ''){
            $error['inputSoluong'] = " Thông tin số lượng sản phẩm chưa chính xác";
        }
        if(postInput('inputHinhanh') == ''){
            $error['inputHinhanh'] = " Thông tin liên kết hình ảnh chưa chính xác";
        }
        if(postInput('inputMota') == ''){
            $error['inputMota'] = " Thông tin mô tả sản phẩm chưa chính xác";
        }
       
        //error trống ccos nghĩa không có lỗi
        if(empty($error)){
            // $isset = $db->fetchOne("sanphamthue"," tenspthue = '".$data["tenspthue"]."' ");
            // if(count($isset) > 0)
            // {
            //     $_SESSION['error'] = "Tên danh mục đã tồn tại! ";
            // }else{
                 $id_insert = $db->insert("sanphammoi", $data);
                // print_r($id_insert); 
                if($id_insert > 0){
                    $_SESSION['success'] = "Thêm mới thành công";
                    redirectAdmin("products");
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
                    <h1 class="mt-4">Thêm sản phẩm</h1>
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
                            <a style="text-decoration: none" class="h6 mb-0 text-gray-800" href="<?php echo modules("products/index.php") ?>">
                                Quản lý sản phẩm
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Thêm sản phẩm
                    </ol>  
                    <div class="clearfix">
                        <!-- thông báo lỗi -->
                        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                    </div>
                    



                    <div class="card shadow mb-4">
                        <div class="card-body">
                             <form action=""  method="POST" enctype="multipart/from-data">

                                 

                                <div class="form-group row">
                                    <label for="inputIdsp" class="col-sm-2 col-form-label">Loại sản phẩm</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputIdsp" placeholder="Loại sản phẩm" name="inputIdsp">
                                        <?php if (isset($error['inputIdsp'])): ?>
                                            <p class="text-danger"><?php echo $error['inputIdsp'] ?></p>
                                        <?php endif ?>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputTensp" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTensp" placeholder="Tên sản phẩm" name="inputTensp">
                                        <?php if (isset($error['inputTensp'])): ?>
                                            <p class="text-danger"><?php echo $error['inputTensp'] ?></p>
                                        <?php endif ?>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputGiasp" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                                    <div class="col-sm-4">
                                        <input type="text" data-type="currency" class="form-control" id="inputGiasp" placeholder="1,000,000 VNĐ" name="inputGiasp">
                                        <?php if (isset($error['inputGiasp'])): ?>
                                            <p class="text-danger"><?php echo $error['inputGiasp'] ?></p>
                                        <?php endif ?>  
                                    </div>

                                    <label for="inputSoluong" class="col-sm-2 col-form-label">Số lượng</label>
                                    <div class="col-sm-4">
                                        <input type="number"  class="form-control" id="inputSoluong" placeholder="1" name="inputSoluong">
                                        <?php if (isset($error['inputSoluong'])): ?>
                                            <p class="text-danger"><?php echo $error['inputSoluong'] ?></p>
                                        <?php endif ?>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputHinhanh" class="col-sm-2 col-form-label">Hình ảnh</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" id="inputHinhanh" placeholder="Đường liên kết hình ảnh" name="inputHinhanh">
                                        <?php if (isset($error['inputHinhanh'])): ?>
                                            <p class="text-danger"><?php echo $error['inputHinhanh'] ?></p>
                                        <?php endif ?>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputMota" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="inputMota" rows="4"></textarea>
                                        <?php if (isset($error['inputMota'])): ?>
                                            <p class="text-danger"><?php echo $error['inputMota'] ?></p>
                                        <?php endif ?>  
                                    </div>
                                </div>



                              <div class="form-group row" style="text-align:center;">
                                <div class="col-sm">
                                  <button type="submit" class="btn btn-success">Lưu</button>
                                  <button type="button" class="btn btn-info"   onClick="myFunction()">Exit</button>
                                    <script>
                                        function myFunction() {
                                            window.location.href="<?php echo modules("products/index.php") ?>";
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