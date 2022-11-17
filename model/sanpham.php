<?php
function showsp($kyw, $ma_loai)
{
    include '../controller/controller.php';

    $sql = "SELECT ma_sp,quantity,product_name,price,img,img_2,img_3,img_4,description,ngaynhap,categories.ma_loai,categories.cate_name FROM sanpham JOIN categories ON categories.ma_loai = sanpham.ma_loai  ";
    if ($kyw != "") {
        $sql .= " and product_name like '%" . $kyw . "%'";
    }
    if ($ma_loai > 0) {
        $sql .= " and sanpham.ma_loai = '$ma_loai'";
    }
    $sql .= " order by ma_sp desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sanpham;
}
function showsp_theodm($ma_loai)
{
    include './controller/controller.php';
    $sql = "SELECT * from sanpham  where loai_sp = '$ma_loai'  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sanpham;
}
function showsp_trangchu()
{
    include './controller/controller.php';

    $sql = "SELECT * FROM sanpham where 1 order by ma_sp desc limit 0,9";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sanpham;
}
function show_top10_sp()
{
    include './controller/controller.php';

    $sql = "SELECT * FROM sanpham where 1 order by luot_xem desc limit 0,9";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sanpham;
}
function luot_xem($id)
{
    include './controller/controller.php';

    $sql = " UPDATE sanpham SET luot_xem = luot_xem + 1 where  ma_sp = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function chitiet_sp($id)
{
    include './controller/controller.php';

    $sql = "SELECT * FROM sanpham where ma_sp = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham = $stmt->fetch(PDO::FETCH_ASSOC);
    return $sanpham;
}
function addsp($product_name, $price, $description, $quantity, $file, $file2, $file3, $file4, $cate_id)
{   
    include '../controller/controller.php';
    $error = [];
    if ($file['size'] > 0) {
        
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
            $error['img'] = "Không đúng định dạnh ảnh";
        } else {
            $img = $file['name'];
        }
    }
    else{
        $error['img'] = "Bạn chưa up ảnh";
    }
    if ($file2['size'] > 0) {
        $ext2 = pathinfo($file2['name'], PATHINFO_EXTENSION);
        $ext2 = strtolower($ext2);
        if ($ext2 != "png" && $ext2 != "jpeg" && $ext2 != "jpg" && $ext2 != "gif") {
            $error['img2'] = "Không đúng định dạnh ảnh";
        } else {
            $img2 = $file2['name'];
        }
    }
    if ($file3['size'] > 0) {
        $ext3 = pathinfo($file3['name'], PATHINFO_EXTENSION);
        $ext3 = strtolower($ext3);
        if ($ext3 != "png" && $ext3 != "jpeg" && $ext3 != "jpg" && $ext3 != "gif") {
            $error['img3'] = "Không đúng định dạnh ảnh";
        } else {
            $img3 = $file3['name'];
        }
    }
    if ($file4['size'] > 0) {
        $ext4 = pathinfo($file4['name'], PATHINFO_EXTENSION);
        $ext4 = strtolower($ext4);
        if ($ext4 != "png" && $ext4 != "jpeg" && $ext4 != "jpg" && $ext4 != "gif") {
            $error['img4'] = "Không đúng định dạnh ảnh";
        } else {
            $img4 = $file4['name'];
        }
    }
    if($quantity == ""){
        $error['quantity'] = "Bạn chưa nhập số lượng"; 
    }
    else if($quantity <=0){
        $error['quantity'] = "Số lượng phải là số dương"; 
    }
    if ($product_name == "") {
        $error['product_name'] = "Bạn chưa nhập tên sản phẩm";
    }
    if ($price == "") {
        $error['price'] = "Bạn chưa nhập giá sản phẩm";
    } else if ($price <= 0) {
        $error['price'] = "Giá phải là số dương";
    }
    $_SESSION['error_product'] = $error;
    if (!$error) {
        $sql = "INSERT INTO sanpham(product_name,price,img,img_2,img_3,img_4,description,quantity,cate_id) VALUES ('$product_name','$price','$img','$img2','$img3','$img4','$description',$quantity,' $cate_id')";
        // chuẩn bị
        $stmt = $conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], '../view/img/' . $img);
        move_uploaded_file($file2['tmp_name'], '../view/img/' . $img2);
        move_uploaded_file($file3['tmp_name'], '../view/img/' . $img3);
        move_uploaded_file($file4['tmp_name'], '../view/img/' . $img4);
    }
}
function deletesp($id)
{
    include '../controller/controller.php';
    $sql = "DELETE FROM rep WHERE ma_sp = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($sql) {
        $sql = "DELETE FROM binhluan WHERE ma_sp = '$id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($sql) {
            $sql = "DELETE FROM sanpham WHERE ma_sp = '$id' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
}
function editsp($id)
{
    include '../controller/controller.php';
    $sql = "SELECT * FROM  sanpham  WHERE ma_sp = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}
function updatesp($ma_sp, $product_name, $price, $file, $file2, $file3, $file4, $img, $img2, $img3, $img4, $description, $quantity, $cate_id)
{
    include '../controller/controller.php';

    $error = [];
    if ($file['size'] > 0) {
        
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
            $error['img'] = "Không đúng định dạnh ảnh";
        } else {
            $img = $file['name'];
        }
    }
    if ($file2['size'] > 0) {
        $ext2 = pathinfo($file2['name'], PATHINFO_EXTENSION);
        $ext2 = strtolower($ext2);
        if ($ext2 != "png" && $ext2 != "jpeg" && $ext2 != "jpg" && $ext2 != "gif") {
            $error['img2'] = "Không đúng định dạnh ảnh";
        } else {
            $img2 = $file2['name'];
        }
    }
    if ($file3['size'] > 0) {
        $ext3 = pathinfo($file3['name'], PATHINFO_EXTENSION);
        $ext3 = strtolower($ext3);
        if ($ext3 != "png" && $ext3 != "jpeg" && $ext3 != "jpg" && $ext3 != "gif") {
            $error['img3'] = "Không đúng định dạnh ảnh";
        } else {
            $img3 = $file3['name'];
        }
    }
    if ($file4['size'] > 0) {
        $ext4 = pathinfo($file4['name'], PATHINFO_EXTENSION);
        $ext4 = strtolower($ext4);
        if ($ext4 != "png" && $ext4 != "jpeg" && $ext4 != "jpg" && $ext4 != "gif") {
            $error['img4'] = "Không đúng định dạnh ảnh";
        } else {
            $img4 = $file4['name'];
        }
    }
    if($quantity == ""){
        $error['quantity'] = "Bạn chưa nhập số lượng"; 
    }
    else if($quantity <=0){
        $error['quantity'] = "Số lượng phải là số dương"; 
    }
    if ($product_name == "") {
        $error['product_name'] = "Bạn chưa nhập tên sản phẩm";
    }
    if ($price == "") {
        $error['price'] = "Bạn chưa nhập giá sản phẩm";
    } else if ($price <= 0) {
        $error['price'] = "Giá phải là số dương";
    }
    $_SESSION['error_product'] = $error;
    if (!$error) {
        $sql = "UPDATE  sanpham SET ma_sp = '$ma_sp' , product_name = '$product_name' ,price = '$price',img = '$img',img_2 = '$img2',img_3 = '$img3',img_4 = '$img4',description = '$description',quantity = '$quantity' ,cate_id = ' $cate_id'  WHERE ma_sp = '$ma_sp'";
        // chuẩn bị
        $stmt = $conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], '../view/img/' . $img);
        move_uploaded_file($file2['tmp_name'], '../view/img/' . $img2);
        move_uploaded_file($file3['tmp_name'], '../view/img/' . $img3);
        move_uploaded_file($file4['tmp_name'], '../view/img/' . $img4);
    }
}
function sanpham_lienquan($id, $iddm)
{
    include './controller/controller.php';
    $sql = " SELECT * FROM sanpham WHERE cate_id = '$iddm' AND ma_sp != '$id' order by RAND() limit 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham_lienquan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sanpham_lienquan;
}
function timsp($kyw)
{
    include './controller/controller.php';
    $sql = " SELECT * FROM sanpham WHERE product_name like '%" . $kyw . "%'  order by ma_sp desc   ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sanpham;
}
function sanpham_xemnhieunhat(){
    include '../controller/controller.php';
    $sql = " SELECT * FROM sanpham order by view desc limit 3   ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product_top1_view = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $product_top1_view;
}
function sanphamdcbinhluannhieu(){
    
    include '../controller/controller.php';
    $sql = " SELECT * , COUNT(binhluan.ma_sp) as 'sobinhluan' FROM sanpham JOIN binhluan ON binhluan.ma_sp= sanpham.ma_sp GROUP BY sanpham.product_name order by sobinhluan  DESC LIMIT 5 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $psanphamdcbinhluannhieu = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $psanphamdcbinhluannhieu;
}
