<div class="nen">
    <div class="listchung">
        <h1>Danh sách tài khoản </h1>
        <table class="list">

          <thead>
          <tr>
                <th>Họ và tên</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Mật khẩu</th>
                <th>Số điện thoại</th>  
                <th>Vai trò</th>
                <th><button id="them"><a href="index.php?act=addsp">Thêm</a></button></th>
            </tr>
          </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?=  $user['ho_ten'] ?></td>
                    <td> <img  class="anhuser" src="../view/img/<?= $user['avt'] ?>" alt=""></td>
                    <td><?=$user['username']?></td>
                    <td><?= $user['mat_khau']?></td>
                    <td><?= $user['sdt']?></td>
                    <td><?= $user['ten_vt'] ?></td>
                    <td  id="chucnang"><button id="sua"><a href="index.php?act=edit_user&ma_tk=<?= $user['ma_tk'] ?>">Sửa</a></button><?php if($ma_tk != $user['ma_tk']):?> <button id="xoa" ><a href="index.php?act=delete_user&ma_tk=<?= $user['ma_tk'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">Xóa</a></button>  <?php endif?></td>

                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>