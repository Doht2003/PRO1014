<?php

function gui_binhluan($user_id, $product_id, $noidungbl)
{
    include './ketnoi/ketnoi.php';
    if ($noidungbl == " ") {
        $noidungbl_error = "Nội dung bình luận không được để trống";
    }
    if (!isset($noidungbl_error)) {
        $sql = "INSERT INTO binhluan(user_id,product_id,noidung) VALUES ('$user_id','$product_id','$noidungbl')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}

function show_binhluan($id, $so_sanpham_tren1trang, $trang)
{
    include './ketnoi/ketnoi.php';
    $offset = ($trang - 1) * $so_sanpham_tren1trang;

    $sql = "SELECT binhluan.binhluan_id,binhluan.user_id, taikhoan.img,taikhoan.vaitro_id,taikhoan.hovaten , binhluan.ngaybl ,binhluan.noidung  FROM binhluan  JOIN products ON products.product_id = binhluan.product_id JOIN taikhoan on binhluan.user_id = taikhoan.user_id WHERE products.product_id='$id' order by ngaybl desc LIMIT  " . $so_sanpham_tren1trang . " OFFSET " . $offset . " ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $binhluan;
}
function sotrang($id, $so_sanpham_tren1trang)
{
    include './ketnoi/ketnoi.php';
    $sql = "SELECT product_id, COUNT(binhluan_id) AS 'soluong' FROM binhluan WHERE product_id ='$id'  GROUP BY product_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tong = $stmt->fetch(PDO::FETCH_ASSOC);
    if (is_array($tong)) {
        $sotrang = ceil($tong['soluong'] / $so_sanpham_tren1trang);
        return $sotrang;
    }
}
function delete_binhluan($id_binhluan)
{
    include './ketnoi/ketnoi.php';
    $sql = "DELETE FROM binhluan WHERE binhluan_id = '$id_binhluan' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function delete_binhluan2($id_binhluan)
{
    include './ketnoi/ketnoi.php';
    $sql = "DELETE FROM rep WHERE binhluan_id = '$id_binhluan' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function delete_rep($rep_id)
{
    include './ketnoi/ketnoi.php';
    $sql = "DELETE FROM rep WHERE rep_id = '$rep_id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function guirep($user_id, $product_id, $noidungbl, $binhluan_id)
{
    include './ketnoi/ketnoi.php';
    if ($noidungbl == " ") {
        $noidungbl_error = "Nội dung bình luận không được để trống";
    }
    if (!isset($noidungbl_error)) {
        $sql = "INSERT INTO rep(binhluan_id,user_id,product_id,noidung) VALUES ('$binhluan_id','$user_id','$product_id','$noidungbl')";
        // chuẩn bị
        $stmt = $conn->prepare($sql);
        //Thực thi
        $stmt->execute();
    }
}
function show_rep($id)
{
    include './ketnoi/ketnoi.php';
    $sql = "SELECT rep_id, rep.binhluan_id,rep.user_id, 
        taikhoan.img,taikhoan.hovaten,taikhoan.vaitro_id , rep.ngay_traloi , 
        rep.noidung  FROM rep   JOIN taikhoan on 
        rep.user_id = taikhoan.user_id  JOIN binhluan on rep.binhluan_id = binhluan.binhluan_id 
        WHERE rep.product_id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rep;
}

function list_binhluan()
{
    include '../ketnoi/ketnoi.php';
    $sql = "SELECT products.product_name,products.img,products.product_id, COUNT(binhluan.noidung) AS 'soluong',MIN(binhluan.ngaybl) AS 'cuNhat', MAX(binhluan.ngaybl) AS 'moiNhat' FROM binhluan JOIN products ON products.product_id = binhluan.product_id GROUP BY products.product_id,products.product_name HAVING soluong>0 ORDER BY soluong DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $binhluan;
}
function chitietBinhluan($product_id)
{
    include '../ketnoi/ketnoi.php';
    $sql = "SELECT binhluan.binhluan_id,product_id,taikhoan.hovaten,binhluan.ngaybl,taikhoan.img,binhluan.noidung
         FROM binhluan JOIN taikhoan ON taikhoan.user_id=binhluan.user_id where product_id = '$product_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $chitiet_binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return  $chitiet_binhluan;
}
function checkbinhluan_co_traloi($product_id)
{
    include '../ketnoi/ketnoi.php';
    $sql = "SELECT binhluan_id FROM rep WHERE product_id = $product_id ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $binhluan_co_traloi = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $binhluan_co_traloi;
}
function admin_xoabinhluan($binhluan_id)
{
    include '../ketnoi/ketnoi.php';
    $sql = "DELETE FROM rep WHERE binhluan_id = '$binhluan_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($sql) {
        $sql = "DELETE FROM binhluan WHERE binhluan_id = '$binhluan_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}
function show_rep_theo_binhluan($binhluan_id)
{
    include '../ketnoi/ketnoi.php';
    $sql = "SELECT rep_id, binhluan_id, taikhoan.hovaten,taikhoan.img,noidung,ngay_traloi FROM rep JOIN taikhoan ON taikhoan.user_id=rep.user_id  WHERE binhluan_id= '$binhluan_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rep;
}
function admin_xoa_rep($rep_id)
{
    include '../ketnoi/ketnoi.php';
    $sql = "DELETE FROM rep WHERE rep_id= '$rep_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function dem_binh_luan_theo_sanpham($product_id)
{
    include './ketnoi/ketnoi.php';
    $sql = "SELECT COUNT(binhluan_id) AS 'soluong_binhluan' FROM binhluan WHERE product_id = '$product_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $soluong_binhluan = $stmt->fetch(PDO::FETCH_ASSOC);
    return $soluong_binhluan;
}
