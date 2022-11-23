<div class="nen">
    <div class="edit">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <table class="form">
            <h1>Sửa sản phẩm</h1>
                <tr>
                    <td>Mã sản phẩm</td>

                    <input type="hidden" name="product_id" value="<?= $product['ma_sp'] ?>">
                </tr>
                <tr>
                    <td><input type="text"  disabled placeholder="auto number"></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                </tr>
                <tr>
                    <td><input type="text" name="product_name" value="<?= $product['ten_sp'] ?>"></td>
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
                    <td><input type="number" name="price" value="<?= $product['gia_sp'] ?>"></td>
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
                    <td><img src="/duan1/PRO1014/view/img/<?= $product['hinh_anh'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg" value="<?=$product['hinh_anh']?>">
                <tr>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['hinh_anh'])) : ?>
                                <?= $_SESSION['error_product']['img'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>                
                <tr>
                    <td>Hình ảnh 2</td>
                </tr>
                <tr>
                    <td><img src="/duan1/PRO1014/view/img/<?= $product['hinh_anh_2'] ?>" height="100px" alt=""></td>
                </tr>
                
                <input type="hidden" name="oldImg2" value="<?=$product['hinh_anh_2']?>">
                <tr>
                    <td><input type="file" name="img2"></td>
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
                    <td>Hình ảnh 3</td>
                </tr>
                <tr>
                    <td><img src="/duan1/PRO1014/view/img/<?= $product['hinh_anh_3'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg3" value="<?=$product['hinh_anh_3']?>">
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
                    <td><img src="/duan1/PRO1014/view/img/<?= $product['hinh_anh_4'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg4" value="<?=$product['hinh_anh_4']?>">
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
                    <td><textarea name="description" id="" cols="52" rows="10"><?=$product['mo_ta']?></textarea></td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                </tr>
                <tr>
                    <td><input type="number" name="quantity" value="<?=$product['so_luong']?>"></td>
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
                    
                    <td><select class="trong" name="cate_id">
                            <?php foreach ($cates as $cate) : ?>
                        
                                <option value="<?= $cate['ma_loai'] ?>" <?=$product['loai_sp']?> <?= ($cate['ma_loai'] == $product['loai_sp'])?"selected":""?>  ><?= $cate['ten_loai'] ?></option>
                            <?php endforeach ?>
                        </select></td>
                </tr>
                             
                <tr>
                    <td><button type="submit" name="update">Sửa</button></td>
                </tr>
            </table>
        </form>
    </div>
    <?php unset($_SESSION['error_product']) ?>
</div>