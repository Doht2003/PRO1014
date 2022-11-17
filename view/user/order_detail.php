<div class="content">
    <div class="donhang">
        <table class="table_cart">
            <tr class="table_cart_tr">
                <th>Mã đơn hàng</th>
                <th id="tenndh">Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php $tong = 0; ?>
            <?php foreach ($order_details as $order_detail) : ?>
                <tr id="hang">
                    <td><?= $order_detail['order_id'] ?></td>
                    <td id="tenndh"><?= $order_detail['product_name'] ?></td>
                    <td> <img src="./view/img/<?= $order_detail['img'] ?>" height="100px"></td>
                    <td><?= format_currency($order_detail['price']) . " VNĐ" ?></td>
                    <td><?= $order_detail['quantity'] ?></td>
                    <?php $thanhtien = $order_detail['price'] * $order_detail['quantity'];
                    $tong += $thanhtien;
                    ?>
                    <td><?= format_currency($thanhtien) . " VNĐ" ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <th colspan="5">Tổng</th>
                <td><strong><?= format_currency($tong) . " VNĐ" ?></strong></td>
            </tr>
        </table>
    </div>
</div>