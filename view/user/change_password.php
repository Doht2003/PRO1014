<?php
if (!isset($_SESSION['user'])) {
    header("location: index.php");
}
?>
<div class="content">

    <form action="index.php?act=doimatkhau" method="post">

        <table class="dangnhap">
            <h2 id="dangnhap">Đổi mật khẩu</h2>
            <tr>
                <td class="ten_input">Tài khoản</td>
            </tr>
            <tr>
                <td colspan="2"><input name="username" type="text" placeholder="Nhập tài khoản của bạn"></td>
            </tr>
            <tr>
                <td class="thongbao">
                    <?php if (isset($_SESSION['error_doimk']['username'])) : ?>

                        <?= $_SESSION['error_doimk']['username'] ?>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td class="ten_input">Mật khẩu cũ</td>
            </tr>
            <tr>
                <td colspan="2"><input name="old_password" type="password" placeholder="Nhập mật khẩu cũ của bạn"></td>
            </tr>
            <tr>
                <td class="thongbao">
                    <?php if (isset($_SESSION['error_doimk']['old_password'])) : ?>

                        <?= $_SESSION['error_doimk']['old_password'] ?>
                    <?php endif ?>
                </td>
            </tr>            
            <tr>
                <td class="ten_input">Mật khẩu mới</td>
            </tr>
            <tr>
                <td colspan="2"><input name="new_password" type="password" placeholder="Nhập mật khẩu mới"></td>
            </tr>
            <tr>
                <td class="thongbao">
                    <?php if (isset($_SESSION['error_doimk']['new_password'])) : ?>

                        <?= $_SESSION['error_doimk']['new_password'] ?>
                    <?php endif ?>
                </td>
            </tr>
            
            <tr>

                <td class="ten_input">Nhập lại mật khẩu mới</td>
            </tr>
            <tr>
                <td colspan="2"><input name="re_new_password" type="password" placeholder="Nhập lại  mật khẩu mới"></td>
            </tr>
            <tr>
                <td class="thongbao">
                    <?php if (isset($_SESSION['error_doimk']['re_new_password'])) : ?>

                        <?= $_SESSION['error_doimk']['re_new_password'] ?>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td class="thongbao">
                    <?php if (isset($_SESSION['doimatkhau_thanhcong'])) : ?>

                        <?= $_SESSION['doimatkhau_thanhcong'] ?>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td class="doimk"> <button type="submit" name="xacnhandoimk" class="dn">Xác nhận</button></td>

            </tr>

        </table>
    </form>
    <?php unset($_SESSION['error_doimk']);
        unset($_SESSION['doimatkhau_thanhcong']);
    ?>
</div>