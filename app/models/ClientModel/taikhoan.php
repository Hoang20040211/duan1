<?php 
function addtaikhoan($user,$pass,$email,$address,$tel,$role){
    $sql = "INSERT INTO taikhoan(user,pass,email,address,tel,role)
     VALUES ('$user','$pass','$email','$address','$tel','$role')";
     pdo_execute($sql);
}
function dangnhap($user, $pass){
    $sql = "SELECT * FROM taikhoan WHERE user = '$user' AND pass = '$pass'";
    $result = pdo_query_one($sql);
    return $result;
}
function thongtin(){
    if(isset($_SESSION['iduser'])){
        $id = $_SESSION['iduser'];
    $sql ="SELECT * FROM taikhoan WHERE id = $id";
    $result = pdo_query($sql);
    return $result;
} 
}
function layMatkhau($email,$user){
    $sql = "SELECT pass FROM taikhoan where email = '$email' AND user = '$user'";
    $result = pdo_query($sql);
    return $result;
}
function changePass($pass,$iduser){
    $sql = "UPDATE taikhoan set pass = '$pass' WHERE id = $iduser";
    pdo_execute($sql);
}