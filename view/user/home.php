<script>
        var mang = [];
        var i = 0;
         mang[0] = "./view/img/banner_1.png";
            mang[1] = "./view/img/banner_2.jpg";
            mang[2] = "./view/img/banner_3.jpg";
        
        function show() {
            i++;
            if (i > mang.length - 1) {
                i = 0;
            }           
            document.getElementById("banner").src = mang[i];
            time = setTimeout(show, 2000)

        }
        window.onload = function() {
            xoa();
            time = setTimeout(show, 2000)
            }
        function xoa(){
            document.getElementsByName('timsp')[0].value="";
        }
    </script>
<div class="content">
           <div class="dau">
            <div class="banner2">
                <img id="banner" onclick="show()" src="./view/img/banner_1.png" alt="">
            </div>
            <div class="tieudelon">Sản phẩm</div>
           </div>
           <div class="cuoi">
            
           <div class="menucon">
            <aside>
            <div class="search">
              
              <form action="index.php?act=timsp" method="post">
                  <input type="text" name="kyw" placeholder="Nhập tên sản phẩm ">
                  <button type="submit"  name="timsp">Tìm kiếm</button>
              </form>
              
          </div>
                <div class="tieude">
                    <h3>Danh mục</h3>
                </div>
                <ul>
                    <li><a href="index.php">Tất cả sản phẩm</a></li>
                    <?php foreach($categories as $cate) :?>

                    <li><a href="index.php?act=sanpham&iddm=<?= $cate['ma_loai']?>"><?= $cate['ten_loai']?></a></li>
                    
                    <?php endforeach ?>
                </ul>
                
            </aside>
            <aside class="topsp">
                <div class="tieude">
                    <h3>Top 10 yêu thích </h3>
                </div>
                <ul class="yeuthich">
                    <?php foreach( $top10sp as $top10sp) :?>
                        <li><a href="index.php?act=chitiet_sanpham&id=<?= $top10sp['ma_sp'] ?>&iddm=<?= $top10sp['loai_sp'] ?>"><img src="/duan1/PRO1014/view/img/<?=$top10sp['hinh_anh']?>" alt=""> <div class="tensp_yeuthich"><?= $top10sp['ten_sp']?></div></a></li>
                    <?php endforeach?>          
                </ul>
                
            </aside>
           </div>
            <section class="product">
                <?php foreach($products as $product) :?>
                    <div class="sp">
                    <div class="anhsp">
                        <a href="index.php?act=chitiet_sanpham&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>"><img src="./view/img/<?= $product['hinh_anh'] ?>" alt=""></a>
                        <div class="nut">
                            <button><a href="index.php?act=chitiet_sanpham&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>">CHI TIẾT</a></button>
                        </div>
                    </div>
                    <div class="tensp"><a href="index.php?act=chitiet_sanpham&id=<?= $product['ma_sp'] ?>&iddm=<?= $product['loai_sp'] ?>"><h5><?=$product['ten_sp']?></h5></a></div>
                    <div class="gia"><?= format_currency($product['gia_sp'])  ?> VNĐ</div>
                   
                </div>
                   <?php endforeach?> 
            </section>
            
           </div>
           <!-- <div class="banner">
                <div class="tieude">
                    <h2>Chúng tôi bán hàng chính </h2>
                    <p>Bạn có nhu cầu gì hãy liên lạc với chúng tôi</p>
                    <button type="button">Contact us</button>
                </div>
                <div class="minhhoa">
                    <img src="/duan1/PRO1014/view/img/banner.jpg" alt="">
                </div>
            </div> -->
            <div class="contact">
                <div class="contact_item">
                    <div class="contact_title">
                        <p>Follow products and discounts on Instagram</p>
                    </div>
                    <div class="contact_img">
                        <div class="img_insta">
                            <img class="anh" src="./view/img/logo_connect.jpg" alt="">
                            <img class="insta_icon" src="./view/img/Vector.png" alt="">
                        </div>
                        <div class="img_insta">
                            <img class="anh"  src="./view/img/logo_connect1.jpg " alt="">
                            <img class="insta_icon" src="./view/img/Vector.png" alt="">
                        </div>
                        <div class="img_insta">
                            <img class="anh"  src="./view/img/logo_connect2.jpg" alt="">
                            <img class="insta_icon" src="./view/img/Vector.png" alt="">
                        </div>
                        <div class="img_insta">
                            <img class="anh"  src="./view/img/logo_connect3.jpg " alt="">
                            <img class="insta_icon" src="./view/img/Vector.png" alt="">
                        </div>
                        <div class="img_insta">
                            <img class="anh"  src="./view/img/logo_connect4.jpg " alt="">
                            <img class="insta_icon" src="./view/img/Vector.png" alt="">
                        </div>
                        <div class="img_insta">
                            <img class="anh"  src="./view/img/logo_connect5.jpg" alt="">
                            <img class="insta_icon" src="./view/img/Vector.png" alt="">
                        </div>        
                    </div>
                </div>
                <form class="submid">
                    <div class="submid_title">
                        <p>Or subscribe to the newsletter</p>
                    </div>
                    
                    <input type="text" name="" id="" placeholder="Email address...">
                    <button>SUBMIT</button>
                </form>
        </div>
           
        </div>