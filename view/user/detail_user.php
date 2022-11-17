
        <?php
            if(!isset($_SESSION['user'])){
                header("location: index.php");
            }
        ?>
        <div class="content">
            <h2 id="dangnhap">Thông tin tài khoản</h2>
            <form name"capnhat" action="index.php?act=capnhat_tk" method="post" enctype="multipart/form-data">
                <table class="dangky" >
                   
                   
                    <input type="hidden" name="user_id" value="<?=$user['user_id']?>">
                    <tr>
                        <td class="ten_input">img</td>
                    </tr>
                    <tr>
                        <td><img src="./view/img/<?=$user['img']?>"" alt="" height="200px"></td>
                    </tr>
                    <input type="hidden" name="old_img" value="<?=$user['img']?>">
                    <tr>
                        <td colspan="2" id="signupimg"><input  type="file" name="img"></td>
                    </tr>
                    <tr>
                        <td class="thongbao"><?php if(isset($_SESSION['errors']['img'])):?>
                                <?=$_SESSION['errors']['img']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Họ và tên</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="hovaten" type="text" value="<?=$user['hovaten']?>"></td>
                    </tr>
                    <tr>
                        <td class="thongbao"><?php if(isset($_SESSION['errors']['hovaten'])):?>
                                <?=$_SESSION['errors']['hovaten']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Email</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input  name="email" type="text" value="<?=$user['email']?>"></td>
                    </tr>
                    <tr>
                        <td class="thongbao"><?php if(isset($_SESSION['errors']['email'])):?>
                                <?=$_SESSION['errors']['email']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Địa chỉ</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="address" type="text" value="<?=$user['address']?>"></td>
                    </tr>
                    <tr>
                        <td class="thongbao"><?php if(isset($_SESSION['errors']['address'])):?>
                                <?=$_SESSION['errors']['address']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Số điện thoại</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="tel" type="text" value="<?=$user['tel']?>"></td>
                    </tr>
                    <tr>
                        <td class="thongbao"><?php if(isset($_SESSION['errors']['sdt'])):?>
                                <?=$_SESSION['errors']['sdt']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="thongbao">
                        <?php if(isset($_SESSION['thongbao'])):?>
                           <?=$_SESSION['thongbao']?>
                        <?php endif?> 
                        </td>                       
                    </tr>
                   
                    <tr>
                        <td class="thongbao"><?php if(isset($_SESSION['capnhatthanhcong'])) :?>    
                            <?=$_SESSION['capnhatthanhcong']?> 
                            <?php
                                    unset($_SESSION['user']);
                                    $_SESSION['user'] = $user;
                            ?>
                            <?php endif ?> </td>
                    </tr>
                    <tr>
                       <td > <button type="submit" name="capnhattk" class="dk">Cập nhật</button></td>
                       
                    </tr>
                </table>
                <?php
                    unset($_SESSION['errors']);
                    unset($_SESSION['capnhatthanhcong']);
                
                    ?>
            </form>
        </div>