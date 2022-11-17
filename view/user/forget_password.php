<?php
if (isset($_SESSION['user'])) {
    header("location: index.php");
}
?>
<div class="content">

    <form action="index.php?act=quen_mat_khau" method="post">

        <table class="dangnhap">
            <h2 id="dangnhap">Quên mật khẩu</h2>
            <tr>
                <td class="ten_input" name="username">Tên đăng nhập</td>
            </tr>
            <tr>
                <td colspan="2"><input name="username" type="text" placeholder="Nhập tên đăng nhập của bạn"></td>
            </tr>
            <tr>
                <td><?php if(isset($_SESSION['errors']['username'])) :?>
                        <?=$_SESSION['errors']['username']?>
                <?php endif?></td>
            </tr>
            <tr>
                <td class="ten_input" name="email">Email</td>
            </tr>
            <tr>
                <td colspan="2"><input name="email" type="text" placeholder="Nhập email của bạn"></td>
            </tr>
            <tr>
                <td><?php if(isset($_SESSION['errors']['email'])) :?>
                        <?=$_SESSION['errors']['email']?>
                <?php endif?></td>
            </tr>
            <tr>
                <td class="thongbao">
                    <?php if (isset($_SESSION['thongbao'])) : ?>
                        <?= $_SESSION['thongbao'] ?>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td> <button type="submit" name="gui" class="dn">Gửi</button></td>

            </tr>
            <tr>
                <td class="hoac" colspan="2">
                    <h4><span>Hoặc</span></h4>
                </td>
            </tr>
            <tr>
                <td class="dangky2" colspan="2">Bạn chưa có tài khoản? <a href="index.php?act=vao_trang_dangky">Đăng ký ngay</a></td>
            </tr>
        </table>
    </form>
    <?php unset($_SESSION['thongbao']) ?>
    <?php unset($_SESSION['errors']) ?>
</div>