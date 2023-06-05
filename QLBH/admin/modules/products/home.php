<?php

 	$open = "products";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditProducts = $db->fetchID("sanphammoi",$id);
    
    if(empty($EditProducts)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("products");
    }

    $home = $EditProducts['home'] == 0 ? 1 : 0;

    if($EditProducts['home'] == 0)
    {
    	$home = 1;
    }
    else
    {
    	$home = 0;
    }

    $update = $db->update("sanphammoi", array("home" => $home), array("id" => $id));

    if($update > 0)
    {
        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("products");
    }else
    {
        //thêm thất bại
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("products");
    }
?>