<div class="nen">
<div class="add">
    <form action="index.php?act=adddm" method="post">
        <h1>Thêm danh mục</h1>    
    <table class="form" >
            <tr>
                <td>Mã danh mục</td>
            </tr>
            <tr>
            <td><input type="text" disabled placeholder="auto numble"></td>
            </tr>
            <tr>
                <td>Tên danh mục</td>
            </tr>
            <tr>
            <td><input type="text" name="cate_name"></td>
            </tr>
            
            <tr>
                <?php if(isset($_SESSION['cate_error']['cate_name'])) :?>
                    <td class="thongbaoloi"><?=$_SESSION['cate_error']['cate_name'] ?></td>
                    <?php endif?>
            </tr>
           
            <?php
            ?>
            <tr>
                <td><button type="submit" name="them">Thêm</button></td>
            </tr>   
           <tr>
            <td>
            </td>
           </tr>

                
        </table>
    </form>
    <?php $_SESSION['cate_error']= []?>
</div>
</div>