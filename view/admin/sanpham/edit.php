<div class="nen">
    <div class="edit">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <table class="form">
            <h1>Sửa sản phẩm</h1>
                <tr>
                    <td>Product_id</td>

                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                </tr>
                <tr>
                    <td><input type="text"  disabled placeholder="auto number"></td>
                </tr>
                <tr>
                    <td>Product_name</td>
                </tr>
                <tr>
                    <td><input type="text" name="product_name" value="<?= $product['product_name'] ?>"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['product_name'])) : ?>
                                <?= $_SESSION['error_product']['product_name'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>

                </tr>
                <tr>
                    <td><input type="number" name="price" value="<?= $product['price'] ?>"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['price'])) : ?>
                                <?= $_SESSION['error_product']['price'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>                
                <tr>
                    <td>Img</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg" value="<?=$product['img']?>">
                <tr>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['img'])) : ?>
                                <?= $_SESSION['error_product']['img'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>                
                <tr>
                    <td>Img_2</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img_2'] ?>" height="100px" alt=""></td>
                </tr>
                
                <input type="hidden" name="oldImg2" value="<?=$product['img_2']?>">
                <tr>
                    <td><input type="file" name="img2"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['img2'])) : ?>
                                <?= $_SESSION['error_product']['img2'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>                 
                <tr>
                    <td>Img_3</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img_3'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg3" value="<?=$product['img_3']?>">
                <tr>
                    <td><input type="file" name="img3"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['img3'])) : ?>
                                <?= $_SESSION['error_product']['img3'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>                 
                <tr>
                    <td>Img_4</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img_4'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg4" value="<?=$product['img_4']?>">
                <tr>
                    <td><input type="file" name="img4"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['img4'])) : ?>
                                <?= $_SESSION['error_product']['img4'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>  
                <tr>
                    <td>description</td>
                </tr>
                <tr>
                    <td><textarea name="description" id="" cols="52" rows="10"><?=$product['description']?></textarea></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                </tr>
                <tr>
                    <td><input type="number" name="quantity" value="<?=$product['quantity']?>"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['quantity'])) : ?>
                                <?= $_SESSION['error_product']['quantity'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>  
                <tr>
                    <td>cate_id</td>
                </tr>
                <tr>
                    
                    <td><select class="trong" name="cate_id">
                            <?php foreach ($cates as $cate) : ?>
                        
                                <option value="<?= $cate['cate_id'] ?>" <?=$product['cate_id']?> <?= ($cate['cate_id'] == $product['cate_id'])?"selected":""?>  ><?= $cate['cate_name'] ?></option>
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