<div class="content">
    <?php if (!isset($_SESSION['user'])) : ?>
        <div class="cart_error">
            <p>Bạn cần đăng nhập để thực hiện chức năng này</p>
            <button type="button"><a href="index.php?act=vao_trang_dangnhap">Đăng nhập</a></button>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION['user'])) : ?>
        <?php if (empty($_SESSION['cart']) ) { ?>
            <div class="cart_error">
                <p>Chưa có sản phẩm nào trong giỏ hàng</p>
                <button type="button"><a href="index.php">QUAY TRỞ LẠI TRANG CHỦ</a></button>
            </div>
        <?php } else { ?>
            <script>
                function tru(i) {
                    document.getElementsByClassName("so")[i].value--;
                    if (document.getElementsByClassName("so")[i].value <= 0) {
                        alert("Số lượng phải lớn hơn 0");
                        document.getElementsByClassName("so")[i].value = 1;
                    }
                }

                function plus(i) {
                    document.getElementsByClassName("so")[i].value++;
                    if (document.getElementsByClassName("so")[i].value <= 0) {
                        alert("Số lượng phải lớn hơn 0");
                        document.getElementsByClassName("so")[i].value = 1;
                    }
                    

                }
            </script>
                <div class="bang">
                    <div class="ke">
                    
                        <table class="table_cart">
                            <tr class="table_cart_tr">
                                <th colspan="2">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                           
                            <?php
                            $u = -1;
                            $thanhtien = 0
                            ?>
                            <?php
                            $tong = 0;
                            ?>
                            <form action="index.php?act=capnhat_cart&idcart=0" method="post">
                            <?php foreach ($_SESSION['cart']  as $cart) : ?>
                                
                                <?php
                                $u++;
                                ?>
                                <tr>
                                    <td><img height="70px" src="./view/img/<?= $cart[3] ?>" alt=""></td>
                                    <td id=" cart_tensp"><?= $cart[1] ?></td>
                                    <td class="cart_gia"><?= format_currency($cart[2]) . "<u>đ</u>"   ?></td>
                                    <td class="dacbiet">
                                    
                                        <div class=" chucnang">
                                            <div class="soluong">
                                                <button id="cong" type="button" onclick="tru(<?= $u ?>)">-</button>
                                                <input class="so"  name="soluong[]" type="number" value="<?= $cart[4] ?>" min="1">
                                                <button id="cong" type="button" onclick="plus(<?= $u ?>)">+</button>
                                            </div>
                                    </td>

                                    <?php

                                    $thanhtien = $cart[4] * $cart[2];

                                    ?>
                                    <td>
                                        <div class="thanhtien"> <?= format_currency($thanhtien) ?> </div>
                                    </td>
                                    
                                    <td id="cart_chucnang"><button id="delete_cart"><a href="index.php?act=deleteCart&idcart=<?= $u ?>">Xóa</a></button></td>
                                </tr>
                                
                                <?php
                                $tong += $thanhtien;
                                ?>
                            <?php endforeach ?>
                            
                           
                        </table>
                        <td id="cart_chucnang" colspan="2"><button type="submit" class="capnhat_cart" name="caphnhatgiohang">Cập nhật giỏ hàng</button></td>
                        <?php if(isset($_SESSION['capnhatgiohang'])) :?><td > <span class="tbcart"><?=$_SESSION['capnhatgiohang']?></span> </td>  <?php endif?>  
                            <?php
                                unset($_SESSION['capnhatgiohang']);
                            ?>
                        <?php if(isset( $_SESSION['checksoluong'])) :?><td > <span class="tbcart"><?= $_SESSION['checksoluong']?></span> </td>  <?php endif?>  
                            <?php
                                unset( $_SESSION['checksoluong']);
                            ?>
                        </form>
                    </div>
                    <div class="cong_gio_hang">
                        <table>
                            <tr>
                                <th colspan="2">Cộng giỏ hàng</th>
                            </tr>
                            <tr>
                                <td class="left">Tổng</td>
                                <td class="right"><?= format_currency($tong) . "<u>đ</u>"  ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><button  name="thanhtoan"><a href="index.php?act=vao_trang_xacnhan_muahang">TIẾN HÀNH THANH TOÁN</a></button></td>
                            </tr>
                        </table>
                    </div>

                </div>
            <?php } ?>
        <?php endif ?>

</div>