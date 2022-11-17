
        <?php
            if(isset($_SESSION['user'])){
                header("location: index.php");
            }
        ?>
        <div class="content">
            <h2 id="dangnhap">Đăng ký</h2>
            <form action="index.php?act=dangkytk" method="post" enctype="multipart/form-data">
                <table class="dangky" >
                   
                    <tr>
                        <td class="ten_input">Tên đăng nhập</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="username" type="text"  ></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['username'])):?>
                                <?=$_SESSION['errors']['username']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td  class="ten_input">Mật khẩu</td>
                    </tr>
                    
                    <tr>                
                        <td colspan="2" ><input name="password"  type="password"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['password'])):?>
                                <?=$_SESSION['errors']['password']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td  class="ten_input">Nhập lại mật khẩu</td>
                    </tr>
                    
                    <tr>                
                        <td colspan="2" ><input name="repassword"  type="password"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['repassword'])):?>
                                <?=$_SESSION['errors']['repassword']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">img</td>
                    </tr>
                    <tr>
                        <td colspan="2" id="signupimg"><input  type="file" name="img"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['img'])):?>
                                <?=$_SESSION['errors']['img']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Họ và tên</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="hovaten" type="text"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['hovaten'])):?>
                                <?=$_SESSION['errors']['hovaten']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Email</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="email" type="text"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['email'])):?>
                                <?=$_SESSION['errors']['email']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Địa chỉ</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="address" type="text"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['address'])):?>
                                <?=$_SESSION['errors']['address']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Số điện thoại</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="sdt" type="text"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['sdt'])):?>
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
                    <?php
                    $_SESSION['errors']=[];
                    ?>
                    <tr>
                       <td > <button type="submit" name="dangky" class="dk">Đăng ký</button></td>
                       
                    </tr>
                </table>
            </form>
        </div>