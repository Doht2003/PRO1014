<div class="content">
    <script>
        var i = 0;
        var mang = [];
        mang[0] = "/duan1/PRO1014/view/img/<?= $product['hinh_anh'] ?>"
        mang[1] = "/duan1/PRO1014/view/img/<?= $product['hinh_anh_2'] ?>"
        mang[2] = "/duan1/PRO1014/view/img/<?= $product['hinh_anh_3'] ?>"
        mang[3] = "/duan1/PRO1014/view/img/<?= $product['hinh_anh_4'] ?>"

        var hop = document.getElementsByClassName("anhphu");

        function show() {
            for (var j = 0; j < hop.length; j++) {
                hop[j].style.border = "2px solid #cccccc";
            }
            i++;
            if (i > mang.length - 1) {
                i = 0;
            }

            hop[i].style.border = "2px solid red";
            document.getElementById("anh2").src = mang[i];
            time = setTimeout(show, 2000)

        }
        <?php if (!empty($product['hinh_anh_4']) && !empty($product['hinh_anh_3']) && !empty($product['hinh_anh_2'])) : ?>
            window.onload = function() {
                time = setTimeout(show, 2000)
            }
        <?php endif ?>


        function chon(h) {
            for (var j = 0; j < hop.length; j++) {
                hop[j].style.border = "1px solid #cccccc";
            }
            hop[h].style.border = "3px solid red";
            document.getElementById("anh2").src = mang[h]
        }



        function tru() {
            document.getElementById("so_luong").value--;
            if (document.getElementById("so_luong").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("so_luong").value = 1;
            }

        }

        function plus(quantity) {
            if(document.getElementById("so_luong").value < quantity){
                document.getElementById("so_luong").value++;
            }
            else{
                alert("Số lượng sản phẩm không đủ với nhu cầu của bạn");
            }
            if (document.getElementById("so_luong").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("so_luong").value = 1;
            }
        }
        function checksoluong(quantity){
            if (document.getElementById("so_luong").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("so_luong").value = 1;
            }
            else if(document.getElementById("so_luong").value > quantity){
                alert("Số lượng sản phẩm không đủ với nhu cầu của bạn");
                document.getElementById("so_luong").value = quantity;
            }
        }
        function hien(i){
            for(var j = 0;j<=document.getElementsByClassName("formtraloi").length-1;j++){
                document.getElementsByClassName("formtraloi")[j].style.display="none"
            }
            document.getElementsByClassName("formtraloi")[i].style.display="flex"
        }
    </script>
    <h1>Chi tiết sản phẩm</h1>
    <div class="ctsp">
    <?php if (!empty($product['hinh_anh_4']) && !empty($product['hinh_anh_3']) && !empty($product['hinh_anh_2'])) : ?>
        <div class="anhcon">
            <img class="anhphu" onclick="chon(0)" src="/duan1/PRO1014/view/img/<?= $product['hinh_anh'] ?>" alt="">

            <img class="anhphu" onclick="chon(1)" src="/duan1/PRO1014/view/img/<?= $product['hinh_anh_2'] ?>" alt="">

            <img class="anhphu" onclick="chon(2)" src="/duan1/PRO1014/view/img/<?= $product['hinh_anh_3'] ?>" alt="">

            <img class="anhphu" onclick="chon(3)" src="/duan1/PRO1014/view/img/<?= $product['hinh_anh_4'] ?>" alt="">
        </div>
            <?php endif ?>
        
        <div class="anhlon">
            <?php if (!empty($product['hinh_anh_4']) && !empty($product['hinh_anh_3']) && !empty($product['hinh_anh_2'])) : ?>
                <img id="anh2" onclick="show()" src="./view/img/<?= $product['hinh_anh'] ?>" alt="">
            <?php endif ?>
            <?php if (empty($product['hinh_anh_4']) && empty($product['hinh_anh_3']) && empty($product['hinh_anh_2'])) : ?>
                <img id="anh2" src="./view/img/<?= $product['hinh_anh'] ?>" alt="">
            <?php endif ?>
        </div>
        <div class="tt">

            <div class="tt_tensp">
                <h3><?= $product['ten_sp'] ?></h3>
            </div>
            <div class="tt_gia"><?= format_currency($product['gia_sp']) . "  VNĐ"  ?></div>
          
            <div class="mota"> <?= $product['mo_ta'] ?></div>
                <?php if(isset($_SESSION['user'])){?>
                    <form action="index.php?act=add_cart" method="post">

                    <?php }else{ ?>
                        <form action="index.php?act=viewcart" method="post">

                        <?php } ?>
                 <input type="hidden" name="gia_sp" value="<?=$product['gia_sp'] ?>">       
                <div class="chucnang">
                    
                   <?php if($product['gia_sp'] > 0) {?>
                    <div class="soluong">
                        <button id="cong" type="button" onclick="tru()">-</button>
                        <input id="soluong" onchange="checksoluong(<?=$product['so_luong'] ?>)" name="soluong" type="number" value="1" min="1" max="<?=$product['so_luong'] ?>" >
                        <button id="cong" type="button" onclick="plus(<?=$product['so_luong'] ?>)">+</button>
                    </div>
                        <input type="hidden" name="ma_sp" value="<?= $product['ma_sp'] ?>">
                        <input type="hidden" name="ten_sp" value="<?= $product['ten_sp'] ?>">
                        <input type="hidden" name="giá_sp" value="<?= $product['gia_sp'] ?>">
                        <input type="hidden" name="hinh_anh" value="<?= $product['hinh_anh'] ?>">
                        <div class="giohang">
                            <button type="submit" class="btn_card" name="btn_cart">ADD TO CART</button>
                    </div>
                    <?php } else {?>
                        <h2 class=" thongbao_detailsp">Sản phẩm đã hết hàng</h2>
                        <?php }?>
                </div>
            </form>

            <div class="dm">
                <h4>Số lượng: <?=$product['so_luong'] ?> </h4>
            </div>

        </div>


    </div>
    <div class="binhluan">
        <hr>
        <h2>Bình luận (<?php if(isset($so_binhluan['soluong_binhluan'])) {?> <?=$so_binhluan['soluong_binhluan']?> <?php } else{?> <?="0"?> <?php } ?>)</h2>
        
        <form action="index.php?act=guibinhluan&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>" method="post">
            <textarea name="noidungbl" id="" cols="30" rows="10"></textarea>
            <div class="guibl">
                <?php if (isset($_SESSION['thongbaobinhluan'])) : ?>
                    <?= $_SESSION['thongbaobinhluan'] ?>
                <?php endif ?>
                <button type="submit" name="gui">Gửi bình luận</button>
            </div>
        </form>
        <?php $u=-1?>
        <?php foreach ($binhluan as $binhluan) : ?>
            <div class="doituongbl">
                <img src="/duan1/PRO1014/view/img/<?= $binhluan['avt'] ?>" alt="">
                <div class="doituongbl2">
                    <div class="ten">
                        <div class="tennguoibl"><?= $binhluan['ho_ten'] ?> <?php if ($binhluan['vai_tro'] != 2) : ?> <div class="tenvaitro">QTV</div> <?php endif ?></div>
                        <div class="ngay">
                            <?= $binhluan['ngay_bl'] ?>
                        </div>
                    </div>
                    <div class="noidungbl">
                        <?= $binhluan['noi_dung'] ?>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($binhluan['tai_khoan'] == $ma_tk) : ?>
                                <div class="xoa">
                                    <a href="index.php?act=delete_binhluan&id_binhluan=<?= $binhluan['ma_bl'] ?>&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>">Xóa</a>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($binhluan['tai_khoan'] != $ma_tk) : ?>
                                <div class=" sangdi">
                                <?php $u++ ?>
                                    <button class="traloi" type="button" onclick="hien(<?= $u ?>)">Trả lời</button>
                                </div>
                            <?php endif ?>
                        <?php endif ?>

                    </div>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php if ($binhluan['tai_khoan'] != $ma_tk) : ?>
                            
                            <form class="formtraloi" action="index.php?act=guirep&id=<?= $product['ma_sp'] ?>&id_binhluan=<?= $binhluan['ma_bl'] ?>&iddm=<?= $product['loai_sp'] ?>" method="post">
                                <textarea id="formtraloi" name="rep" cols="30" rows="10" placeholder="Trả lời"></textarea>
                                <button type="submit" name="guirep" id="nhan">Gửi</button>
                            </form>
                        <?php endif ?>
                    <?php endif ?>

                    <div class="phanvung">
                        <?php foreach ($reps as $rep) : ?>
                            <?php if ($rep['ma_bl'] == $binhluan['ma_bl']) : ?>
                                <div class=" rep">
                                    <img src="/duan1/PRO1014/view/img/<?= $rep['avt'] ?>" alt="">
                                    <div class="doituongbl2">
                                        <div class="ten">
                                            <div class="tennguoibl"><?= $rep['ho_ten'] ?> <?php if ($rep['vai_tro'] != 2) : ?> <div class="tenvaitro">QTV</div> <?php endif ?></div>
                                            <div class="ngay">
                                                <?= $rep['ngay_traloi'] ?>
                                            </div>
                                        </div>
                                        <div class="noidungbl">
                                            <?= $rep['noi_dung'] ?>
                                            <?php if (isset($_SESSION['user'])) : ?>
                                                <?php if ($rep['ma_tk'] == $ma_tk) : ?>
                                                    <div class="xoa">
                                                        <a href="index.php?act=delete_rep&rep_id=<?= $rep['ma_rep'] ?>&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>">Xóa</a>
                                                    </div>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>

                </div>
            </div>
        <?php endforeach ?>
      
            <div class="trang">
                <?php if (isset($sotrang) && $sotrang > 1) : ?>
                    <?php for ($so = 1; $so <= $sotrang; $so++) : ?>
                        <?php if ($so != $trang) { ?>
                            <button><a href="index.php?act=chitiet_sanpham&so_sanpham_tren1trang=<?= $so_sanpham_tren1trang ?>&trang=<?= $so ?>&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>"><?= $so ?></a></button>
                        <?php } else { ?>
                            <button id="hientai"><?= $so ?></button>
                        <?php } ?>
                    <?php endfor ?>
                <?php endif ?>
            </div>
        


    </div>

    <div class=" spkhac">
        <hr>
        <h2>Sản phẩm liên quan</h2>

        <div class="splienquan">
            <?php foreach ($products_lienquan as $product) : ?>
                <div class="sp">
                    <div class="anhsp">
                        <a href="index.php?act=chitiet_sanpham&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>"><img src="/duan1/PRO1014/view/img/<?= $product['hinh_anh'] ?>" alt=""></a>
                        <div class="nut">
                            <button><a href="index.php?act=chitiet_sanpham&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>">CHI TIẾT</a></button>
                        </div>
                    </div>
                    <div class="tensp"><a href="index.php?act=chitiet_sanpham&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>">
                            <h5><?= $product['ten_sp'] ?></h5>
                        </a></div>
                    <div class="gia"><?= format_currency($product['gia_sp']) . " VNĐ" ?></div>

                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>