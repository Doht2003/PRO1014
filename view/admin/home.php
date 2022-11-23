<div class="nen">
    
    <div class="listchung">
        <h1>Doanh thu </h1>
        <table class="list" >
           <thead>
           <tr>
                <th>Ngày</th>
                <th>Doanh thu</th>
                <th>Chức năng</th>
            </tr>
           </thead>
           <tbody>
            <?php $tong= 0?>
           <?php foreach ($doanhthu as $doanhthu_value) : ?>
                <tr>
                    <td><?= $doanhthu_value['ngay'] ?></td>
                    <td><strong><?=format_currency($doanhthu_value['tongdoanhthu']) . " VNĐ"  ?></strong></td>
                    <td><button id="sua"><a href="index.php?act=detail_doanhthu&ngay=<?=$doanhthu_value['ngay']?>">Chi tiêt</a></button></td>
                    <?php $tong +=  $doanhthu_value['tongdoanhthu']?>
                </tr>
            <?php endforeach ?>
                <tr>
                    <th  >Tổng</th>
                    <th><?=format_currency($tong). " VNĐ"?></th>
                    <th></th>
                </tr>
                <tr>
                    <td><button id="sua"><a href="index.php?act=bieudo_doanhthu">Biểu đồ</a></button></td>
                </tr>
           </tbody>
        </table>
    </div>
</div>
<div class="nen3">
    <div class="listchung">
        <h1>Thống kê danh mục</h1>
        <table class="list" >
           <thead>
           <tr>
                <th>Tên danh mục</th>
                <th>Số sản phẩm</th>
            </tr>
           </thead>
           <tbody>
           <?php foreach ($cate as $cate) : ?>
                <tr>
                    <td><?= $cate['ten_loai'] ?></td>
                    <td><?= $cate['so_luong'] ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td><button id="sua"><a href="index.php?act=bieudo_danhmuc">Biểu đồ</a></button></td>
            </tr>
           </tbody>
        </table>
    </div>
</div>


<div class="nen3">
<div class="listchung">
        <h1>Top 3 sản phẩm có nhiều lượt xem nhất</h1>
        <table class="list" >
           <thead>
           <tr> 
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Số lượt xem</th>
            </tr>
           </thead>
           <tbody>
           <?php foreach ($sanpham_top1_view as $value) : ?>
                <tr>
                    <td><?= $value['ma_sp'] ?></td>
                    <td><?= $value['ten_sp'] ?></td>
                    <td><img src="../view/img/<?= $value['hinh_anh'] ?>" height="100px" alt=""></td>
                    <td><?= format_currency($value['gia_sp']) . " VNĐ" ?></td>
                    <td><strong><?= $value['luot_xem'] ?></strong></td>
                </tr>
            <?php endforeach ?>
           </tbody>
        </table>
    </div>
</div>
<div class="nen3">
<div class="listchung">
        <h1>Top 3 khách hàng mua hàng nhiều nhất</h1>
        <table class="list" >
           <thead>
           <tr> 
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Ảnh</th>
                <th>Địa chỉ</th>
                <th>Số lần mua hàng</th>
            </tr>
           </thead>
           <tbody>
           <?php foreach ($khachvip as $value) : ?>
                <tr>
                    <td><?= $value['ma_tk'] ?></td>
                    <td><?= $value['ho_ten'] ?></td>
                    <td><img src="../view/img/<?= $value['avt'] ?>" height="100px" alt=""></td>
                    <td><?= $value['dia_chi'] ?></td>
                    <td><strong><?= $value['solanmua'] ?></strong></td>
                </tr>
            <?php endforeach ?>
           </tbody>
        </table>
    </div>
</div>
<div class="nen3">
<div class="listchung">
        <h1>Top 5 Sản phẩm được bình luận nhiều nhất</h1>
        <table class="list" >
           <thead>
           <tr> 
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Số bình luận</th>
            </tr>
           </thead>
           <tbody>
           <?php foreach ($sp_binhluannhieu as $value) : ?>
                <tr>
                    <td><?= $value['ma_sp'] ?></td>
                    <td><?= $value['ten_sp'] ?></td>
                    <td><img src="../view/img/<?= $value['hinh_anh'] ?>" height="100px" alt=""></td>
                    <td><?= format_currency($value['gia_sp']) . " VNĐ" ?></td>
                    <td><strong><?= $value['sobinhluan'] ?></strong></td>
                </tr>
            <?php endforeach ?>
           </tbody>
        </table>
    </div>
</div>
