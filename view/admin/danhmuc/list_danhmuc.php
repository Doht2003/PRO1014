<div class="nen">
    <div class="listchung">
        <h1>Danh sách danh mục</h1>
        <table class="list" >
           <thead>
           <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th ><button id="them"><a href="index.php?act=adddm">Thêm</a></button></th>
            </tr>
           </thead>
           <tbody>
           <?php foreach ($cates as $cate) : ?>
                <tr>
                    <td><?= $cate['cate_id'] ?></td>
                    <td><?= $cate['cate_name'] ?></td>
                    <td><button id="sua"><a  href="index.php?act=edit&id=<?= $cate['cate_id'] ?>">Sửa</a></button><button id="xoa"><a  href="index.php?act=delete&id=<?= $cate['cate_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">Xóa</a></button></td>    
                </tr>
            <?php endforeach ?>
           </tbody>
        </table>
    </div>
</div>