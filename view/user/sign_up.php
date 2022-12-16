
        <?php
            if(isset($_SESSION['user'])){
                header("location: index.php");
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $username = $_POST['username'];
                $mat_khau = $_POST['mat_khau'];
                $repassword = $_POST['repassword'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $sdt = $_POST['sdt'];
                $avt = $_FILES['avt'];
                dangky($username, $ho_ten, $mat_khau, $repassword, $email, $dia_chi, $sdt);
            }
        ?>
        <div class="content">
            <h2 id="dangnhap">Đăng ký</h2>
            <form action="" method="post" enctype="multipart/form-data">
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
                        <td colspan="2" ><input name="mat_khau"  type="password"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['mat_khau'])):?>
                                <?=$_SESSION['errors']['mat_khau']?>
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
                        <td class="ten_input">avatar</td>
                    </tr>
                    <tr>
                        <td colspan="2" id="signupimg"><input  type="file" name="avt"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['avt'])):?>
                                <?=$_SESSION['errors']['avt']?>
                            <?php endif?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ten_input">Họ và tên</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input name="ho_ten" type="text"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['ho_ten'])):?>
                                <?=$_SESSION['errors']['ho_ten']?>
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
                        <td colspan="2" ><input name="dia_chi" type="text"></td>
                    </tr>
                    <tr>
                        <td><?php if(isset($_SESSION['errors']['dia_chi'])):?>
                                <?=$_SESSION['errors']['dia_chi']?>
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