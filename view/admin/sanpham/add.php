<div class="nen">
    <div class="add">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
           

            <table class="form">
            <h1>Thêm sản phẩm</h1>
                <tr>
                    <td>product_id</td>
                </tr>
                <tr>
                    <td><input type="text" disabled></td>
                </tr>
                <tr>
                    <td>product_name</td>
                </tr>
                <tr>
                    <td><input type="text" name="product_name"></td>
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
                    <td>price</td>
                </tr>
                <tr>
                    <td><input type="number" name="price"></td>
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
                    <td>img</td>
                </tr>
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
                    <td>img2</td>
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
                    <td><input type="file" name="img2"></td>
                </tr>
                <tr>
                    <td>img3</td>
                </tr>
               
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
                    <td>img4</td>
                </tr>
                <tr>
                    <td><input type="file" name="img4"></td>
                </tr>
                <tr>
                    <td>
                        <div class="loi">
                            <?php if (isset( $_SESSION['error_product']['img4'])) : ?>
                                <?= $_SESSION['error_product']['img'] ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>description</td>
                </tr>
                <tr>
                    <td><textarea name="description" id="" cols="52" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>quantity</td>
                </tr>
                <tr>
                    <td><input type="number" name="quantity" ></td>
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
                    <td><select class="trong" name="cate_id" id="">
                            <?php foreach ($cates as $cate) : ?>
                                <option value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?></option>
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