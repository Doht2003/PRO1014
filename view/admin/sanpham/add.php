<div class="nen">
    <div class="add">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
           

            <table class="form">
            <h1>Thêm sản phẩm</h1>
                <tr>
                    <td>Mã sản phẩm</td>
                </tr>
                <tr>
                    <td><input type="text" disabled></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                </tr>
                <tr>
                    <td><input type="text" name="product_name"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['ten_sp'])) : ?>
                                <?= $_SESSION['error_product']['ten_sp'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                </tr>
                <tr>
                    <td><input type="number" name="price"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['gia_sp'])) : ?>
                                <?= $_SESSION['error_product']['gia_sp'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh 1</td>
                </tr>
                <tr>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['hinh_anh'])) : ?>
                                <?= $_SESSION['error_product']['hinh_anh'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh 2</td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['hinh_anh_2'])) : ?>
                                <?= $_SESSION['error_product']['hinh_anh_2'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="file" name="img2"></td>
                </tr>
                <tr>
                    <td>Hình ảnh 3</td>
                </tr>
               
                <tr>
                    <td><input type="file" name="img3"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['hinh_anh_3'])) : ?>
                                <?= $_SESSION['error_product']['hinh_anh_3'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh 4</td>
                </tr>
                <tr>
                    <td><input type="file" name="img4"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['hinh_anh_4'])) : ?>
                                <?= $_SESSION['error_product']['hinh_anh_4'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                </tr>
                <tr>
                    <td><textarea name="description" id="" cols="52" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                </tr>
                <tr>
                    <td><input type="number" name="quantity" ></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['so_luong'])) : ?>
                                <?= $_SESSION['error_product']['so_luong'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Loại sản phẩm</td>
                </tr>
                <tr>
                    <td><select class="trong" name="ma_loai" id="">
                            <?php foreach ($cates as $cate) : ?>
                                <option value="<?= $cate['ma_loai'] ?>"><?= $cate['ten_loai'] ?></option>
                            <?php endforeach ?>
                        </select></td>
                </tr>
                <tr>
                    <td><button type="submit" name="them">Thêm</button></td>
                </tr>
            </table>
        </form>
    </div>
    <?php unset($_SESSION['error_product']) ?>
</div>