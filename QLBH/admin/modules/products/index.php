<?php 
    $open = "products";
    require_once __DIR__. "/../../autoload/autoload.php";

    $products = $db->fetchAll("sanphammoi");
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>

   <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="mt-4">Danh sách sản phẩm    
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
                                Quản lý sản phẩm 
                            </a>
                        </li>

                    </ol>  
                    <div class="clearfix">
                         <!-- thông báo lỗi -->
                        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                    </div>
                   
                                        <!-- DataTales Example -->


                    <div class="card shadow mb-4">
    <div><a href="add.php" class="btn btn-warning float-right mt-3 mr-4 w-25">Thêm Sản Phẩm Mới</a></li></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá (VNĐ)</th>
                                            <th>Số lượng</th>                                            
                                            <th>Tình trạng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $stt = 1; foreach ($products as $item): ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?php echo $stt ?></td>

                                            <td style="vertical-align: middle;"><?php echo $item['tensp'] ?></td>
                                            <td>
                                                <img src="<?php echo $item['hinhanh']?>" width="80px" height="80px" />
                                            </td>
                                            <td style="vertical-align: middle;"> <?php echo currency_format($item['giasp'],'') ?></td>
                                            <td style="vertical-align: middle;"><?php echo $item['soluong'] ?></td>
                                            <td style="vertical-align: middle;">
                                                <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php  echo $item['home'] == 1 ? 'btn btn-success' : 'btn btn-danger' ?>">
                                                    <?php echo $item['home'] ==  1 ? 'Còn hàng' : 'Hết hàng' ?>
                                                </a>
                                            </td>
                                            
                                            <td style="vertical-align: middle;">
                                                 <a  class="btn btn-xs btn-info"
                                                 href="edit.php?id=<?php echo $item['id'] ?>"></i> Sửa</a>
                                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"></i> Xóa</a>
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