<?php
    function checkuser($username,$mat_khau){
        include './controller/controller.php';
        $sql = "SELECT * FROM taikhoan WHERE username = '$username' AND mat_khau = '$mat_khau'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $account = $stmt->fetch(PDO::FETCH_ASSOC);
        return $account;
    }
    function dangky($username,$mat_khau,$repassword,$hovaten,$email,$address,$sdt,$file){
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
        if($password == ""){
            $errors['password'] = "Bạn chưa nhập password";
        }
        else if($password != ""){
            for($i=0;$i < strlen($password);$i++){
               if($password[$i] == " "){
                $errors['password'] = "Mật khẩu Không được chứa khoảng trắng";
                
               }
            }
        }
        else if( strlen($password) < 3){
            $errors['password'] = "Password phải lớn hơn 3 ký tự";
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
        if($hovaten == ""){
            $errors['hovaten'] = "Họ và tên không được để trống";
        }
        if($address == ""){
            $errors['address'] = "Địa chỉ không được để trống";
        }
        if($sdt == ""){
            $errors['sdt'] = "Số điện thoại không được để trống";
        }
        else if($sdt != ""){
            $sql = "SELECT tel FROM taikhoan  WHERE tel = '$sdt' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_sdt = $stmt->fetch(PDO::FETCH_ASSOC);
            if($check_sdt){
                $errors['sdt'] = "Số điện thoại đã tồn tại";
            }
        }
        $tel = '/0\d{9,10}/';
        if(!preg_match($tel,$sdt)){
            $errors['tel'] = "Số điện thoại không đúng định dạng";
        }
        $_SESSION['errors'] =  $errors;
       if(! $errors ){
        $sql = "INSERT INTO taikhoan(username,password,hovaten,email,address,tel,img) VALUES ('$username','$password','$hovaten','$email','$address','$sdt','$img') ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], './view/img/' . $img);
       }
        
    }
    function quenmatkhau($email,$username){
        include './ketnoi/ketnoi.php';
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
                    $_SESSION['thongbao']  = $check['password'];
                     break;
                }
                else{
                    $_SESSION['thongbao'] = "Email hoặc Tên đăng nhập không tồn tại";
                }
            }
        }
       
    }
    function show_user(){
        include '../ketnoi/ketnoi.php';
        $sql = "SELECT user_id,password,email,hovaten,tel,img,address, username,vaitro.vai_tro, vaitro.vaitro FROM taikhoan JOIN vaitro ON vaitro.vai_tro=taikhoan.vai_tro  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    function delete_user($user_id){
        include '../ketnoi/ketnoi.php';
        $sql = "SELECT taikhoan.user_id, binhluan.binhluan_id FROM taikhoan JOIN binhluan ON binhluan.user_id = taikhoan.user_id WHERE taikhoan.user_id = '1'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $list = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        foreach($list as $bl_id ){
            $id = $bl_id['binhluan_id'];
            $sql = "DELETE FROM feedback  WHERE binhluan_id = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        $sql = "DELETE FROM binhluan  WHERE user_id = '$user_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM feedback  WHERE user_id = '$user_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM cart  WHERE user_id = '$user_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
       

        $sql = "DELETE FROM taikhoan  WHERE user_id = '$user_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function edit_user($user_id){
        include '../ketnoi/ketnoi.php';
        $sql = "SELECT * FROM taikhoan WHERE user_id='$user_id'";
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
    function update_user($user_id,$username,$password,$hovaten, $email,$address,$tel,$vai_tro,$file,$img){
        include '../ketnoi/ketnoi.php';
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
        if($password == ""){
            $errors['password'] = "Bạn chưa nhập password";
        }
        else if( strlen($password) < 3){
            $errors['password'] = "Password phải lớn hơn 3 ký tự";
        }
        if($email == ""){
            $errors['email'] = "Email không được để trống";
        }
        else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email không đúng định dạng";
        }
        else{
            $sql = "SELECT email FROM taikhoan WHERE user_id !='$user_id' AND  email ='$email' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_email = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($check_email) {
                $errors['email'] = "Email đã tồn tại";
            }    
        }
        if($hovaten == ""){
            $errors['hovaten'] = "Họ và tên không được để trống";
        }
        if($address == ""){
            $errors['address'] = "Địa chỉ không được để trống";
        }
        if($tel == ""){
            $errors['tel'] = "Số điện thoại không được để trống";
        }
        $sdt = '/0\d{9,10}/';
        if(!preg_match($sdt,$tel)){
            $errors['tel'] = "Số điện thoại không đúng định dạng";
        }
        $_SESSION['errors'] =  $errors;
       if(!$errors){
        $sql = "UPDATE taikhoan SET user_id = '$user_id',username='$username',password = '$password',hovaten='$hovaten',email='$email',address='$address',tel='$tel',vai_tro='$vai_tro',img='$img'WHERE user_id = '$user_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], '../view/img/' . $img);
       }
      
    }
    function doimatkhau($username,$old_password,$new_password,$re_new_password){
        include './ketnoi/ketnoi.php';
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
    function capnhat_tk( $user_id,$hovaten,$email,$tel,$address,$file,$old_img){
        include './ketnoi/ketnoi.php';
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
            $sql = "SELECT email FROM taikhoan WHERE user_id !='$user_id' AND  email ='$email' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $check_email = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($check_email) {
                $errors['email'] = "Email đã tồn tại";
            }    
        }
        if($hovaten == ""){
            $errors['hovaten'] = "Họ và tên không được để trống";
        }
        if($address == ""){
            $errors['address'] = "Địa chỉ không được để trống";
        }
        if($tel == ""){
            $errors['sdt'] = "Số điện thoại không được để trống";
        }
        $sdt = '/0\d{9,10}/';
        if(!preg_match($sdt,$tel)){
            $errors['tel'] = "Số điện thoại không đúng định dạng";
        }
        $_SESSION['errors'] =  $errors;
       if(! $errors ){
        $sql = " UPDATE taikhoan set hovaten = '$hovaten', email='$email',address='$address',tel='$tel', img='$img' WHERE user_id = '$user_id'  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], './view/img/' . $img);
       }
    }
    function show_tt_theo_user($user_id){
        include './ketnoi/ketnoi.php';
        $sql = "SELECT * FROM taikhoan WHERE user_id = '$user_id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    function top3khachhang_muanhieu(){
        include '../ketnoi/ketnoi.php';
        $sql = "SELECT taikhoan.hovaten, taikhoan.img,tbl_order.user_id, taikhoan.address ,  COUNT(tbl_order.user_id) as 'solanmua' FROM tbl_order JOIN taikhoan ON taikhoan.user_id = tbl_order.user_id GROUP by tbl_order.user_id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }