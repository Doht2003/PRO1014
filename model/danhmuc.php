<?php
function add($cate_name)
{
    include '../controller/controller.php';
    $error = [];
    if ($cate_name == "") {
        $error['cate_name'] = "Bạn chưa nhập tên danh mục";
    } 
    else if($cate_name != " ") {
        $sql = "SELECT cate_name FROM loai_sp WHERE cate_name ='$cate_name'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $check_cate_name = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($check_cate_name) {
            $error['cate_name'] = "Tên danh mục đã tồn tại";
        }    
    }
    $_SESSION['cate_error'] = $error;
       
    if(!$error){   
        $sql = "INSERT INTO  loai_sp(cate_name) values('$cate_name')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }    
}
function delete($id)
{
    include '../controller/controller.php';
    $sql = " UPDATE products SET ma_loai = '48' WHERE ma_loai = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($sql) {
        $sql = "DELETE FROM loai_sp WHERE ma_loai = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}
function edit($id)
{
    include '../controller/controller.php';
    $sql = "SELECT * FROM  loai_sp  WHERE ma_loai = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cate = $stmt->fetch(PDO::FETCH_ASSOC);
    return $cate;
}
function updatedm($ma_loai, $cate_name)
{
    include '../controller/controller.php';
    $error = [];
    if ($cate_name == "") {
        $error['cate_name'] = "Bạn chưa nhập tên danh mục";
    } 
    else if($cate_name != " ") {
        $sql = "SELECT cate_name FROM loai_sp WHERE ma_loai !='$ma_loai' AND  cate_name ='$cate_name' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $check_cate_name = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($check_cate_name) {
            $error['cate_name'] = "Tên danh mục đã tồn tại";
        }    
    }
    $_SESSION['cate_error'] = $error;
       
    if(!$error){   
        $sql = "UPDATE   loai_sp set  cate_name = ('$cate_name') WHERE ma_loai = '$ma_loai '";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }    
  
}
function showdm()
{
    include '../controller/controller.php';
    $sql = "SELECT * FROM loai_sp order by ma_loai desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cates;
}
function showdm_user()
{
    include './controller/controller.php';
    $sql = "SELECT * FROM loai_sp order by ma_loai desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cates;
}
function thongke_dm()
{
    include '../controller/controller.php';
    $sql = "SELECT cate_name , COUNT(loai_sp.ma_loai) as 'soluong' FROM loai_sp JOIN products ON products.ma_loai=loai_sp.ma_loai GROUP BY cate_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cates;
}
