<?php if(isset($_SESSION['iduser'])):?>
<div action="index.php?redirect=thanhtoan" method="post" class="container pb-5 mb-2 mt-4">
    <!-- Cart Item-->
    <?php
        $giohang = donHangCuaToi();
        foreach($giohang as $row):
            extract($row);
    ?>       
    <div class="cart-item d-md-flex justify-content-between">
        <!-- <span class="remove-item"><i
                class="fa fa-times"></i></span> -->
        <div class="px-3 my-3">
            <a class="cart-item-product" href="#">
                <div class="cart-item-product-info">
                    <h4 class="cart-item-product-title">Bill Number:<?=$idbill?>
                </div>
                <div class="px-3 my-3 text-center">
            <div class="cart-item-label">Thông tin:
                <div>SĐT: <?=$receive_tel ?></div>
                <div>Địa Chỉ: <?=$receive_address ?></div>
            </div>
            
        </div>
            </a>
            
        </div>
       
        <div class="px-3 my-3 text-center">
            <div class="cart-item-label">Tổng Tiền</div><span class="text-xl font-weight-medium"><?=$total?>
                vnđ</span>
        </div>
        <div class="px-3 my-3 text-center">Trạng thái:
            <a href="index.php?redirect=xoagiohang&id=<?=$idcart?>" class="text-xl font-weight-medium" style="text-decoration:none; color:#33CC00">
                <?php if($bill_status==0){
                    echo 'Chờ xác nhận';   
                }else if($bill_status == 1){
                    echo 'đang lấy hàng';
                }else if($bill_status == 2){
                    echo 'đang giao hàng';
                }else if($bill_status == 3){
                    echo "giao hàng thành công";
                }else if($bill_status == 4){
                    echo "Đã nhận được hàng";
                }
                ?>
            </a>
        </div>
        <div class="px-3 my-3 text-center">
            <div class="text-xl font-weight-medium">
                <?php if($bill_status==0 || $bill_status == 1){?>
                    <a href="index.php?redirect=huydonhang&id=<?=$idbill?>"><button class="btn btn-warning">Hủy đơn hàng</button>  </a>
                <?php }else if($bill_status == 3 || $bill_status == 2){?>
                   <a href="index.php?redirect=update_nhanhang&id=<?=$idbill?>"><button class="btn btn-danger">Đã nhận được hàng</button></a>
                <?php }else if($bill_status == 4){?>
                   <button class="btn btn-primary">Đánh giá (bảo trì)</button>
                <?php } ?><br/><br>
                <button class="btn btn-success"><a style="color:white; text-decoration:none " href="index.php?redirect=billct&id_bill=<?=$idbill?>">Xem chi tiết đơn hàng</a></button>
            </div>
        </div>
    </div>
    <?php endforeach?>
</div>
<?php endif?>