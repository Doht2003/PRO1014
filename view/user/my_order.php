<div class="content">
    
            <div class="donhang">
            <table class="table_cart">
                <tr class="table_cart_tr">
                    <th >Mã đơn hàng</th>
                    <th id="tenndh">Tên người đặt hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php foreach ( $my_orders  as $my_order) : ?>
                   <tr id="hang">
                    <td><?=$my_order['ma_donhang']?></td>
                    <td id="tenndh"><?=$my_order['ho_ten']?></td>
                    <td><?=$my_order['email']?></td>
                    <td><?=$my_order['sdt']?></td>
                    <td><?=$my_order['dia_chi']?></td>
                    <td><?=$my_order['ngaydathang']?></td>
                    <td><?=$my_order['trangthai']?> 
                           
                        </td>
                    <td><button class="chitiet_order"><a href="index.php?act=chitiet_order&ma_donhang=<?=$my_order['ma_donhang']?>">Chi tiết</a></button></td>
                   </tr>
                <?php endforeach ?>
            </table>
            </div>
</div>