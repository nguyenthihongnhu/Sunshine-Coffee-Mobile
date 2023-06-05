<?php

 	$open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID("sanphamthue",$id);
    
    if(empty($EditCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }

    $home = $EditCategory['home'] == 0 ? 1 : 0;

    if($EditCategory['home'] == 0)
    {
    	$home = 1;
    }
    else
    {
    	$home = 0;
    }

    $update = $db->update("sanphamthue", array("home" => $home), array("id" => $id));

    if($update > 0)
    {
        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("category");
    }else
    {
        //thêm thất bại
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("category");
    }
?>