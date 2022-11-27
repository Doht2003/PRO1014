<?php
ob_start();
session_start();
include './controller/controller.php';
include './view/user/header.php';
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/taikhoan.php";
include './model/binhluan.php';
include './model/dathang.php';
$products = showsp_trangchu();
$categories = showdm_user();
$top10sp = show_top10_sp();
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}
if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'guibinhluan':
      unset($_SESSION['thongbaobinhluan']);
      if (isset($_POST['gui'])) {
        if (isset($_SESSION['user'])) {
          if (isset($_GET['id'])) {
            extract($_SESSION['user']);
            $id = $_GET['id'];
            $noidung = $_POST['noidungbl'];
            if ($noidung != "") {
              gui_binhluan($ma_tk, $id, $noidung);
            } else {
              $_SESSION['thongbaobinhluan'] = "Nội dung bình luận không được để trống ";
            }
          }
        } else {
          $_SESSION['thongbaobinhluan'] = "Bạn cần đăng nhập để bình luận.  ";
        }
      }

      if (isset($_GET['id'])) {
        if (isset($_GET['iddm'])) {
          $id = $_GET['id'];
          $iddm = $_GET['iddm'];
          $reps = show_rep($id);
          $product = chitiet_sp($id);
          if (isset($_GET['so_sanpham_tren1trang'])) {
            $so_sanpham_tren1trang = $_GET['so_sanpham_tren1trang'];
          } else {
            $so_sanpham_tren1trang = 6;
          }
          if (isset($_GET['trang'])) {
            $trang = $_GET['trang'];
          } else {
            $trang = 1;
          }
          $binhluan = show_binhluan($id, $so_sanpham_tren1trang, $trang);
          $sotrang = sotrang($id, $so_sanpham_tren1trang);
          $products_lienquan = sanpham_lienquan($id, $iddm);
          header("location: index.php?act=chitiet_sanpham&id=$id&iddm=$iddm");
        }
      }

      break;
    case 'sanpham':
      if (isset($_GET['iddm'])) {
        $iddm = $_GET['iddm'];
        $products = showsp_theodm($iddm);
      }
      include './view/user/home.php';
      break;
    case 'trangchu':
      include './view/user/home.php';
      break;
    case 'gioithieu':
      include './view/user/gioithieu.php';
      break;
    case 'phanhoi':
      include './view/user/phanhoi.php';
      break;
    case 'timsp':
      if (isset($_POST['timsp'])) {
        if (isset($_POST['kyw']) && ($_POST['kyw'] != " ")) {
          $kyw = $_POST['kyw'];
          $products = timsp($kyw);
        }
      }
      require_once './view/user/home.php';
      break;
    case 'chitiet_sanpham':

      if (isset($_GET['id'])) {
        if (isset($_GET['iddm'])) {
          $id = $_GET['id'];
          $iddm = $_GET['iddm'];
          if (isset($_GET['so_sanpham_tren1trang'])) {
            $so_sanpham_tren1trang = $_GET['so_sanpham_tren1trang'];
          } else {
            $so_sanpham_tren1trang = 6;
          }
          if (isset($_GET['trang'])) {
            $trang = $_GET['trang'];
          } else {
            $trang = 1;
          }
          $so_binhluan = dem_binh_luan_theo_sanpham($id);
          $binhluan = show_binhluan($id, $so_sanpham_tren1trang, $trang);
          $sotrang = sotrang($id, $so_sanpham_tren1trang);
          $product = chitiet_sp($id);
          $reps = show_rep($id);
          $products_lienquan = sanpham_lienquan($id, $iddm);
          view($id);
        }
      }
      include './view/user/detail_product.php';
      unset($_SESSION['thongbaobinhluan']);
      break;
    case 'vao_trang_dangnhap':

      include_once './view/user/login.php';
      unset($_SESSION['dangkythanhcong']);
      $_SESSION['thongbao'] = " ";
      break;
    case 'vao_trang_dangky':
      include_once './view/user/sign_up.php';
      break;
    case 'dangnhap':
      if (isset($_POST['dangnhap'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checkuser = checkuser($username, $password);
        if (is_array($checkuser)) {
          $_SESSION['user'] = $checkuser;
          header('location: index.php');
        } else {
          $_SESSION['thongbao'] = "Tài khoản hoặc mật khẩu không đúng";
          header('location: index.php?act=vao_trang_dangnhap');
        }
      }
      break;
    case 'dangkytk':

      if (isset($_POST['dangky'])) {
        $username = $_POST['username'];
        $mat_khau = $_POST['mat_khau'];
        $repassword = $_POST['repassword'];
        $ho_ten = $_POST['ho_ten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $dia_chi = $_POST['dia_chi'];
        $file = $_FILES['avt'];
        dangky($username, $mat_khau, $repassword, $ho_ten, $email, $dia_chi, $sdt, $file,);
        if (!isset($_SESSION['errors']['avt']) && !isset($_SESSION['errors']['username']) && !isset($_SESSION['errors']['password']) && !isset($_SESSION['errors']['repassword']) && !isset($_SESSION['errors']['hovaten']) && !isset($_SESSION['errors']['email']) && !isset($_SESSION['errors']['dia_chi']) && !isset($_SESSION['errors']['sdt'])) {
          $_SESSION['dangkythanhcong'] = "Đăng ký thành công";
          header("location: ./index.php?act=vao_trang_dangnhap");
        } else {
          header("location: ./index.php?act=vao_trang_dangky");
        }
      }


      break;
    case 'dangxuat':
      session_unset();
      header('location: index.php');
      break;
    case 'vao_trang_quenmk':
      include_once './view/user/forget_password.php';
      break;
    case 'quen_mat_khau':
      if (isset($_POST['gui'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];

        if (!isset($_SESSION['errors']['username']) && !isset($_SESSION['errors']['email'])) {
          quenmatkhau($email, $username);
        }
      }
      include './view/user/forget_password.php';
      break;
    case 'delete_binhluan':
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_GET['iddm'])) {
          $iddm = $_GET['iddm'];
          if (isset($_GET['id_binhluan'])) {
            $id_binhluan = $_GET['id_binhluan'];
            if (isset($_GET['so_sanpham_tren1trang'])) {
              $so_sanpham_tren1trang = $_GET['so_sanpham_tren1trang'];
            } else {
              $so_sanpham_tren1trang = 6;
            }
            if (isset($_GET['trang'])) {
              $trang = $_GET['trang'];
            } else {
              $trang = 1;
            }
            delete_binhluan2($id_binhluan);
            delete_binhluan($id_binhluan);
            $reps = show_rep($id);
            $product = chitiet_sp($id);
            $sotrang = sotrang($id, $so_sanpham_tren1trang);
            $binhluan = show_binhluan($id, $so_sanpham_tren1trang, $trang);
            $products_lienquan = sanpham_lienquan($id, $iddm);
            include_once './view/user/detail_product.php';
          }
        }
      }
      break;
    case 'guirep':
      if (isset($_POST['guirep'])) {
        if (isset($_SESSION['user'])) {
          if (isset($_GET['id_binhluan'])) {
            if (isset($_GET['id'])) {
              if (isset($_GET['iddm'])) {
                extract($_SESSION['user']);
                $id = $_GET['id'];
                $iddm = $_GET['iddm'];
                $id_binhluan = $_GET['id_binhluan'];
                $noidungfb = $_POST['rep'];
                guirep($ma_tk, $id, $noidungfb, $id_binhluan);
                if (isset($_GET['so_sanpham_tren1trang'])) {
                  $so_sanpham_tren1trang = $_GET['so_sanpham_tren1trang'];
                } else {
                  $so_sanpham_tren1trang = 6;
                }
                if (isset($_GET['trang'])) {
                  $trang = $_GET['trang'];
                } else {
                  $trang = 1;
                }
                $binhluan = show_binhluan($id, $so_sanpham_tren1trang, $trang);
                $sotrang = sotrang($id, $so_sanpham_tren1trang);
                $product = chitiet_sp($id);
                $reps = show_rep($id);
                $products_lienquan = sanpham_lienquan($id, $iddm);
                include_once './view/user/detail_product.php';
              }
            }
          }
        }
      }
      break;
    case 'delete_rep':
      if (isset($_GET['id'])) {
        if (isset($_GET['rep_id'])) {
          if (isset($_GET['iddm'])) {
            $id = $_GET['id'];
            $iddm = $_GET['iddm'];
            $rep_id = $_GET['rep_id'];
            delete_rep($rep_id);
            $products_lienquan = sanpham_lienquan($id, $iddm);
            $reps = show_rep($id);
            $product = chitiet_sp($id);
            if (isset($_GET['so_sanpham_tren1trang'])) {
              $so_sanpham_tren1trang = $_GET['so_sanpham_tren1trang'];
            } else {
              $so_sanpham_tren1trang = 6;
            }
            if (isset($_GET['trang'])) {
              $trang = $_GET['trang'];
            } else {
              $trang = 1;
            }
            $sotrang = sotrang($id, $so_sanpham_tren1trang);
            $binhluan = show_binhluan($id, $so_sanpham_tren1trang, $trang);
            include_once './view/user/detail_product.php';
          }
        }
      }
      break;
    case 'add_cart':
      if (isset($_POST['btn_cart'])) {
        $ma_sp = $_POST['ma_sp'];
        $soluongcuasp = $_POST['soluong'];
        for ($i = 0; $i <= count(($_SESSION['cart'])) - 1; $i++) {
          if ($_SESSION['cart'][$i][0] == $ma_sp) {
            $temp = $_SESSION['cart'][$i][4] + $_POST['soluong'];
            if ($temp >= $soluongcuasp) {
              $_SESSION['checksoluong'] = "Số lượng sản phẩm trong giỏ hàng lớn hơn số lượng sản phẩm";
              header("location: index.php?act=viewcart");
              exit;
            } else {
              $_SESSION['cart'][$i][4] += $_POST['so_luong'];
              header("location: index.php?act=viewcart");
              exit;
            }
          }
        }
        $ten_sp = $_POST['ten_sp'];
        $gia_sp = $_POST['gia_sp'];
        $hinh_anh = $_POST['hinh_anh'];
        $soluong = $_POST['soluong'];
        $spadd = [$ma_sp, $ten_sp, $gia_sp, $hinh_anh, $soluong];
        array_push($_SESSION['cart'], $spadd);
      }
      header("location: index.php?act=viewcart");
      break;
    case 'deleteCart':
      if (isset($_GET['idcart'])) {
        array_splice($_SESSION['cart'], $_GET['idcart'], 1);
      } else {
        $_SESSION['cart'] = [];
      }
      header("location: index.php?act=viewcart");
      break;
    case 'viewcart':
      include "./view/user/cart.php";
      break;
    case 'muahang':
      if (isset($_POST['btn_muahang'])) {
        $hovaten = trim($_POST['hovaten']);
        $tel = $_POST['tel'];
        $email = trim($_POST['email']);
        $dia_chi = trim($_POST['address']);
        $id_user = $_SESSION['user']['user_id'];
        $tong = $_POST['tong'];
        dathang($id_user, $hovaten, $tel, $email, $address, $tong);
        if (!isset($_SESSION['errors_muahhang']['hovaten']) && !isset($_SESSION['errors_muahhang']['email']) && !isset($_SESSION['errors_muahhang']['address']) && !isset($_SESSION['errors_muahhang']['tel'])) {
          $_SESSION['dangkythanhcong'] = "Đăng ký thành công";
          header("location: index.php?act=vao_trang_xacnhan_muahang");
        } else {
          header("location: index.php?act=vao_trang_xacnhan_muahang");
        }
      }
      break;
    case 'vao_trang_xacnhan_muahang';
      include './view/user/order_confirmation.php';
      break;
    case 'vao_donhang':
      if (isset($_SESSION['user'])) {
        $ma_tk = $_SESSION['user']['ma_tk'];
        $my_orders = showdonhang_theo_user($ma_tk);
      }
      include './view/user/my_order.php';
      break;
    case 'chitiet_order':
      if (isset($_GET['ma_donhang'])) {
        $ma_donhang = $_GET['ma_donhang'];
        $order_details = show_chitiet_order($ma_donhang);
      }
      include './view/user/order_detail.php';
      break;
    case 'capnhat_cart':
      if (isset($_POST['caphnhatgiohang'])) {
        $soluong = $_POST['soluong'];
        for ($i = 0; $i <= count(($soluong)) - 1; $i++) {
          $_SESSION['cart'][$i][4] = $soluong[$i];
          echo $_SESSION['cart'][$i][4];
        }
      }
      $_SESSION['capnhatgiohang'] = "Cập nhật giỏ hàng thành công";
      header("location: index.php?act=viewcart");
      break;
    case 'vao_trang_doimatkhau':

      include './view/user/change_password.php';
      break;
    case 'doimatkhau':
      if (isset($_POST['xacnhandoimk'])) {
        $username = $_POST['username'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $re_new_password = $_POST['re_new_password'];
        doimatkhau($username, $old_password, $new_password, $re_new_password);
        if (!isset($_SESSION['error_doimk']['username']) && !isset($_SESSION['error_doimk']['old_password']) && !isset($_SESSION['error_doimk']['new_password']) && !isset($_SESSION['error_doimk']['re_new_password'])) {
          $_SESSION['doimatkhau_thanhcong'] = "Đổi mật khẩu thành công";
          header("location: index.php?act=vao_trang_doimatkhau");
        }
      }
      break;
    case 'vao_trang_taikhoan':
      if (isset($_SESSION['user']['ma_tk'])) {
        $ma_tk = $_SESSION['user']['ma_tk'];
        $user = show_tt_theo_user($ma_tk);
        include './view/user/detail_user.php';
      }

      break;
    case 'capnhat_tk';
      if (isset($_POST['capnhattk'])) {
        $ma_tk = $_POST['ma_tk'];
        $hovaten = $_POST['ho_ten'];
        $email = $_POST['email'];
        $tel = $_POST['sdt'];
        $address = $_POST['dia_chi'];
        $file = $_FILES['img'];
        $old_img = $_POST['old_img'];
        capnhat_tk($ma_tk, $hovaten, $email, $tel, $address, $file, $old_img);
        if (!isset($_SESSION['errors']['img']) && !isset($_SESSION['errors']['ho_ten']) && !isset($_SESSION['errors']['email']) && !isset($_SESSION['errors']['dia_chi']) && !isset($_SESSION['errors']['sdt'])) {
          $_SESSION['capnhatthanhcong'] = "Cập nhật tài khoản thành công";
          header("location: index.php?act=vao_trang_taikhoan");
        } else {
          header("location: index.php?act=vao_trang_taikhoan");
        }
      }
      break;
    default:
      include './view/user/home.php';
  }
} else {
  include './view/user/home.php';
}
include './view/user/footer.php';
ob_end_flush();
?>