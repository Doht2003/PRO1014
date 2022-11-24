<?php

function gui_binhluan($tai_khoan, $san_pham, $noidungbl)
{
    include './controller/controller.php';
    if ($noidungbl == " ") {
        $noidungbl_error = "Nội dung bình luận không được để trống";
    }
    if (!isset($noidungbl_error)) {
        $sql = "INSERT INTO binhluan(tai_khoan,san_pham,noi_dung) VALUES ('$tai_khoan','$san_pham','$noidungbl')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}

function show_binhluan($id, $so_sanpham_tren1trang, $trang)
{
    include './controller/controller.php';
    $offset = ($trang - 1) * $so_sanpham_tren1trang;

    $sql = "SELECT binhluan.ma_bl,binhluan.tai_khoan, taikhoan.avt,taikhoan.vai_tro,taikhoan.ho_ten , binhluan.ngay_bl ,binhluan.noi_dung  FROM binhluan  JOIN sanpham ON sanpham.ma_sp = binhluan.san_pham JOIN taikhoan on binhluan.tai_khoan = taikhoan.ma_tk WHERE sanpham.ma_sp='$id' order by ngay_bl desc LIMIT  " . $so_sanpham_tren1trang . " OFFSET " . $offset . " ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $binhluan;
}
function sotrang($id, $so_sanpham_tren1trang)
{
    include './controller/controller.php';
    $sql = "SELECT san_pham, COUNT(ma_bl) AS 'soluong' FROM binhluan WHERE san_pham ='$id'  GROUP BY san_pham";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tong = $stmt->fetch(PDO::FETCH_ASSOC);
    if (is_array($tong)) {
        $sotrang = ceil($tong['soluong'] / $so_sanpham_tren1trang);
        return $sotrang;
    }
}
function delete_binhluan($ma_bl)
{
    include './controller/controller.php';
    $sql = "DELETE FROM binhluan WHERE ma_bl = '$ma_bl' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function delete_binhluan2($ma_bl)
{
    include './controller/controller.php';
    $sql = "DELETE FROM rep_bl WHERE ma_bl = '$ma_bl' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function delete_rep($ma_rep)
{
    include './controller/controller.php';
    $sql = "DELETE FROM rep_bl WHERE ma_rep = '$ma_rep' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function guirep($ma_tk, $ma_sp, $noidungbl, $ma_bl)
{
    include './controller/controller.php';
    if ($noidungbl == " ") {
        $noidungbl_error = "Nội dung bình luận không được để trống";
    }
    if (!isset($noidungbl_error)) {
        $sql = "INSERT INTO rep(ma_bl,ma_tk,ma_sp,noi_dung) VALUES ('$ma_bl','$ma_tk','$ma_sp','$noidungbl')";
        // chuẩn bị
        $stmt = $conn->prepare($sql);
        //Thực thi
        $stmt->execute();
    }
}
function show_rep($id)
{
    include './controller/controller.php';
    $sql = "SELECT ma_rep, rep_bl.ma_bl,rep_bl.ma_tk, 
        taikhoan.avt,taikhoan.ho_ten,taikhoan.vai_tro , rep_bl.ngay_traloi , 
        rep_bl.noi_dung  FROM rep_bl   JOIN taikhoan on 
        rep_bl.ma_tk = taikhoan.ma_tk  JOIN binhluan on rep_bl.ma_bl = binhluan.ma_bl 
        WHERE rep_bl.ma_sp='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rep;
}

function list_binhluan()
{
    include '../controller/controller.php';
    $sql = "SELECT sanpham.ten_sp,sanpham.hinh_anh,sanpham.ma_sp, COUNT(binhluan.noi_dung) AS 'so_luong',MIN(binhluan.ngay_bl) AS 'cu_nhat', MAX(binhluan.ngay_bl) AS 'moi_nhat' FROM binhluan JOIN sanpham ON sanpham.ma_sp = binhluan.san_pham GROUP BY sanpham.ma_sp,sanpham.ten_sp HAVING so_luong>0 ORDER BY so_luong DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $binhluan;
}
function chitietBinhluan($ma_sp)
{
    include '../controller/controller.php';
    $sql = "SELECT binhluan.ma_bl,san_pham,taikhoan.ho_ten,binhluan.ngay_bl,taikhoan.avt,binhluan.noi_dung
         FROM binhluan JOIN taikhoan ON taikhoan.ma_tk=binhluan.tai_khoan where tai_khoan = '$ma_sp'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $chitiet_binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return  $chitiet_binhluan;
}
function checkbinhluan_co_traloi($ma_sp)
{
    include '../controller/controller.php';
    $sql = "SELECT ma_bl FROM rep_bl WHERE ma_sp = $ma_sp ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $binhluan_co_traloi = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $binhluan_co_traloi;
}
function admin_xoabinhluan($ma_bl)
{
    include '../controller/controller.php';
    $sql = "DELETE FROM rep WHERE ma_bl = '$ma_bl'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($sql) {
        $sql = "DELETE FROM binhluan WHERE ma_bl = '$ma_bl'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}
function show_rep_theo_binhluan($ma_bl)
{
    include '../controller/controller.php';
    $sql = "SELECT rep_id, ma_bl, taikhoan.hovaten,taikhoan.img,noidung,ngay_traloi FROM rep JOIN taikhoan ON taikhoan.user_id=rep.user_id  WHERE binhluan_id= '$binhluan_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rep = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rep;
}
function admin_xoa_rep($rep_id)
{
    include '../controller/controller.php';
    $sql = "DELETE FROM rep WHERE rep_id= '$rep_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function dem_binh_luan_theo_sanpham($product_id)
{
    include './controller/controller.php';
    $sql = "SELECT COUNT(ma_bl) AS 'soluong_binhluan' FROM binhluan WHERE san_pham = '$product_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $soluong_binhluan = $stmt->fetch(PDO::FETCH_ASSOC);
    return $soluong_binhluan;
}
