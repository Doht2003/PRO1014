<div class="nen">

   <div class="listchung">
        <h1>Danh sách bình luận</h1>


            <table class="list">

                <tr>
                    <th>Mã bình luận</th>
                    <th colspan="2">Người bình luận</th>
                    <th>Ngày bình luận</th>
                    <th>Nội dung</th>
                    <th colspan="3" >Chức năng</th>
                </tr>
                <?php foreach ($chitiet_binhluan as $value) : ?>
                    <tr>
                        <td><?= $value['binhluan_id'] ?></td>
                        <td><img class="anhuser" src="../view/img/<?= $value['img'] ?>" alt=""></td>
                        <td><?= $value['hovaten'] ?></td>
                        <td><?= $value['ngaybl'] ?></td>
                        <td><?= $value['noidung'] ?></td>
                        <td><button id="xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không ?')"  ><a href="index.php?act=xoa_binhluan&binhluan_id=<?=$value['binhluan_id']?>&product_id=<?=$value['product_id']?>">Xóa</a></button></td>
                    
                        <div class="detail_binhluan">
                        <?php foreach($binhluan_co_traloi as $binhluancotraloi) :?>
                                <?php if($binhluancotraloi['binhluan_id'] == $value['binhluan_id']) : ?>
                                    <td><button id= "binhluan_traloi"  ><a href="index.php?act=show_rep_theo_binhluan&binhluan_id=<?=$value['binhluan_id']?>">Các câu trả lời</a></button></td>
                                    <?php break;?>
                                    <?php endif?>
                            <?php endforeach ?>
                        </div>
                        
                        
                    </tr>
                <?php endforeach ?>
            </table>

    </div>
   </div>
