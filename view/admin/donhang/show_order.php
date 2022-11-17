<script>
    function trangthai(i,giatribandau){
        if(document.getElementsByClassName('trangthaidonhang')[i].value != giatribandau){
            document.getElementsByClassName('btn_donhang')[i].style.display="block";
        }
        else if(document.getElementsByClassName('trangthaidonhang')[i].value == giatribandau){
            document.getElementsByClassName('btn_donhang')[i].style.display="none";
        }
        
        
    }
</script>
<div class="nen">
    <div class="listchung">
        <h1>Danh sách đơn hàng</h1>

        
            <table class="list">

              <thead>
              <tr>  
                    <th>Mã đơn hàng</th>
                    <th> Người đặt hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th colspan="2">Chức năng</th>
                </tr>
              </thead>
                <tbody>
                    <?php $count = -1; ?>
                <?php foreach ($show_order as $order) : ?>
                    <tr>
                        
                        <td ><?=$order['order_id']?></td>
                        <td><?= $order['hovaten'] ?></td>
                        <td><?= $order['email'] ?></td>
                        <td><?= $order['tel'] ?></td>
                        <td><?= $order['address'] ?></td>
                        <td id="ngaythang"><?= $order['ngaydathang'] ?></td>
                        <?php $count++; ?>
                        <form class="donhang" action="index.php?act=capnhat_donhang" method="post">
                        <input name="order_id" type="hidden" value="<?=$order['order_id']?>">
                        <input type="hidden" name="tong" value="<?=$order['tong']?>">
                        <td><select  <?=($order['status_id']==3)?'disabled': ""?> name="trangtdh" class="trangthaidonhang" onchange="trangthai(<?=$count?>,<?=$order['status_id']?>)">
                            <?php foreach($status as $value) : ?>
                                <option value="<?=$value['status_id']?>"<?=($value['status_id']==$order['status_id'])?'selected':""?>><?=$value['status']?></option>
                            <?php endforeach ?>
                        </select></td>
                        <td><button class="btn_donhang" name="btn_capnhat_donhang" type="submit">Cập nhật</button></td>
                        <td><button id="xoa"><a href="index.php?act=chitiet_donhang&order_id=<?=$order['order_id']?>">Chi tiết</a></button></td>
                        </form>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        
    </div>
</div>