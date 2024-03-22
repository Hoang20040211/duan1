<?php 

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            $err = $tenloai = "";
            //kiểm tra xem ng dùng có click add ko ?
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {

                if (empty($_POST["tenloai"])) {
                    $err = "Không được để trống ! ";
                } else {
                    $tenloai = $_POST['tenloai'];
                    if($_FILES['hinh']['name'] != ""){
                        $hinh = basename($_FILES["hinh"]["name"]);
                        $target_dir = "../../../public/img/";
                        $target_file = $target_dir . $hinh;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);  
                    }else{
                        $hinh ="";
                    }
                    insert_danhmuc($tenloai,$hinh);
                    $thongbao = "Thêm danh mục thành công";
                }
            }

            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

            // case 'listtt':
            //         $listtinhtrang = loadall_tinhtrang();
            //         include "tinhtrang/list.php";
            //         break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }

            $sql = "select * from danhmuc order by id desc";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }

            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                if($_FILES['hinh']['name'] != ""){
                    $hinh = basename($_FILES["hinh"]["name"]);
                    $target_dir = "../../../public/img/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);  
                }else{
                    $hinh ="";
                }
                update_danhmuc($id, $tenloai,$hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            case 'addsp':
                $err = $tensp = $giasp =  $mota = "";
                //kiểm tra xem ng dùng có click add ko ?
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    if (empty($_POST['tensp'])) {
                        $err = "Không được để trống tên sản phẩm ! <br>";
                    }
                    if (empty($_POST['giasp'])) {
    
                        $err1 = "Không được để trống giá sản phẩm ! <br>";
                    }
                    if (empty($_POST['mota'])) {
    
                        $err2 = "Không được để trống mô tả sản phẩm ! <br>";
                    }
                    else {
                        $iddm = $_POST['iddm'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        if($_FILES['hinh']['name'] != ""){
                            $hinh = basename($_FILES["hinh"]["name"]);
                            $target_dir = "../../../public/img/";
                            $target_file = $target_dir . $hinh;
                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);  
                        }else{
                            $hinh ="";
                        }
    
                        insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                        $thongbao = "Thêm thành công";
                    }
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;
                // case 'addcart':
                //     //kiểm tra xem ng dùng có click add ko ?
                //     if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
    
                //         $idpro = $_POST['idpro'];
                //         $price = $_POST['price'];
                //         $soluong = $_POST['soluong'];
                //         $thanhtien = $_POST['thanhtien'];
    
    
                //         insert_cart2($idpro, $price, $soluong, $thanhtien);
                //         $thongbao = "Thêm thành công";
                //     }
    
                //     include "bill/listbill.php";
                //     break;
            case 'listsp':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $kyw = '';
                    $iddm = 0;
                }
                $giatien = 0;
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw, $iddm, $giatien);
    
                include "sanpham/list.php";
                break;
    
            case 'xoasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_sanpham($_GET['id']);
                }
                $giatien = 0;
                $listsanpham = loadall_sanpham("", 0, $giatien);
                include "sanpham/list.php";
                break;
    
            case 'suasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['id']);
                }
    
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;
    
            case 'suatt':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $bill = loadone_bill($_GET['id']);
                }
                $list_tt = loadall_tt();
                include "bill/updatett.php";
                break;
    
    
            case 'updatesp':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    if($_FILES['hinh']['name'] != ""){
                        $hinh = basename($_FILES["hinh"]["name"]);
                        $target_dir = "../../../public/img/";
                        $target_file = $target_dir . $hinh;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);  
                    }else{
                        $hinh ="";
                    }
                    update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                    $thongbao = "Cập nhật thành công";
                }
                $giatien = 0;
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", 0, $giatien);
                include "sanpham/list.php";
                break;
                default:
            break;

        }
    }
?>