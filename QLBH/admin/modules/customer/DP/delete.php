<?php 
    $open = "customer";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    // _dubug($id);
    $DeleteCustomer = $db->fetchID("user",$id);
    if(empty($DeleteCustomer)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("customer");
    }
    /**
     * kiểm tra xem danh sach san phẩm có sản phẩm
     * */

    $num = $db->delete("user",$id);
    if($num > 0){
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("customer");      
    }else{
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("customer");
    }

?>


