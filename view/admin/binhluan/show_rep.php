<div class="nen">
    <div class="listchung">
        <h1>Danh sách Trả lời</h1>

        <form action="" method="post">
            <table class="list">

                <thead>
                    <tr>
                        <th>Mã bình luận</th>
                        <th>Mã trả lời</th>
                        <th colspan="2">Người trả lời</th>
                        <th>Nội dung</th>
                        <th>Ngày trả lời</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rep as $rep) : ?>
                        <tr>
                            <td><?= $rep['ma_bl'] ?></td>
                            <td><?= $rep['ma_rep'] ?></td>
                            <td><img class="anhuser" src="../view/img/<?= $rep['avt'] ?>" alt=""></td>
                            <td><?= $rep['ho_ten'] ?></td>
                            <td><?= $rep['noi_dung'] ?></td>
                            <td><?= $rep['ngay_traloi'] ?></td>
                            <td><button id="xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa câu trả lời không ?')" ><a href="index.php?act=admin_xoa_rep&ma_rep=<?= $rep['ma_rep'] ?>&ma_bl=<?=$ma_bl?>">Xóa</a></button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </form>
    </div>
</div>