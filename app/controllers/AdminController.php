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

        }
    }
?>