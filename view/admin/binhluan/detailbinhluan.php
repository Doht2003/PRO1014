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
                        <td><?= $value['ma_bl'] ?></td>
                        <td><img class="anhuser" src="../view/img/<?= $value['avt'] ?>" alt=""></td>
                        <td><?= $value['ho_ten'] ?></td>
                        <td><?= $value['ngay_bl'] ?></td>
                        <td><?= $value['noi_dung'] ?></td>
                        <td><button id="xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không ?')"  ><a href="index.php?act=xoa_binhluan&ma_bl=<?=$value['ma_bl']?>&san_pham=<?=$value['san_pham']?>">Xóa</a></button></td>
                    
                        <div class="detail_binhluan">
                        <?php foreach($binhluan_co_traloi as $binhluancotraloi) :?>
                                <?php if($binhluancotraloi['ma_bl'] == $value['ma_bl']) : ?>
                                    <td><button id= "binhluan_traloi"  ><a href="index.php?act=show_rep_theo_binhluan&ma_bl=<?=$value['ma_bl']?>">Các câu trả lời</a></button></td>
                                    <?php break;?>
                                    <?php endif?>
                            <?php endforeach ?>
                        </div>
                        
                        
                    </tr>
                <?php endforeach ?>
            </table>

    </div>
   </div>
