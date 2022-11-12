<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container m-auto max-w-screen-xl my-4">
        <header>
            <div class="fixed top-0 left-0 right-0 bg-white max-w-screen-xl m-auto">
                <menu class="flex justify-between max-w-screen-xl m-auto py-4">
                    <div class="logo">
                        <a href="./index.html"><img src="../img/logo.png" alt=""></a>
                    </div>

                    <nav class="flex space-x-8">
                        <ul class="flex space-x-8">
                            <li><a href="">Shop</a></li>
                            </li><a href="">Blog</a></li>
                            <li><a href="">Our Story</a></li>
                        </ul>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg></a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </a>
                    </nav>
                </menu>
                <hr>
            </div>
        </header>

        <main>
            <div class="my-32">
                <script>
                    var i = 0;
                    var mang = [];
                    mang[0] = "../img/<?= $sanpham['hinh_anh'] ?>"
                    mang[1] = "../img/<?= $sanpham['hinh_anh_2'] ?>"
                    mang[2] = "../img/<?= $sanpham['hinh_anh_3'] ?>"
                    mang[3] = "../img/<?= $sanpham['hinh_anh_4'] ?>"

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
                    // <?php if (!empty($sanpham['hinh_anh_4']) && !empty($sanpham['hinh_anh_3']) && !empty($sanpham['hinh_anh_2'])) : ?>
                    //     window.onload = function() {
                    //         time = setTimeout(show, 2000)
                    //     }
                    // <?php endif ?>


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
                <div class="ctsp">
                <?php if (!empty($product['hinh_anh_4']) && !empty($product['hinh_anh_3']) && !empty($product['hinh_anh_2'])) : ?>
                    <div class="anhcon">
                        <img class="anhphu" onclick="chon(0)" src="<?= $product['hinh_anh'] ?>" alt="">
                        <div> <?=   value[$product['hinh_anh']]?> </div>
                        <!-- <img class="anhphu" onclick="chon(0)" src="../img/Img 01.png" alt=""> -->

                        <img class="anhphu" onclick="chon(1)" src="../img/<?= $product['hinh_anh_2'] ?>" alt="">
                        <!-- <img class="anhphu" onclick="chon(1)" src="../img/Img 02.png" alt=""> -->

                        <img class="anhphu" onclick="chon(2)" src="../img/<?= $product['hinh_anh_3'] ?>" alt="">
                        <!-- <img class="anhphu" onclick="chon(2)" src="../img/Img 03.png" alt=""> -->

                        <img class="anhphu" onclick="chon(3)" src="../img/<?= $product['hinh_anh_4'] ?>" alt="">
                        <!-- <img class="anhphu" onclick="chon(3)" src="../img/Img 04.png" alt=""> -->
                    </div>
                        <?php endif ?>
                    
                    <div class="anhlon">
                        <!-- <?php if (!empty($product['hinh_anh_4']) && !empty($product['hinh_anh_3']) && !empty($product['hinh_anh_2'])) : ?> -->
                            <img id="anh2" onclick="show()" src="../img/Img.png" alt="">
                        <!-- <?php endif ?> -->
                        <!-- <?php if (empty($product['hinh_anh_4']) && empty($product['hinh_anh_3']) && empty($product['hinh_anh_2'])) : ?> -->
                            <!-- <img id="anh2" src="../img/<?= $product['img'] ?>" alt=""> -->
                        <!-- <?php endif ?> -->
                    </div>

                    <div class="tt">
                        <div class="tt_tensp">
                            <!-- <h3><?= $product['product_name'] ?></h3> -->
                            <h1>Nhẫn đôi bạc nhẫn cặp bạc đẹp giá rẻ ND0092</h1>
                        </div>
                        <!-- <div class="tt_gia"><?= format_currency($product['price']) . "  VNĐ"  ?></div> -->
                        <div class="tt_gia">449.000 VNĐ</div>
                    
                        <!-- <div class="mota"> <?= $product['description'] ?></div> -->
                        <div class="mota">
                            Chất liệu bạc cao cấp 925, 
                            thiết kế tinh xảo trên công nghệ 3D tiên tiến, 
                            bảo hành miễn phí trọn đời đánh bóng làm mới hoặc rơi đá, 
                            kiểu dáng trẻ trung thời trang
                        </div>
                            <!-- <?php if(isset($_SESSION['user'])){?> -->
                                <form action="index.php?act=add_cart" method="post">

                                <!-- <?php }else{ ?> -->
                                    <form action="index.php?act=viewcart" method="post">

                                    <!-- <?php } ?> -->
                            <input type="hidden" name="quantity" value="<?=$product['quantity'] ?>">       
                            <div class="chucnang">
                                
                            <!-- <?php if($product['quantity'] > 0) {?> -->
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
                                <!-- <?php } else {?> -->
                                    <!-- <h2 class=" thongbao_detailsp">Sản phẩm đã hết hàng</h2> -->
                                    <!-- <?php }?> -->
                            </div>
                        </form>

                        <div class="dm">
                            <h4>Số lượng: <?=$product['quantity'] ?> </h4>
                        </div>

                    </div>


                </div>
                
                <div class="sm:hidden relative w-11/12 mx-auto rounded">
                    <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                        <img  class="icon icon-tabler icon-tabler-selector" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/active-inigo-svg1.svg" alt="selector" />
                    </div>
                    <select aria-label="Selected tab" class="form-select block w-full p-3 border border-gray-300 dark:border-gray-700 rounded text-gray-600 dark:text-gray-200 appearance-none bg-transparent relative z-10">
                        <option class="text-sm text-gray-600">inactive</option>
                        <option class="text-sm text-gray-600">inactive</option>
                        <option selected class="text-sm text-gray-600">Active</option>
                        <option class="text-sm text-gray-600">inactive</option>
                        <option class="text-sm text-gray-600">inactive</option>
                    </select>
                </div>
                <div class="xl:w-full xl:mx-0 h-12 hidden sm:block bg-white dark:bg-gray-800 rounded shadow">
                    <div class="flex border-b px-5">
                        <button  onclick="activeTab(this)" class=" hover:text-indigo-700 focus:text-indigo-700 focus:outline-none text-sm text-indigo-700 flex flex-col justify-between border-indigo-700 pt-3 rounded-t mr-8 font-normal cursor-pointer">
                            <span class="mb-3 dark:text-white ">Active</span>
                            <div class="w-full h-1 bg-indigo-700 rounded-t-md"></div>
                        </button>
                        <button onclick="activeTab(this)" class=" hover:text-indigo-700 focus:text-indigo-700 focus:outline-none mr-10 text-sm text-gray-600 flex flex-col justify-between border-indigo-700 pt-3 rounded-t mr-8 font-normal cursor-pointer">
                            <span class="mb-3 dark:text-white ">Inactive</span>
                            <div class="w-full h-1 bg-indigo-700 rounded-t-md hidden"></div>
                        </button>
                        <button onclick="activeTab(this)" class=" hover:text-indigo-700 focus:text-indigo-700 focus:outline-none mr-10 text-sm text-gray-600 flex flex-col justify-between border-indigo-700 pt-3 rounded-t mr-8 font-normal cursor-pointer">
                            <span class="mb-3 dark:text-white ">Inactive</span>
                            <div class="w-full h-1 bg-indigo-700 rounded-t-md hidden"></div>
                        </button>
                        <button onclick="activeTab(this)" class=" hover:text-indigo-700 focus:text-indigo-700 focus:outline-none text-sm text-gray-600 flex flex-col justify-between border-indigo-700 pt-3 rounded-t mr-8 font-normal cursor-pointer">
                            <span class="mb-3 dark:text-white ">Inactive</span>
                            <div id="df">
                                đổ dưc liệu db tại đây 156
                            </div>
                            <div class="w-full h-1 bg-indigo-700 rounded-t-md hidden"></div>
                        </button>
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
        </main>

        <footer>
            <hr>
            <div style="height: 200px;"></div>
        </footer>
    </div>
    <script src="../js/tab.js"></script>
</body>
</html>