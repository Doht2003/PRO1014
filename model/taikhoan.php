<?php
    function checkuser($username,$mat_khau){
        include './controller/controller.php';
        $sql = "SELECT * FROM taikhoan WHERE username = '$username' AND mat_khau = '$mat_khau'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $account = $stmt->fetch(PDO::FETCH_ASSOC);
        return $account;
    }
    function dangky($username,$mat_khau,$repassword,$ho_ten,$email,$dia_chi,$sdt,$file){
        include './controller/controller.php';
        $errors = [];
        if ($file['size'] > 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
                $errors['img'] = "Không đúng định dạnh ảnh";
            } else {
                $img = $file['name'];
            }
        }
        else{
            $errors['img'] = "Ảnh không được để trống";
        }
        if($username== ""){
            $errors['username'] = "Bạn chưa nhập username";
        }  
        else if($username!= " "){
            for($i=0;$i < strlen($username);$i++){
               if($username[$i] == " "){
                $errors['username'] = "Tên đăng nhập Không được chứa khoảng trắng";
                
               }
            }
            $sql = "SELECT * FROM taikhoan ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $account = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($account as $check){
                if($username==$check['username']){
                    $errors['username'] = "Tên đăng nhập đã tồn tại";
                }
            }
        }
        if($mat_khau == ""){
            $errors['mat_khau'] = "Bạn chưa nhập mật khẩu";
        }
        else if($mat_khau != ""){
            for($i=0;$i < strlen($mat_khau);$i++){
               if($mat_khau[$i] == " "){
                $errors['mat_khau'] = "Mật khẩu Không được chứa khoảng trắng";
                
               }
            }
        }
        else if( strlen($mat_khau) < 3){
            $errors['mat_khau'] = "Mật khẩu phải lớn hơn 3 ký tự";
        }
        else if($password != $repassword){
            $errors['repassword'] = "Mật khẩu không trùng khớp";
        }
        if($email == ""){
            $errors['email'] = "Email không được để trống";
        }
        else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email không đúng định dạng";
        }
        else if($email != ""){
            $sql = "SELECT email FROM taikhoan  WHERE  email = '$email' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_sdt = $stmt->fetch(PDO::FETCH_ASSOC);
            if($check_sdt){
                $errors['email'] = "Email đã tồn tại";
            }
        }
        if($ho_ten == ""){
            $errors['ho_ten'] = "Họ và tên không được để trống";
        }
        if($dia_chi == ""){
            $errors['dia_chi'] = "Địa chỉ không được để trống";
        }
        if($sdt == ""){
            $errors['sdt'] = "Số điện thoại không được để trống";
        }
        else if($sdt != ""){
            $sql = "SELECT sdt FROM taikhoan  WHERE sdt = '$sdt' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_sdt = $stmt->fetch(PDO::FETCH_ASSOC);
            if($check_sdt){
                $errors['sdt'] = "Số điện thoại đã tồn tại";
            }
        }
        // $sdt = '/^0[0-9]{8}$/';
        // if(!preg_match($sdt,$sdt)){
        //     $errors['sdt'] = "Số điện thoại không đúng định dạng";
        // }
        // $_SESSION['errors'] =  $errors;
       if(! $errors ){
        $sql = "INSERT INTO taikhoan(username,mat_khau,ho_ten,email,dia_chi,sdt,avt) VALUES ('$username','$mat_khau','$ho_ten','$email','$dia_chi','$sdt','$avt') ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], './view/img/' . $avt);
       }
        
    }
    function quenmatkhau($email,$username){
        include './controller/controller.php';
        $errors = [];
        if($username == ""){
            $errors['username'] = "Bạn chưa nhập tên đăng nhập";
        }
        if($email == ""){
            $errors['email'] = "Email không được để trống";
        }
        else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email không đúng định dạng";
        }
        $_SESSION['errors'] =  $errors;
        if(!$errors){
            $sql = "SELECT * FROM taikhoan ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $account = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($account as $check){
                if($email == $check['email'] && $username == $check['username']){
                    $_SESSION['thongbao']  = $check['mat_khau'];
                    break;
                }
                else{
                    $_SESSION['thongbao'] = "Email hoặc Tên đăng nhập không tồn tại";
                }
            }
        }
       
    }
    function show_user(){
        include '../controller/controller.php';
        $sql = "SELECT ma_tk,mat_khau,email,ho_ten,sdt,avt,dia_chi,username,vai_tro.ma_vt,vai_tro.ten_vt FROM taikhoan JOIN vai_tro ON vai_tro.ma_vt=taikhoan.vai_tro  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    function delete_user($ma_tk){
        include '../controller/controller.php';
        $sql = "SELECT taikhoan.ma_tl, binhluan.ma_bl FROM taikhoan JOIN binhluan ON binhluan.ma_tk = taikhoan.ma_tk WHERE taikhoan.ma_tk = '1'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $list = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        foreach($list as $bl_id ){
            $id = $bl_id['ma_bl'];
            $sql = "DELETE FROM feedback  WHERE ma_bl = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        $sql = "DELETE FROM binhluan  WHERE ma_kt = '$ma_tk'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM feedback  WHERE ma_kt = '$ma_tk'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM cart  WHERE ma_kt = '$ma_tk'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
       

        $sql = "DELETE FROM taikhoan  WHERE ma_kt = '$ma_tk'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function edit_user($ma_tk){
        include '../controller/controller.php';
        $sql = "SELECT * FROM taikhoan WHERE ma_tk='$ma_tk'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    function show_vaitro(){
        include '../controller/controller.php';
        $sql = "SELECT * FROM vai_tro ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $vaitro = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $vaitro;
    }
    function update_user($ma_tk,$username,$mat_khau,$ho_ten, $email,$dia_chi,$sdt,$vaitro,$file,$avt){
        include '../controller/controller.php';
        $errors = [];
        if ($file['size'] > 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
                $errors['avt'] = "Không đúng định dạnh ảnh";
            } else {
                $avt = $file['name'];
            }
        }
        if($mat_khau == ""){
            $errors['mat_khau'] = "Bạn chưa nhập mật khẩu";
        }
        else if( strlen($mat_khau) < 3){
            $errors['mat_khau'] = "Mật khẩu phải lớn hơn 3 ký tự";
        }
        if($email == ""){
            $errors['email'] = "Email không được để trống";
        }
        else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email không đúng định dạng";
        }
        else{
            $sql = "SELECT email FROM taikhoan WHERE ma_tk !='$ma_tk' AND  email ='$email' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_email = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($check_email) {
                $errors['email'] = "Email đã tồn tại";
            }    
        }
        if($ho_ten == ""){
            $errors['ho_ten'] = "Họ và tên không được để trống";
        }
        if($dia_chi == ""){
            $errors['dia_chi'] = "Địa chỉ không được để trống";
        }
        if($sdt == ""){
            $errors['sdt'] = "Số điện thoại không được để trống";
        }
        // $sdt = '/^0[0-9]{8}$/';
        // if(!preg_match('/^0[0-9]{8}$/',$sdt)){
        //     $errors['sdt'] = "Số điện thoại không đúng định dạng";
        // }
        // $_SESSION['errors'] =  $errors;
       if(!$errors){
        $sql = "UPDATE taikhoan SET ma_tk = '$ma_tk',username='$username',mat_khau = '$mat_khau',ho_ten='$ho_ten',email='$email',dia_chi='$dia_chi',sdt='$sdt',vai_tro='$vaitro',avt='$avt'WHERE ma_tk = '$ma_tk'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], '../view/img/' . $avt);
       }
      
    }
    function doimatkhau($username,$old_password,$new_password,$re_new_password){
        include './controller/controller.php';
        $errors = [];
        if($username== ""){
            $errors['username'] = "Bạn chưa nhập Tên đăng nhập";
        }  
        else if($username!= " "){
            for($i=0;$i < strlen($username);$i++){
               if($username[$i] == " "){
                $errors['username'] = "Tên đăng nhập Không được chứa khoảng trắng";
                
               }
        }
            $sql = "SELECT username FROM taikhoan WHERE username = '$username' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_username = $stmt->fetch(PDO::FETCH_ASSOC);
          
                if($check_username){
                    $errors['username'] = "Tên đăng nhập không tồn tại";
                }
        }
        if($old_password == ""){
            $errors['old_password'] = "Bạn chưa nhập password cũ";
        }
        else if($old_password != ""){
            for($i=0;$i < strlen($old_password);$i++){
               if($old_password[$i] == " "){
                $errors['old_password'] = "Mật khẩu Không được chứa khoảng trắng";     
               }
            }
            $sql = "SELECT password FROM taikhoan WHERE password = '$old_password' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_password = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$check_password){
                $errors['old_password'] = "Mật khẩu không đúng";  
            }
        }
        if($new_password == ""){
            $errors['new_password'] = "Bạn chưa nhập mật khẩu mới";
        }
        if(strlen($new_password)<3){
            $errors['new_password'] = "Mật khẩu phải lớn hơn 3 ký tự";
        }
        else if($new_password != ""){
            for($i=0;$i < strlen($new_password);$i++){
               if($new_password[$i] == " "){
                $errors['new_password'] = "Mật khẩu Không được chứa khoảng trắng";     
               }
            }
        }

        if($re_new_password == ""){
            $errors['re_new_password'] = "Bạn chưa nhập lại mật khẩu mới";
        }
        else if($re_new_password != $new_password){
            $errors['re_new_password'] = "Không khớp với mật khẩu mới";
        }
        $_SESSION['error_doimk'] = $errors;
        if(!$errors){
            $sql = " UPDATE taikhoan SET password = '$new_password' WHERE username = '$username' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
    function capnhat_tk( $ma_tk,$ho_ten,$email,$sdt,$dia_chi,$file,$old_img){
        include './controller/controller.php';
        $errors = [];
        $img = $old_img;
        if ($file['size'] > 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
                $errors['img'] = "Không đúng định dạnh ảnh";
            } else {
                $img = $file['name'];
            }
        }
        if($email == ""){
            $errors['email'] = "Email không được để trống";
        }
        else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email không đúng định dạng";
        }
        else{
            $sql = "SELECT email FROM taikhoan WHERE ma_tk !='$ma_tk' AND  email ='$email' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_email = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($check_email) {
                $errors['email'] = "Email đã tồn tại";
            }    
        }
        if($ho_ten == ""){
            $errors['ho_ten'] = "Họ và tên không được để trống";
        }
        if($dia_chi == ""){
            $errors['dia_chi'] = "Địa chỉ không được để trống";
        }
        if($sdt == ""){
            $errors['sdt'] = "Số điện thoại không được để trống";
        }
        // $sdt = '/^0[0-9]{8}$/';
        // if(!preg_match($sdt,$sdt)){
        //     $errors['sdt'] = "Số điện thoại không đúng định dạng";
        // }
        $_SESSION['errors'] =  $errors;
       if(! $errors ){
        $sql = " UPDATE taikhoan set ho_ten = '$ho_ten', email='$email',dia_chi='$dia_chi',sdt='$sdt', img='$img' WHERE ma_tk = '$ma_tk'  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], './view/img/' . $img);
       }
    }
    function show_tt_theo_user($ma_tk){
        include './controller/controller.php';
        $sql = "SELECT * FROM taikhoan WHERE ma_tk = '$ma_tk' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    function top3khachhang_muanhieu(){
        include '../controller/controller.php';
        $sql = "SELECT taikhoan.ho_ten, taikhoan.avt,tbl_order.ma_tk, taikhoan.dia_chi ,  COUNT(tbl_order.ma_tk) as 'solanmua' FROM tbl_order JOIN taikhoan ON taikhoan.ma_tk = tbl_order.ma_tk GROUP by tbl_order.ma_tk ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }