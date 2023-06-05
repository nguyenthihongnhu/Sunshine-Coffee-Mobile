<?php

 	$open = "order";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    
    $EditOrder = $db->fetchID("donhang",$id);

    // echo '<pre>';
    // var_dump($EditOrder);
    // echo '</pre>';

    if(empty($EditOrder)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("order");
    }

    $home = $EditOrder['home'] == 0 ? 1 : 0;
    

    if($EditOrder['home'] == 0)
    {
    	$home = 1;
    }
    else
    {
    	$home = 0;
    }

    $update = $db->update("donhang", array("home" => $home), array("id" => $id));
    
    if($update > 0)
    {
        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("order");
    }else
    {
        //thêm thất bại
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("order");
    }
?>