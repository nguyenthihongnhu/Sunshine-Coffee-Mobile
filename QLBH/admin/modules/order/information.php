<?php 
    $open = "order";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    // _dubug($id);
    $Information =  $db->fetchIDMuti("donhang, chitietdonhang, sanphammoi, user",
     "sanphammoi.id = chitietdonhang.idsp and donhang.id = chitietdonhang.iddonhang and donhang.iduser=user.id and donhang.id =", $id );
    $TableInformation =  $db->fetchALLMuti("donhang, chitietdonhang, sanphammoi, user",
     " sanphammoi.id = chitietdonhang.idsp and donhang.id = chitietdonhang.iddonhang and donhang.iduser=user.id and donhang.id = ", $id );

?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>

   <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="mt-4">Thông tin đơn hàng</h1>
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
                            <a style="text-decoration: none" class="h6 mb-0 text-gray-800" href="<?php echo modules("order/index.php") ?>">
                                Quản lý đơn hàng 
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Thông tin người mua
                    </ol>  
                    <div class="clearfix">
                        <!-- thông báo lỗi -->
                        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                    </div>

                    <!-- form thông tin đơn hàng -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <label for="inputName" class="col-sm col-form-label" style="text-align:center; font-size: 20px; font-weight: bold;">Thông tin đơn hàng</label>
                                                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th>STT</th>
                                            <th>ID sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                             <th>Ngày tạo đơn</th>
                                            <th>Địa chỉ</th>
                                            <th>Số lượng</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $stt = 1; foreach ($TableInformation as $item): ?>
                                        <tr>

                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $stt ?></td>
                                             <td style="text-align: center; vertical-align: middle;"><?php echo $item['idsp'] ?></td>

                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $item['tensp'] ?></td>
                                            <td style="text-align: center;  vertical-align: middle;">
                                                <img src="<?php echo $item['hinhanh'] ?>" width="80px" height="80px" />
                                            </td>
                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $item['ngaytao'] ?></td>
                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $item['diachi'] ?></td>
                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $item['soluong'] ?></td>
                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $item['giasp'] ?></td>
                                           
                                            <td style="text-align: center; vertical-align: middle;"><?php echo currency_format($item['tongtien'],'') ?></td>
                                             <td style="text-align: center; vertical-align: middle;">
                                                <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php  echo $item['home'] == 1 ? 'btn btn-success' : 'btn btn-danger' ?>">
                                                    <?php echo $item['home'] ==  1 ? 'Đang giao' : 'Đã giao' ?>
                                                </a>
                                            </td>
                                            
                                            

                                        </tr>
                                        <?php $stt++; endforeach ; ?>
                                    </tbody>
                                </table>
                            </div>
                      </div>
                    </div>

                    <!-- form người đặt -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <label for="inputName" class="col-sm col-form-label" style="text-align:center; font-size: 20px; font-weight: bold;">Thông tin người mua</label>
                            <form action=""  >
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"  name="inputName" value="<?php echo $Information['email'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticUsername"  name="inputUsername" value="<?php echo $Information['username'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputMobile" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control-plaintext" id="inputMobile" value="<?php echo $Information['mobile'] ?>" readonly>
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