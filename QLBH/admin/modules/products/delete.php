<?php 
    $open = "products";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    // _dubug($id);
    $DeleteProducts = $db->fetchID("sanphammoi",$id);
    if(empty($DeleteProducts)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("products");
    }
    /**
     * kiểm tra xem danh sach san phẩm có sản phẩm
     * */

    $num = $db->delete("sanphammoi",$id);
    if($num > 0){
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("products");      
    }else{
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("products");
    }

?>


