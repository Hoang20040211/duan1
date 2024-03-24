

<?php ob_start();?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
    </head>
    <header style="background-color:#A9A9A9">
            <div class="boxcenter">
                <div class="logo">
                    <div class="row">
                        <div style="background-color:#A9A9A9;" class="col-md-2">
                            <a href="#">
                                <img style="border-radius:10px; color:black;margin-top:8px; margin-left:30px;width:100px;height:50px" src="public/img/log.png" alt="" >
                            </a>
                        </div>
                        <div style="background-color:#A9A9A9" class="col-md-6 ali_center">
                            <form class="seach-home" action="index.php?redirect=search" method="post">
                                <div class="input-group rounded">
                                    <input type="search" class="form-control rounded" placeholder="Search" name="search_input" aria-label="Search" aria-describedby="search-addon" />
                                    <span style="background-color:#828282; color:white" class="input-group-text border-0" id="search-addon">
                                        <button style="border:none; background-color:#828282;" type="submit" name="search"><i style="color:white" class="bi bi-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>

                        <div style="background-color:#A9A9A9" class="col-md-4 ali_center">
                            <ul class="login-header">
                                <li>
                                    <a style="color:white" href="index.php?redirect=giohang">
                                    <span>
                                        <i style="color:white" class="bi bi-cart"></i>
                                    </span>
                                        Giỏ hàng
                                    </a>
                                </li>
                                <div class="login-hd">
                                <li>
                                    <?php
                                    // echo $_SESSION['user'];
                                    // echo $_SESSION['role'];
                                    if(empty($_SESSION['user'])){?>
                                    <a href="index.php?redirect=dangnhap" id="taikhoan">
                                        <span><i style="color:white" class="bi bi-person-fill"></i></span>
                                        đăng nhập
                                    </a>
                                    
                                    <?php }else{?>
                                    <div class="dropdown">
                                    <button class="dropbtn">Tài khoản </button>
                                    <div class="dropdown-content">
                                    <a style="color:white" href="index.php?redirect=dangxuat" class="button" id="tk">
                                    <span><i style="color:white" class="bi bi-person-fill"></i></span>
                                        ĐĂNG XUẤT
                                    </a>
                                    <a style="color:white" href="index.php?redirect=doimatkhau" class="button" id="tk">
                                    <span><i style="color:white" class="bi bi-person-fill"></i></span>
                                        ĐỔI MẬT KHẨU
                                    </a>
                                    <?php } ?>
                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1){?>
                                    <a style="color:white" href="app/views/admin/index.php" class="button" id="tk">
                                    <span><i style="color:white" class="bi bi-person-fill"></i></span>
                                        TRUY CẬP CPANEL
                                    </a>
                                    </div>
                                    </div>
                                    <?php } ?>
                                    
                                                                        
                                </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="" style="background-color:#C0C0C0; width: 1400px;margin-left:-20px;position: static;z-index: 1000;transition: top 0.3s;" id="menu">
                    <ul>
                        <li style=""><a href="index.php">Trang chủ</a></li>
                        <li style=""><a href="index.php?redirect=donhang">Đơn hàng </a></li>
                        <li style=""><a href="index.php?redirect=dmsp">Danh Mục Sản phẩm</a></li>
                        <li style=""><a href="index.php?redirect=tintuc">Tin tức</a></li>
                        <li style=""><a href="index.php?redirect=lienhe">Liên hệ</a></li>
                    </ul>
                </div>
