<!-- <?php 
    $open = "productsrent";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    // _dubug($id);
    $DeleteProductsRent = $db->fetchID("sanphamthue",$id);
    if(empty($DeleteProductsRent)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("productsrent");
    }
    /**
     * kiểm tra xem danh sach san phẩm có sản phẩm
     * */

    $num = $db->delete("sanphamthue",$id);
    if($num > 0){
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("productsrent");      
    }else{
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("productsrent");
    }

?> -->


