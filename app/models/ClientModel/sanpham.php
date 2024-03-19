<?php 
function loadAllSpAds(){
    $sql = "SELECT *, sanpham.name as name_sp FROM sanpham
    WHERE sanpham.iddm = 19
    ORDER BY sanpham.id DESC
    LIMIT 4";
    $result = pdo_query($sql);
    return $result;
}
function loadAllSpGucci(){
    $sql = "SELECT *, sanpham.name as name_sp FROM sanpham
    WHERE sanpham.iddm = 23
    ORDER BY sanpham.id DESC
    LIMIT 4";
    $result = pdo_query($sql);
    return $result;
}
function loadAllSpNike(){
    $sql = "SELECT *, sanpham.name as name_sp FROM sanpham
    WHERE sanpham.iddm = 20
    ORDER BY sanpham.id DESC
    LIMIT 4";
    $result = pdo_query($sql);
    return $result;
}
function chiTietSanPham($idsp){
    $sql = "SELECT *,sanpham.name as name_sp,danhmuc.name as name_dm, sanpham.id as idsp FROM danhmuc
    JOIN sanpham ON danhmuc.id = sanpham.iddm
    WHERE sanpham.id = $idsp";
    $reuslt = pdo_query($sql);
    return $reuslt;
}
function search($search_input){
    $sql = "SELECT * FROM sanpham WHERE name LIKE '%$search_input%'";
    $reuslt = pdo_query($sql);
    return $reuslt;
}
function addgiohang($iduser,$idpro,$size,$soluong,$thanhtien){
    $sql = "INSERT INTO cart(iduser, idpro, size, soluong, thanhtien)
     VALUES ('$iduser','$idpro','$size','$soluong','$thanhtien')";
     pdo_execute($sql);
}
function gioHang(){
    if(isset($_SESSION['iduser'])){
    $iduser = $_SESSION['iduser'];
    }
    $sql = "SELECT tel,address,user,cart.id as idcart,sanpham.name as namesp,sanpham.id as idpro ,sanpham.img as imgsp, danhmuc.name as namedm, size,soluong,thanhtien FROM cart
    JOIN sanpham ON sanpham.id = cart.idpro
    JOIN danhmuc ON danhmuc.id = sanpham.iddm
    JOIN taikhoan ON taikhoan.id = cart.iduser
    WHERE iduser = '$iduser'";
    $reuslt = pdo_query($sql);
    return $reuslt;
}
function updateGioHang($soluong, $idpro, $iduser,$thanhtien){
    $sql = "UPDATE cart SET soluong = soluong + $soluong,thanhtien = thanhtien + $thanhtien  WHERE idpro = $idpro AND iduser = $iduser";
    pdo_execute($sql);
}
function sumThanhTien(){
    $iduser = $_SESSION['iduser'];
    $sql = "SELECT sum(thanhtien) as tongtien FROM cart  WHERE iduser = '$iduser'";
    $soluong = pdo_query_one($sql);
    return $soluong;
}
function muahang($iduser,$ngaydathang,$tongtien,$bill_status,$address,$tel,$user){
    $sql = "INSERT INTO bill(iduser, ngaydathang, total, bill_status, receive_name, receive_address, receive_tel)
    VALUES ('$iduser','$ngaydathang','$tongtien','$bill_status','$user','$address','$tel')";
    pdo_execute($sql);
}
function donHangCuaToi(){
    if(isset($_SESSION['iduser'])){
        $iduser = $_SESSION['iduser'];
    }
    $sql = "SELECT *,bill.id as idbill FROM bill
    JOIN taikhoan ON taikhoan.id = bill.iduser
    WHERE iduser = $iduser";
    $ressult = pdo_query($sql);
    return $ressult;
}
function addBillCt($idpro,$soluong,$iduser,$idBillNewest){
    $sql = "INSERT INTO bill_chitiet( idpro, soluong, iduser, id_bill) VALUES ('$idpro','$soluong','$iduser','$idBillNewest')";
    pdo_execute($sql);
}
function getId(){
    $sql = "SELECT id as idBillNewest FROM bill
    ORDER BY id DESC
    LIMIT 1";
    $result = pdo_query($sql);
    return $result;
}
function billct($idbill){
    $sql= "SELECT * FROM bill_chitiet
    JOIN taikhoan ON bill_chitiet.iduser = taikhoan.id
    JOIN sanpham ON bill_chitiet.idpro = sanpham.id
    JOIN bill ON bill.id = bill_chitiet.id_bill
    WHERE bill_chitiet.id_bill = $idbill
    ";
    $result = pdo_query($sql);
    return $result;
}
function update_nhanhang($id_bill){
    $sql = "UPDATE bill SET bill_status = 4 WHERE id = $id_bill";
    pdo_query($sql);
}