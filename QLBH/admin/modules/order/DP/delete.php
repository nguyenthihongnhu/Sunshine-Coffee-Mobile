<?php 
    $open = "order";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    // _dubug($id);
    $DeleteOrder = $db->fetchID("donhang",$id);
    if(empty($DeleteOrder)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("order");
    }
    /**
     * kiểm tra xem danh sach san phẩm có sản phẩm
     * */

    $num = $db->delete("donhang",$id);
    if($num > 0){
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("order");      
    }else{
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("order");
    }

?>


