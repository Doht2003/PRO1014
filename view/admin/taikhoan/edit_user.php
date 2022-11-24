<div class="nen">
    <div class="edit">
        <form action="index.php?act=update_user" method="post" enctype="multipart/form-data">
            <table class="form">
                <h1>Sửa tài khoản</h1>
                <tr>
                    <td>Mã tài khoản</td>

                    <input type="hidden" name="ma_tk" value="<?= $user['ma_tk'] ?>">
                </tr>
                <tr>
                    <td><input type="text" disabled value="<?= $user['ma_tk'] ?>"></td>
                </tr>
                <tr>
                    <td>Tên đăng nhập</td>
                    <input type="hidden" name="username" value="<?= $user['username'] ?>">
                </tr>
                <tr>
                    <td><input type="text" disabled value="<?= $user['username'] ?>"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                </tr>
                <tr>
                    <td><input type="text" name="mat_khau" value="<?= $user['mat_khau'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['mat_khau'])) : ?>
                            <div class="loisuauser">
                                <?= $_SESSION['errors']['mat_khau'] ?>
                            </div>

                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Avatar</td>
                </tr>
                <tr>
                    <td><img src="../view/img/<?= $user['avt'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg" value="<?= $user['avt'] ?>">
                <tr>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>

                </tr>
                <tr>
                    <td><input type="text" name="ho_ten" value="<?= $user['ho_ten'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['ho_ten'])) : ?>
                        <div class="loisuauser">
                            <?= $_SESSION['errors']['ho_ten'] ?>
                    </div>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>

                </tr>
                <tr>
                    <td><input type="text" name="email" value="<?= $user['email'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['email'])) : ?>
                        <div class="loisuauser">
                            <?= $_SESSION['errors']['email'] ?>
                    </div>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>

                </tr>
                <tr>
                    <td><input type="text" name="dia_chi" value="<?= $user['dia_chi'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['dia_chi'])) : ?>
                        <div class="loisuauser">
                            <?= $_SESSION['errors']['dia_chi'] ?>
                            </div>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>

                </tr>
                <tr>
                    <td><input type="text" name="sdt" value="<?= $user['sdt'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['sdt'])) : ?>
                        <div class="loisuauser">
                            <?= $_SESSION['errors']['sdt'] ?>
                    </div>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Vai trò</td>

                </tr>
                <tr>
                    <td><select class="trong" name="ma_vt">
                            <?php foreach ($vaitro as $vaitro) : ?>
                                <option value="<?= $vaitro['ma_vt'] ?>" <?= ($vaitro['ma_vt'] == $user['vai_tro']) ? "selected" : "" ?>><?= $vaitro['ten_vt'] ?></option>
                            <?php endforeach ?>
                        </select></td>
                </tr>

                <tr>
                    <td><button type="submit" name="update_user">Sửa</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>