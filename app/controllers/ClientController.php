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