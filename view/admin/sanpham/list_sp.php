<div class="nen">
    <div class="listchung">
        <h1>Danh sách sản phẩm</h1>
        <form action="index.php?act=showsp" method="post" class="search">
        <input type="text" name="kyw">
            <select  name="cate_id">
            <option value="0" selected>Tất cả</option>
                <?php foreach ($cates as $cate) : ?>    
                    <option value="<?= $cate['ma_loai'] ?>"><?= $cate['ten_loai'] ?></option>
                <?php endforeach ?>
            </select>
            <button type="submit" name="tim">Tìm kiếm</button>
        </form>
        <table class="list">

          <thead>
          <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Số Lượng</th>
                <th>Loại sản phẩm</th>
                <th><button id="them"><a href="index.php?act=addsp">Thêm</a></button></th>
            </tr>
          </thead>
            <tbody> <?php foreach ($products as $product) : ?>
                
                <tr>
                      <td id="proid"><?= $product['ma_sp'] ?></td>
                      <td id="tensp"><?= $product['ten_sp'] ?></td>
                      <td id="gia"> <?= format_currency($product['gia_sp']). " VNĐ" ?></td>
                      <td><img src="/duan1/PRO1014/view/img/<?= $product['hinh_anh'] ?> "height="100px" alt=""></td>
                      <td id="description" ><?= $product['mo_ta'] ?></td>
                      <td><?=$product['so_luong']?></td>
                      <td><?= $product['ten_loai'] ?></td>
                      <td  id="chucnang"><button id="sua"><a href="index.php?act=editsp&id=<?= $product['ma_sp'] ?>">Sửa</a></button><button id="xoa"><a href="index.php?act=delete_sp&id=<?= $product['ma_sp'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">Xóa</a></button></td>
  
                  </tr>
  
                  
              <?php endforeach ?></tbody>
          
        </table>
        
    </div>
</div>