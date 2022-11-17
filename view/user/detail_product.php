<div class="content">
    <script>
        var i = 0;
        var mang = [];
        mang[0] = "/duanmau/view/img/<?= $product['img'] ?>"
        mang[1] = "/duanmau/view/img/<?= $product['img_2'] ?>"
        mang[2] = "/duanmau/view/img/<?= $product['img_3'] ?>"
        mang[3] = "/duanmau/view/img/<?= $product['img_4'] ?>"

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
        <?php if (!empty($product['img_4']) && !empty($product['img_3']) && !empty($product['img_2'])) : ?>
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
            document.getElementById("soluong").value--;
            if (document.getElementById("soluong").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("soluong").value = 1;
            }

        }

        function plus(quantity) {
            if(document.getElementById("soluong").value < quantity){
                document.getElementById("soluong").value++;
            }
            else{
                alert("Số lượng sản phẩm không đủ với nhu cầu của bạn");
            }
            if (document.getElementById("soluong").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("soluon").value = 1;
            }
        }
        function checksoluong(quantity){
            if (document.getElementById("soluong").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("soluong").value = 1;
            }
            else if(document.getElementById("soluong").value > quantity){
                alert("Số lượng sản phẩm không đủ với nhu cầu của bạn");
                document.getElementById("soluong").value = quantity;
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
    <?php if (!empty($product['img_4']) && !empty($product['img_3']) && !empty($product['img_2'])) : ?>
        <div class="anhcon">
            <img class="anhphu" onclick="chon(0)" src="/duanmau/view/img/<?= $product['img'] ?>" alt="">

            <img class="anhphu" onclick="chon(1)" src="/duanmau/view/img/<?= $product['img_2'] ?>" alt="">

            <img class="anhphu" onclick="chon(2)" src="/duanmau/view/img/<?= $product['img_3'] ?>" alt="">

            <img class="anhphu" onclick="chon(3)" src="/duanmau/view/img/<?= $product['img_4'] ?>" alt="">
        </div>
            <?php endif ?>
        
        <div class="anhlon">
            <?php if (!empty($product['img_4']) && !empty($product['img_3']) && !empty($product['img_2'])) : ?>
                <img id="anh2" onclick="show()" src="./view/img/<?= $product['img'] ?>" alt="">
            <?php endif ?>
            <?php if (empty($product['img_4']) && empty($product['img_3']) && empty($product['img_2'])) : ?>
                <img id="anh2" src="./view/img/<?= $product['img'] ?>" alt="">
            <?php endif ?>
        </div>
        <div class="tt">

            <div class="tt_tensp">
                <h3><?= $product['product_name'] ?></h3>
            </div>
            <div class="tt_gia"><?= format_currency($product['price']) . "  VNĐ"  ?></div>
          
            <div class="mota"> <?= $product['description'] ?></div>
                <?php if(isset($_SESSION['user'])){?>
                    <form action="index.php?act=add_cart" method="post">

                    <?php }else{ ?>
                        <form action="index.php?act=viewcart" method="post">

                        <?php } ?>
                 <input type="hidden" name="quantity" value="<?=$product['quantity'] ?>">       
                <div class="chucnang">
                    
                   <?php if($product['quantity'] > 0) {?>
                    <div class="soluong">
                        <button id="cong" type="button" onclick="tru()">-</button>
                        <input id="soluong" onchange="checksoluong(<?=$product['quantity'] ?>)" name="soluong" type="number" value="1" min="1" >
                        <button id="cong" type="button" onclick="plus(<?=$product['quantity'] ?>)">+</button>
                    </div>
                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                        <input type="hidden" name="product_name" value="<?= $product['product_name'] ?>">
                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="img" value="<?= $product['img'] ?>">
                        <div class="giohang">
                            <button type="submit" class="btn_card" name="btn_cart">ADD TO CART</button>
                    </div>
                    <?php } else {?>
                        <h2 class=" thongbao_detailsp">Sản phẩm đã hết hàng</h2>
                        <?php }?>
                </div>
            </form>

            <div class="dm">
                <h4>Số lượng: <?=$product['quantity'] ?> </h4>
            </div>

        </div>


    </div>
    <div class="binhluan">
        <hr>
        <h2>Bình luận (<?php if(isset($so_binhluan['soluong_binhluan'])) {?> <?=$so_binhluan['soluong_binhluan']?> <?php } else{?> <?="0"?> <?php } ?>)</h2>
        
        <form action="index.php?act=guibinhluan&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>" method="post">
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
                <img src="/duanmau/view/img/<?= $binhluan['img'] ?>" alt="">
                <div class="doituongbl2">
                    <div class="ten">
                        <div class="tennguoibl"><?= $binhluan['hovaten'] ?> <?php if ($binhluan['vaitro_id'] != 1) : ?> <div class="tenvaitro">QTV</div> <?php endif ?></div>
                        <div class="ngay">
                            <?= $binhluan['ngaybl'] ?>
                        </div>
                    </div>
                    <div class="noidungbl">
                        <?= $binhluan['noidung'] ?>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($binhluan['user_id'] == $user_id) : ?>
                                <div class="xoa">
                                    <a href="index.php?act=delete_binhluan&id_binhluan=<?= $binhluan['binhluan_id'] ?>&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>">Xóa</a>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($binhluan['user_id'] != $user_id) : ?>
                                <div class=" sangdi">
                                <?php $u++ ?>
                                    <button class="traloi" type="button" onclick="hien(<?= $u ?>)">Trả lời</button>
                                </div>
                            <?php endif ?>
                        <?php endif ?>

                    </div>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php if ($binhluan['user_id'] != $user_id) : ?>
                            
                            <form class="formtraloi" action="index.php?act=guirep&id=<?= $product['product_id'] ?>&id_binhluan=<?= $binhluan['binhluan_id'] ?>&iddm=<?= $product['cate_id'] ?>" method="post">
                                <textarea id="formtraloi" name="rep" cols="30" rows="10" placeholder="Trả lời"></textarea>
                                <button type="submit" name="guirep" id="nhan">Gửi</button>
                            </form>
                        <?php endif ?>
                    <?php endif ?>

                    <div class="phanvung">
                        <?php foreach ($reps as $rep) : ?>
                            <?php if ($rep['binhluan_id'] == $binhluan['binhluan_id']) : ?>
                                <div class=" rep">
                                    <img src="/duanmau/view/img/<?= $rep['img'] ?>" alt="">
                                    <div class="doituongbl2">
                                        <div class="ten">
                                            <div class="tennguoibl"><?= $rep['hovaten'] ?> <?php if ($rep['vaitro_id'] != 1) : ?> <div class="tenvaitro">QTV</div> <?php endif ?></div>
                                            <div class="ngay">
                                                <?= $rep['ngay_traloi'] ?>
                                            </div>
                                        </div>
                                        <div class="noidungbl">
                                            <?= $rep['noidung'] ?>
                                            <?php if (isset($_SESSION['user'])) : ?>
                                                <?php if ($rep['user_id'] == $user_id) : ?>
                                                    <div class="xoa">
                                                        <a href="index.php?act=delete_rep&rep_id=<?= $rep['rep_id'] ?>&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>">Xóa</a>
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
                        <a href="index.php?act=chitiet_sanpham&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>"><img src="/duanmau/view/img/<?= $product['img'] ?>" alt=""></a>
                        <div class="nut">
                            <button><a href="index.php?act=chitiet_sanpham&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>">CHI TIẾT</a></button>
                        </div>
                    </div>
                    <div class="tensp"><a href="index.php?act=chitiet_sanpham&id=<?= $product['product_id'] ?>">
                            <h5><?= $product['product_name'] ?></h5>
                        </a></div>
                    <div class="gia"><?= format_currency($product['price']) . " VNĐ" ?></div>

                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>