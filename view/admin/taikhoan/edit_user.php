<div class="nen">
    <div class="edit">
        <form action="index.php?act=update_user" method="post" enctype="multipart/form-data">
            <table class="form">
                <h1>Sửa tài khoản</h1>
                <tr>
                    <td>User_id</td>

                    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                </tr>
                <tr>
                    <td><input type="text" disabled value="<?= $user['user_id'] ?>"></td>
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
                    <td><input type="text" name="password" value="<?= $user['password'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['password'])) : ?>
                            <div class="loisuauser">
                                <?= $_SESSION['errors']['password'] ?>
                            </div>

                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Img</td>
                </tr>
                <tr>
                    <td><img src="../view/img/<?= $user['img'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg" value="<?= $user['img'] ?>">
                <tr>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>

                </tr>
                <tr>
                    <td><input type="text" name="hovaten" value="<?= $user['hovaten'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['hovaten'])) : ?>
                        <div class="loisuauser">
                            <?= $_SESSION['errors']['hovaten'] ?>
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
                    <td><input type="text" name="address" value="<?= $user['address'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['address'])) : ?>
                        <div class="loisuauser">
                            <?= $_SESSION['errors']['address'] ?>
                            </div>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>

                </tr>
                <tr>
                    <td><input type="text" name="tel" value="<?= $user['tel'] ?>"></td>
                </tr>
                <tr>
                    <td><?php if (isset($_SESSION['errors']['tel'])) : ?>
                        <div class="loisuauser">
                            <?= $_SESSION['errors']['tel'] ?>
                    </div>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Vai trò</td>

                </tr>
                <tr>
                    <td><select class="trong" name="vaitro_id">
                            <?php foreach ($vaitro as $vaitro) : ?>
                                <option value="<?= $vaitro['vaitro_id'] ?>" <?= ($vaitro['vaitro_id'] == $user['vaitro_id']) ? "selected" : "" ?>><?= $vaitro['vaitro'] ?></option>
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