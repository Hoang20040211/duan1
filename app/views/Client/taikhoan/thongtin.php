<form method="post" action="index.php?redirect=thanhtoan">
    <?php 
        $iduser = $_POST['iduser'];
        $idpro = $_POST['idpro'];
        $soluong = $_POST['soluong'];
        $tongtien = $_POST['price'];
        $ngaydathang = $_POST['ngaydathang'];
        $address = $_POST['receive_address'];
        
    ?>
    <input type="hidden" name="iduser" value="<?=$iduser?>">
    <input type="hidden" name="idpro[]" value="<?=$idpro?>">
    <input type="hidden" name="soluong[]" value="<?=$soluong?>">
    <input type="hidden" name="tongtien" value="<?=$tongtien?>">
    <input type="hidden" name="ngaydathang" value="<?=$ngaydathang?>">
<h4 style="margin-top:20px">Thông tin người nhận</h4>
<?php $tt = thongtin();
foreach($tt as $row):extract($row);?>
<div class="form-outline md-4">
<label class="form-label" for="form3Example3">tên người nhận</label>
    <input type="text" required name="receive_name" id="form3Example3" class="form-control form-control-lg"
value="<?=$user?>" />
    
</div>
<div class="form-outline md-4">
<label class="form-label" for="form3Example3">địa chỉ</label>
    <input type="text" required name="receive_address" id="form3Example3" class="form-control form-control-lg"
    value="<?=$address?>" />
    
</div>

<!-- Password input -->
<div class="form-outline md-3">
<label class="form-label"  for="form3Example4">số điện thoại</label>
    <input type="text" id="form3Example4" required name="receive_tel" class="form-control form-control-lg"
    value="<?=$tel?>" />
    
</div>

<div class="d-flex justify-content-between align-items-center">
</div>

<div class="text-center text-lg-start mt-4 pt-2">
    <button type="submit" name="thanhtoan" class="btn btn-primary btn-lg"
    style="padding-left: 2.5rem; padding-right: 2.5rem;">Tiếp tục</button>
</div>
    <?php endforeach?>
</form>