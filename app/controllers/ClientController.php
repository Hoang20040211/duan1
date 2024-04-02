<?php 
if(isset($_GET['redirect'])){
    $redirect = $_GET['redirect'];
    switch($redirect){
        case 'dangnhap':
            if(isset($_POST['dangnhap'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $taikhoan = dangnhap($user, $pass);
                if($taikhoan['user'] == $user && $taikhoan['pass'] == $pass){
                    $_SESSION['user'] = $user;
                    $_SESSION['role'] = $taikhoan['role'];
                    $_SESSION['iduser'] = $taikhoan['id'];
                    echo '<script>alert("Đăng nhập thành công")</script>';
                    echo '<script>window.location.href = "index.php"</script>';
                }else{
                    echo '<script>alert("Sai tài khoản hoặc mật khẩu")</script>';
                    echo '<script>window.location.href = "index.php?redirect=dangnhap"</script>';

                }
            }
            include ("app/views/client/taikhoan/dangnhap.php");
            break;
        case 'dangky':
            if(isset($_POST['dangky'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $cfpass = $_POST['cfpass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                if($cfpass == $pass){
                    addtaikhoan($user,$pass,$email,$address,$tel,$role);
                    echo '<script>alert("Đăng ký thành công")</script>';
                }else{
                    echo '<script>alert("Mật khẩu xác nhận không khớp")</script>';
                }
            }   
            include ("app/views/client/taikhoan/dangky.php");
            break;
        case 'dangxuat':
            unset($_SESSION['user']);
            unset($_SESSION['iduser']);
            unset($_SESSION['role']);
            header("location: index.php");
            break;
        case 'quenmk':
            if(isset($_POST['laymatkhau'])){
                $email = $_POST['email'];
                $user = $_POST['user'];
                $check = layMatkhau($email,$user);
                if (!empty($check)) {
                    $pass = $check[0]['pass'];
                    $err= "mật khẩu của bạn là: $pass";
                } else {
                    $err = "Không tìm thấy tài khoản";
                }
            }
            include ("app/views/client/taikhoan/quenmk.php");
            break;
        case 'doimatkhau':
            if(isset($_POST['doimatkhau'])){
                $iduser = $_SESSION['iduser'];
                $pass = $_POST['pass'];
                $cfpass = $_POST['cfpass'];
                if($pass == $cfpass){
                    changePass($pass,$iduser);
                    echo '<script>alert("Đổi mật khẩu thành công")</script>';

                }else{
                    echo '<script>alert("Mật khẩu xác nhận không khớp")</script>';
                }
            }
            include ("app/views/client/taikhoan/doimatkhau.php");
            break;
        case 'dmsp':
            include ("app/views/client/danhmuc/dmsp.php");
            break;
        case 'sptheodanhmuc':
            include ("app/views/client/sanpham/sptheodm.php");
            break;
        case 'ctsp':
            include ("app/views/client/sanpham/ctsp.php");
            break;
        case 'tintuc':
            include ("app/views/client/chucnangphu/tintuc.php");
            break;
        case 'lienhe':
            include ("app/views/client/chucnangphu/lienhe.php");
            break;
        case 'giohang':
            include ("app/views/client/sanpham/giohang.php");
            break;
        case 'themgiohang':
            if (isset($_POST['themgiohang'])) { 
                if (isset($_SESSION['iduser'])) {
                    $soluong = $_POST['soluong'];
                    // $size = $_POST['size'];
                    $iduser = $_POST['iduser'];
                    $idpro = $_POST['idpro']; // Assuming idpro is a unique identifier for the product
            
                    if ($_POST['soluong'] == "") {
                        $soluong = 1;
                    } else {
                        $soluong = $_POST['soluong'];
                    }
            
                    $price = $_POST['price'];
                    $thanhtien = $soluong * $price;
                    $gioHang = gioHang();
            
                    // Check if $gioHang contains any items with the same idpro
                    $found = false;
                    foreach ($gioHang as $item) {
                        if ($idpro == $item['idpro']) {
                            $found = true;
                            updateGioHang($soluong, $idpro, $iduser, $thanhtien);
                        }
                    }
            
                    // If the item is not found in the cart, add it
                    if (!$found) {
                        addgiohang($iduser, $idpro, $soluong, $thanhtien);
                    }
            
                    include ("app/views/client/sanpham/giohang.php");
                } else {
                    // echo '<script>alert("Chưa đăng nhập")</script>';
                    echo '<script>window.location.href="index.php?redirect=dangnhap"</script>';
                }
            }
            
            break;
        case 'xoagiohang':
            include ("app/views/client/sanpham/xoagiohang.php");
            break;
        case 'huydonhang':
            include ("app/views/client/sanpham/huydonhang.php");
            break;
        case 'thongtin':
                if(isset($_SESSION['user'])){
                    if(isset($_POST['muangay'])){
                        // $tel = $_POST['receive_tel'];
                        // $user = $_POST['iduser'];
                        // $bill_status = $_POST['bill_status'];
                        // muahang($iduser,$ngaydathang,$tongtien,$bill_status,$address,$tel,$user);
                        include "app/views/client/taikhoan/thongtin.php";
                    }
                }else{
                    // echo '<script>alert("Chưa đăng nhập")</script>';
                    echo '<script>window.location.href="index.php?redirect=dangnhap"</script>';
                }
            break;
        case 'thanhtoan':
            if(isset($_POST['thanhtoan'])){
                if(isset($_SESSION['user'])){
                $idpro = $_POST['idpro'];
                // print_r($idpro);
                $iduser = $_POST['iduser'];
                $soluong = $_POST['soluong'];
                // print_r($soluong);
                $tongtien = $_POST['tongtien'];
                $ngaydathang = $_POST['ngaydathang'];
                $address = $_POST['receive_address'];
                $tel = $_POST['receive_tel'];
                $user = $_POST['receive_name'];
                $bill_status = $_POST['bill_status'];
                muahang($iduser,$ngaydathang,$tongtien,$bill_status,$address,$tel,$user);
                foreach($idpro as $key => $value){
                    $getid = getId();
                        foreach($getid as $row):
                            extract($row);
                        addBillCt($value,$soluong[$key],$iduser,$idBillNewest);
                        endforeach;
                    }
                echo '<script>alert("Thanh toán thành công")</script>';
                echo '<script>window.location.href="index.php?redirect=donhang"</script>';
                }
            }
            include ("app/views/client/sanpham/giohang.php");
            break;
        case 'donhang':
            include ("app/views/client/sanpham/donhangcuatoi.php");
            break;
        case 'billct':
            include ("app/views/client/sanpham/billct.php");
            break;
        case 'update_nhanhang':
            $idbill = $_GET['id'];
            update_nhanhang($idbill);
            break;
        case 'addbinhluan':
            if(isset($_POST['binhluan'])){
                if(isset($_SESSION['user'])){
                $noidung = $_POST['noidung'];
                $ngaybinhluan = $_POST['ngaybinhluan'];
                $iduser = $_POST['iduser'];
                $idpro = $_POST['idpro'];
                addbinhluan($noidung,$iduser,$idpro,$ngaybinhluan);
                header("location: index.php?redirect=ctsp&id=$idpro");
                }else{
                    // echo '<script>alert("Chưa đăng nhập")</script>';
                    echo '<script>window.location.href="index.php?redirect=dangnhap"</script>';

                }
            }
            break;
        case 'search':
            if(isset($_POST['search'])){
                $search_input = $_POST['search_input'];
                search($search_input);
            }
            include ("app/views/client/sanpham/timkiem.php");
            break;

        default:
            include "app/views/client/layout/home.php";
            break;
    }
    }else{
        include "app/views/client/layout/home.php";
    }
?>