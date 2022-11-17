
          <?php
            if(isset($_SESSION['user'])){
                header("location: index.php");
            }
        ?>
        <div class="content">
            
            <form action="index.php?act=dangnhap" method="post">
            
                <table class="dangnhap" >
                <h2 id="dangnhap">Đăng nhập</h2>
                    <tr>
                        <td class="ten_input">Tên đăng nhập</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="username" type="text"></td>
                    </tr>
                    <tr>
                        <td  class="ten_input"  >Mật khẩu</td>
                    </tr>
                    <tr>                
                        <td colspan="2" ><input name="password"  type="password"></td>
                    </tr>
                    <tr>
                        <td class="thongbao">
                        <?php if(isset($_SESSION['thongbao'])):?>
                           <?=$_SESSION['thongbao']?>
                        <?php endif?> 
                        
                        <?php if(isset($_SESSION['dangkythanhcong'])):?>
                           <?=$_SESSION['dangkythanhcong']?>
                        <?php endif?> 
                        </td>                       
                    </tr>
                    <tr>
                       <td > <button type="submit" name="dangnhap" class="dn">Đăng nhập</button></td>
                       <td class="quen"><a href="index.php?act=vao_trang_quenmk">Quên mật khẩu ?</a></td>
                    </tr>
                    <tr>
                        <td class="hoac" colspan="2"><h4><span>Hoặc</span></h4></td>
                    </tr>
                    <tr>
                        <td class="dangky2" colspan="2">Bạn chưa có tài khoản? <a href="index.php?act=vao_trang_dangky">Đăng ký ngay</a></td>
                    </tr>
                </table>
            </form>
        </div>
        