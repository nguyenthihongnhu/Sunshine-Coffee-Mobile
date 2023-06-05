<?php

 	$open = "customer";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditCustomer = $db->fetchID("user",$id);
    
    if(empty($EditCustomer)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("customer");
    }

    $home = $EditCustomer['home'] == 0 ? 1 : 0;

    if($EditCustomer['home'] == 0)
    {
    	$home = 1; // Mở
    }
    else
    {
    	$home = 0; //Khóa
    }

    $update = $db->update("user", array("home" => $home), array("id" => $id));

    if($update > 0)
    {
        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("customer");
    }else
    {
        //thêm thất bại
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("customer");
    }
?>