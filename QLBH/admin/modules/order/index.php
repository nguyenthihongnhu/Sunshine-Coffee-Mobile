<?php 
    $open = "order";
    require_once __DIR__. "/../../autoload/autoload.php";

    $order = $db->fetchAll("donhang");
      
    
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>

   <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="mt-4">Danh sách đơn hàng
                    </h1>
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
                                Quản lý đơn hàng
                            </a>
                        </li>

                    </ol>  
                    <div class="clearfix"></div>
                    <!-- thông báo lỗi -->
                    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>




                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th>STT</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>                                           
                                            <th>Tổng tiền</th>
                                            <th>Tình trạng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                        <?php $stt = 1; foreach ($order as $item): ?>
                                        <tr>

                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $stt ?></td>
                                             <td style="text-align: center; vertical-align: middle;"><?php echo $item['email'] ?></td>

                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $item['sodienthoai'] ?></td>
                                            <td style="text-align: center;  vertical-align: middle;"><?php echo $item['diachi'] ?></td>
                                      <!--       <td style="text-align: center;  vertical-align: middle;"><?php echo $item['created_order_at'] ?></td> -->
                                           
                                            <td style="text-align: center; vertical-align: middle;"><?php echo currency_format($item['tongtien'],'') ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php  echo $item['home'] == 1 ? 'btn btn-success' : 'btn btn-danger' ?>">
                                                    <?php echo $item['home'] ==  1 ? 'Đang giao' : 'Đã giao' ?>
                                                </a>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                            <a  class="btn btn-xs btn-info"
                                                 href="information.php?id=<?php echo $item['id'] ?>"> </i> Xem</a>
                                               <!--  <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a> -->
                                            </td>
                                            

                                        </tr>
                                        <?php $stt++; endforeach ; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="text-danger" style="text-transform: uppercase;  font-family: serif; font-weight: bold;">Lưu ý:</h5>
                            <p>Chi tiết hiển thị tình trạng thái khóa và mở</p>
                            <p>Nếu hiển thị Khóa thì item đó đang ngưng hoạt động</p>
                            <p>Nếu hiển thị Mở thì item đó đang hoạt động</p>
                        </div>
                    </div> -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



<?php require_once __DIR__. "/../../layouts/footer.php"; ?>

<?php ?>