<div class="nen">
    <div class="listchung">
        <h1>Danh sách bình luận</h1>

        <form action="" method="post">
            <table class="list">

              <thead>
              <tr>  
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số bình luận</th>
                    <th>Mới nhất</th>
                    <th>Cũ nhất</th>
                    <th>Chức năng</th>
                </tr>
              </thead>
                <tbody>
                <?php foreach ($binhluan as $binhluan) : ?>
                    <tr>
                        <td><img src="../view/img/<?=$binhluan['hinh_anh']?>"  alt="" height="100px"></td>
                        <td><?= $binhluan['ten_sp'] ?></td>
                        <td><?= $binhluan['so_luong'] ?></td>
                        <td><?= $binhluan['moi_nhat'] ?></td>
                        <td><?= $binhluan['cu_nhat'] ?></td>
                        <td><button id="sua"><a href="index.php?act=chitietBinhluan&ma_sp=<?= $binhluan['ma_sp'] ?>">Chi tiết</a></button></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </form>
    </div>
</div>