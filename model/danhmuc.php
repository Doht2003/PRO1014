<?php
function add($cate_name)
{
    include '../controller/controller.php';
    $error = [];
    if ($cate_name == "") {
        $error['cate_name'] = "Bạn chưa nhập tên danh mục";
    } 
    else if($cate_name != " ") {
        $sql = "SELECT ten_loai FROM loai_sp WHERE ten_loai ='$cate_name'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $check_cate_name = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($check_cate_name) {
            $error['cate_name'] = "Tên danh mục đã tồn tại";
        }    
    }
    $_SESSION['cate_error'] = $error;
       
    if(!$error){   
        $sql = "INSERT INTO  loai_sp(ten_loai) values('$cate_name')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }    
}
function delete($id)
{
    include '../controller/controller.php';
    $sql = " UPDATE sanpham SET loai_sp = '48' WHERE loai_sp = '$id'";
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
        $sql = "SELECT ten_loai FROM loai_sp WHERE ma_loai !='$ma_loai' AND  ten_loai ='$cate_name' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $check_cate_name = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($check_cate_name) {
            $error['cate_name'] = "Tên danh mục đã tồn tại";
        }    
    }
    $_SESSION['cate_error'] = $error;
       
    if(!$error){   
        $sql = "UPDATE   loai_sp set  ten_loai = ('$cate_name') WHERE ma_loai = '$ma_loai '";
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
    $sql = "SELECT ten_loai , COUNT(loai_sp.ma_loai) as 'so_luong' FROM loai_sp JOIN sanpham ON sanpham.loai_sp=loai_sp.ma_loai GROUP BY ten_loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cates;
}
