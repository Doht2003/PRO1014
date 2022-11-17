<div class="content">
    <h2 id="dangnhap">Thông tin đơn hàng</h2>
    <?php if (isset($_SESSION['dangkythanhcong'])) { ?>
        <div class="cart_error">
            <p>Cảm ơn quý khách đã đặt hàng! quý khách có thể click nút bên dưới để xem thông tin đơn hàng. </p>
            <button type="button"><a href="index.php?act=vao_donhang">Đơn hàng của tôi</a></button>
        </div>
    <?php } else { ?>
        
        <form class="xacnhanmuahang" action="index.php?act=muahang" method="post">
            <table class="dangky">

                <tr>
                    <td class="ten_input">Người đặt hàng</td>
                </tr>
                <tr>
                    <td colspan="2"><input name="hovaten" type="text" value="<?= $_SESSION['user']['hovaten'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors_muahhang']['hovaten'])) : ?>
                            <?= $_SESSION['errors_muahhang']['hovaten'] ?>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td class="ten_input">Email</td>
                </tr>
                <tr>
                    <td colspan="2"><input name="email" type="text" value="<?= $_SESSION['user']['email'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors_muahhang']['email'])) : ?>
                            <?= $_SESSION['errors_muahhang']['email'] ?>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td class="ten_input">Địa chỉ</td>
                </tr>
                <tr>
                    <td colspan="2"><input name="address" type="text" value="<?= $_SESSION['user']['address'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors_muahhang']['address'])) : ?>
                            <?= $_SESSION['errors_muahhang']['address'] ?>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td class="ten_input">Số điện thoại</td>
                </tr>
                <tr>
                    <td colspan="2"><input name="tel" type="text" value="<?= $_SESSION['user']['tel'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors_muahhang']['tel'])) : ?>
                            <?= $_SESSION['errors_muahhang']['tel'] ?>
                        <?php endif ?>
                    </td>
                </tr>
                <table class="table_cart">
                    <tr class="table_cart_tr">
                        <th colspan="2">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    $u = -1;
                    $thanhtien = 0
                    ?>
                    <?php
                    $tong = 0;
                    ?>
                    <?php foreach ($_SESSION['cart']  as $cart) : ?>
                        <?php
                        $u++;
                        ?>


                        <tr>
                            <td><img height="70px" src="./view/img/<?= $cart[3] ?>" alt=""></td>
                            <td id=" cart_tensp"><?= $cart[1] ?></td>
                            <td class="cart_gia"><?= format_currency($cart[2]) . "<u>đ</u>"   ?></td>
                            <td class="dacbiet">
                                <input class="so" disabled name="soluong" type="number" value="<?= $cart[4] ?>" min="1">
                            </td>

                            <?php

                            $thanhtien = $cart[4] * $cart[2];

                            ?>
                            <?php
                            $tong += $thanhtien;
                            ?>
                            <td>
                                <div class="thanhtien"> <?= format_currency($thanhtien) ?> </div>
                            </td>
                        </tr>



                    <?php endforeach ?>
                    <tr>
                        <th colspan="4">Tổng</th>
                        <th><?= format_currency($tong) ?></th>
                        <input name="tong" type="hidden" value="<?=$tong?>">
                    </tr>
                </table>
                <tr>
                    <td colspan="5"> <button type="submit" name="btn_muahang" class="dk">Xác nhận đặt hàng</button></td>

                </tr>
                <tr>
                    <td class="thongbao">
                        <?php if (isset($_SESSION['thongbao'])) : ?>
                            <?= $_SESSION['thongbao'] ?>
                        <?php endif ?>
                    </td>
                </tr>
                <?php
                $_SESSION['errors_muahhang'] = [];
                ?>
            </table>


        </form>
    <?php } ?>
    <?php unset($_SESSION['dangkythanhcong']) ?>
</div>