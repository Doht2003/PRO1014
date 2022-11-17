<?php

    function show_doanhthu(){
        include '../ketnoi/ketnoi.php';
        $sql = "SELECT * FROM doanhthu order by ngay desc ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $doanhthu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doanhthu;      
    }
    function show_doanhthu_ngay($ngay){
        include '../ketnoi/ketnoi.php';
        $sql = "SELECT * FROM doanhthu JOIN tbl_order ON tbl_order.ngayhoanthanhdonhang = doanhthu.ngay WHERE ngay = '$ngay' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $doanhthu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doanhthu; 
    }
    function bieude_doanhthu(){
        include '../ketnoi/ketnoi.php';
        $sql = "SELECT * FROM doanhthu  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $doanhthu = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doanhthu; 
    }
?>