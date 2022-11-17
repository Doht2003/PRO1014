<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/style/admin.css">
    <link rel="stylesheet" href="../view/icon/fontawesome-free-6.2.0/css/all.min.css">
    <?php
          function format_currency($n = 0){
            $n=(string)$n;
            $n=strrev($n);
            $res='';
            for($i=0;$i<strlen($n);$i++){
                if($i%3==0 && $i!=0){
                    $res.='.';
                }
                $res.=$n[$i];
            }
            $res=strrev($res);
            return $res;
        }
    ?>
</head>

<body>
    <div class="container">
        <div class="box">
            <img src="../view/img/logo.png" alt="">
            <ul>
                <li> <a href="index.php"><i class="fa-solid fa-house"></i> Trang chủ quản trị</a></li>
                <li><a href="index.php?act=showdm"><i class="fa-solid fa-bars"></i> Danh mục</a></li>
                <li><a href="index.php?act=showsp"><i class="fa-solid fa-box"></i> Sản phẩm</a></li>
                <li><a href="index.php?act=showuser"><i class="fa-solid fa-user"></i> Khách hàng</a></li>
                <li><a href="index.php?act=showcommemt"><i class="fa-solid fa-comment"></i> Bình luận</a></li>
                <li><a href="index.php?act=showdonhang"><i class="fa-solid fa-file-invoice-dollar"></i>Đơn hàng</a></li>
            </ul>
        </div>
        <header>

            <div class="phai">

                <?php if (isset($_SESSION['user'])) {
                    extract($_SESSION['user']);
                ?>

                    <ul class="user">
                        <li class="an"><a class="tenuser" href="#">
                                <div class="chao">Chào :</div> <img src="../view/img/<?= $img ?>" alt="">
                                <div class="chao"> <?= $hovaten ?> </div> <i id="muiten" class="fa-solid fa-chevron-down"></i>
                            </a>
                        
                            <ul>    
                                <li><a href="../index.php?act=vao_trang_taikhoan">Thông tin tài khoản</a></li>
                                <li><a href="../index.php?act=vao_trang_doimatkhau">Đổi mật khẩu</a></li> 
                                <li><a href="../index.php?act=vao_donhang">Đơn hàng của tôi</a></li>   
                                <li><a href="../index.php">Trang chủ website</a></li>                           
                                <li><a href="../index.php?act=dangxuat">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>

                <?php
                } else {
                ?>

                    <button><a href="index.php?act=vao_trang_dangnhap">Tài khoản</a></button>
                <?php } ?>
            </div>

        </header>