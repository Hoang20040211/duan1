
<div class="container-big">
    <div class="container">
        <div class="">
            <h3>Chi tiết đơn hàng</h3><br>
        </div>
        <?php $id_bill = $_GET['id_bill'];?>
        <strong>ID hóa đơn</strong><br><br>
        <input disabled type="text" name="tensp" value="<?= $id_bill ?>" required>
        <br><br><br><strong style="margin-top:1%;">Sản phẩm đặt hàng:</strong><br><br>
        <?php 
        $idbill = $_GET['id_bill'];
        $billct = billct($idbill);
        foreach($billct as $row):
            extract($row);
        ?>

            <div class="abczzz">
                <div>     
                    <p>🔖<?= $name ?> </p> 
                </div><br>
                <div>
                    <p style="margin-left:20px">Số lượng : <?=$soluong?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div>
        <strong> Tổng tiền</strong><br><br>
        <p style="color:gray;"><?= $total ?>.VNĐ </p>
        <strong>Tên người đặt: </strong>
        <p style="color:gray;"> <?= $receive_name ?></p>
        <strong>Địa chỉ nhận hàng: </strong><br>
        <p style="color:gray;"><?= $receive_address ?></p>
        <strong>Số điện thoại: </strong><br>
        <p style="color:gray;"><?= $receive_tel ?></p>
        <strong>Tình trạng đơn hàng: </strong><br>
        <?php if($bill_status == 0 ){?>
            <p style="color:gray;">Chờ xác nhận</p>
        <?php } else if ($bill_status == 1){ ?>
            <p style="color:gray;">Đang chờ lấy hàng</p>
        <?php } else if ($bill_status == 2){ ?>
            <p style="color:gray;">Đang giao hàng</p>
        <?php } else if ($bill_status == 3){ ?>
            <p style="color:gray;">Đã giao hàng</p>
        <?php } else if ($bill_status == 4){ ?>
            <p style="color:gray;">Đã nhận được hàng</p>
        <?php } ?>  
    </div>
</div>
<style>
    .abczzz{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    .container-big{
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin-left: 200px;
        margin-top: 50px;
    }
</style>