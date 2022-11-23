<div class="nen">
    
    <div class="listchung">
        <h1>Thống kê danh mục</h1>
        <table class="list" >
           <thead>
           <tr>
                <th>Ngày</th>
                <th>Mã đơn hàng</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt hàng</th>
                <th>Ngày hoàn thành đơn hàng</th>
                <th>Tổng tiền đơn hàng</th>
                <th>Chức năng</th>
            </tr>
           </thead>
           <tbody>
           <?php foreach ($detail_doanhthu as $detail_doanhthu_value) : ?>
                <tr>
                    <td id="ngay"><?= $detail_doanhthu_value['ngay'] ?></td>
                    <td><?= $detail_doanhthu_value['ma_donhang'] ?></td>
                    <td><?= $detail_doanhthu_value['ho_ten'] ?></td>
                    <td><?= $detail_doanhthu_value['sdt'] ?></td>
                    <td id="doanhthu_diachi"><?= $detail_doanhthu_value['address'] ?>
                    <td><?= $detail_doanhthu_value['ngaydathang'] ?></td>
                    <td><?= $detail_doanhthu_value['ngayhoanthanhdonhang'] ?></td>
                    <td><?= format_currency($detail_doanhthu_value['tong']) . " VNĐ" ?></td>
                    <td><button id="sua"><a href="index.php?act=chitiet_donhang&order_id=<?=$detail_doanhthu_value['order_id']?>">Chi tiết</a></button></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <th colspan="7" rowspan="2">Tổng</th>
                <th><?= format_currency($detail_doanhthu_value['tongdoanhthu']) . " VNĐ"  ?></th>
                <th></th>
            </tr>
           </tbody>
        </table>
    </div>
</div>