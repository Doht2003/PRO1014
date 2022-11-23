<?php
function showsp($kyw, $loai_sp)
{
    include '../controller/controller.php';

    $sql = "SELECT ma_sp,ten_sp,gia_sp,hinh_anh,hinh_anh_2,hinh_anh_3,hinh_anh_4,mo_ta,so_luong,ngay_nhap,loai_sp.ma_loai,loai_sp.ten_loai FROM sanpham JOIN loai_sp ON loai_sp.ma_loai = sanpham.loai_sp  ";
    if ($kyw != "") {
        $sql .= " and ten_sp like '%" . $kyw . "%'";
    }
    if ($loai_sp > 0) {
        $sql .= " and sanpham.loai_sp = '$loai_sp'";
    }
    $sql .= " order by ma_sp desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $product;
}
function showsp_theodm($loai_sp)
{
    include './controller/controller.php';
    $sql = "SELECT * from sanpham  where loai_sp = '$loai_sp'  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
function showsp_trangchu()
{
    include './controller/controller.php';

    $sql = "SELECT * FROM sanpham where 1 order by ma_sp desc limit 0,9";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
function show_top10_sp()
{
    include './controller/controller.php';

    $sql = "SELECT * FROM sanpham where 1 order by luot_xem desc limit 0,9";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
function view($id)
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
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
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
        $sql = "INSERT INTO sanpham(ten_sp,gia_sp,mo_ta,hinh_anh,hinh_anh_2,hinh_anh_3,hinh_anh_4,so_luong,loai_sp) VALUES ('$product_name','$price','$img','$img2','$img3','$img4','$description',$quantity,' $cate_id')";
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
    $sql = "DELETE FROM rep_bl WHERE ma_sp = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($sql) {
        $sql = "DELETE FROM binhluan WHERE san_pham = '$id' ";
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
        $sql = "UPDATE  sanpham SET ma_sp = '$ma_sp' , ten_sp = '$product_name' ,gia_sp = '$price',hinh_anh = '$img',hinh_anh_2 = '$img2',hinh_anh_3 = '$img3',hinh_anh_4 = '$img4',mo_ta = '$description',so_luong = '$quantity' ,loai_sp = ' $cate_id'  WHERE ma_sp = '$ma_sp'";
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
    $sql = " SELECT * FROM sanpham WHERE loai_sp = '$iddm' AND ma_sp != '$id' order by RAND() limit 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products_lienquan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products_lienquan;
}
function timsp($kyw)
{
    include './controller/controller.php';
    $sql = " SELECT * FROM sanpham WHERE ten_sp like '%" . $kyw . "%'  order by ma_sp desc   ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
function sanpham_xemnhieunhat(){
    include '../controller/controller.php';
    $sql = " SELECT * FROM sanpham order by luot_xem desc limit 3   ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product_top1_view = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $product_top1_view;
}
function sanphamdcbinhluannhieu(){
    
    include '../controller/controller.php';
    $sql = " SELECT * , COUNT(binhluan.san_pham) as 'sobinhluan' FROM sanpham JOIN binhluan ON binhluan.san_pham= sanpham.ma_sp GROUP BY sanpham.ten_sp order by sobinhluan  DESC LIMIT 5 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $psanphamdcbinhluannhieu = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $psanphamdcbinhluannhieu;
}
