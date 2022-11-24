<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/style/trangchu.css">
    <!-- <link rel="stylesheet" href="./view/style/gioithieu.css"> -->
    <link rel="stylesheet" href="./view/icon/fontawesome-free-6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./view/style/responsive.css">
    <?php
    function format_currency($n = 0)
    {
        $n = (string)$n;
        $n = strrev($n);
        $res = '';
        for ($i = 0; $i < strlen($n); $i++) {
            if ($i % 3 == 0 && $i != 0) {
                $res .= '.';
            }
            $res .= $n[$i];
        }
        $res = strrev($res);
        return $res;
    }
    ?>

</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="./index.php"><img src="./view/img/logo.png" alt=""></a>
            </div>
            <div class="trai">
                <!-- <div class="logo">
                    <img src="./view/img/logo.png" alt="">
                </div> -->
                <ul>
                    <li><a href="index.php?act=trangchu">Trang chủ</a></li>
                    <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                    <!-- <li><a href="">Phiếu giảm giá</a></li> -->
                    <li><a href="index.php?act=phanhoi">Phản hồi</a></li>
                </ul>
            </div>
            <div class="phai">
                <a href="index.php?act=viewcart"><i id="cart" class="fa-solid fa-cart-shopping"></i></a>

                <?php if (isset($_SESSION['user'])) {
                    extract($_SESSION['user']);
                ?>
                    <ul class="user">
                        <li class="an"><a class="tenuser" href="#">
                                <div class="chao">Chào:</div> <img src="/duan1/PRO1014/view/img/<?= $avt ?>" alt="">
                                <div class="chao"> <?= $ho_ten ?> </div> <i id="muiten" class="fa-solid fa-chevron-down"></i>
                            </a>
                            <ul>
                                <li><a href="">Thông tin tài khoản</a></li>
                                <li><a href="">Đổi mật khẩu</a></li>
                                <?php if ($vai_tro == 1) : ?>
                                    <li><a href="admin/index.php">Trang quản trị</a></li>
                                <?php endif ?>
                                <li><a href="index.php?act=dangxuat">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <button><a href="./index.php?act=vao_trang_dangnhap">Tài khoản</a></button>
                <?php } ?>
            </div>
            <div class="bars_nav">

                <label for="nav-mobile-input" class="nav_bars-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </label>
                <input type="checkbox" hidden class="nav_input" id="nav-mobile-input">
                <label for="nav-mobile-input" class="nav_overlay">
                </label>
                <nav class="nav_mobile">
                    <div class="nav_mobile-close">
                        <label for="nav-mobile-input" class="nav_mobile-close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z" />
                            </svg>
                        </label>
                    </div>
                    <ul>
                        <li><a href="index.php?act=trangchu">Trang chủ</a></li>
                        <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                        <!-- <li><a href="">Phiếu giảm giá</a></li> -->
                        <li><a href="index.php?act=phanhoi">Phản hồi</a></li>
                        <li><a href="index.php?act=viewcart">Giỏ hàng </a></li>
                        <li><a href="index.php?act=vao_trang_dangky">Tài khoản</a></li>
                    </ul>
                </nav>

            </div>


        </header>
        <!-- <div class="nav_overlay">
        </div> -->