<?php if(isset($_SESSION['iduser'])):?>
          
            <form action="index.php?redirect=thanhtoan" method="post" class="container pb-5 mb-2 mt-4">
                <!-- Cart Item-->
                <?php
                 $giohang = gioHang();
                    foreach($giohang as $row):
                        extract($row);
                ?>       
                <?php if(isset($_SESSION['iduser'])):?>
                    <input type="hidden" name="iduser" value="<?=$_SESSION['iduser']?>">
                <?php endif?>
                    <input type="hidden" name="soluong[]" value="<?=$soluong?>">
                    <input style="width:100%; border:1px solid gray" type="text" name="idpro[]" value="<?=$idpro?>">
                    <input type="hidden" name="ngaydathang" value="<?php echo date("YMDHIS") ?>">
                    <input type="hidden" name="bill_status" value="0">

                <div class="cart-item d-md-flex justify-content-between">
                    <!-- <span class="remove-item"><i
                              class="fa fa-times"></i></span> -->
                    <div class="px-3 my-3">
                        <a class="cart-item-product" href="#">
                            <div class="cart-item-product-thumb"><img
                                    src="public/img/<?=$imgsp?>" alt="Product"></div>
                            <div class="cart-item-product-info">
                                <h4 class="cart-item-product-title"><?=$namesp?></h4>
                                <span>
                                    <!-- <strong>Hãng:</strong>
                                    <?=$namedm?></span><span><strong>Size:</strong> <?=$size?> -->
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 my-3 text-center">
                        <div class="cart-item-label">Số Lượng</div>
                        <div class="count-input">
                            <select class="form-control">
                                <option value="<?=$soluong?>"><?=$soluong?></option>
                                <option value="1" >1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="11">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="px-3 my-3 text-center">
                        <div class="cart-item-label">Hãng</div><span class="text-xl font-weight-medium">
                            <?=$namedm?> </span>
                    </div>
                    <div  class="px-3 my-3 text-center">
                        <button id="bt" style="border-radius:10px;width:60px;height:30px;background-color:red;"><a style="text-decoration:none; color:white;" href="index.php?redirect=xoagiohang&id=<?=$idcart?>" class="text-xl font-weight-medium">
                        Xóa
                        </a></button>
                    </div>
                </div>
                <?php endforeach?>
                <!-- Coupon + Tổng Tiền-->
                <div class="row">
                    <div class="col-lg-6">
                      
                    </div>
                    <div class="col-lg-6" style="">
                        <div class="abcxyz" style="margin-left:240px">
                            <h3>Thông tin người nhận</h3>
                            <?php $tt = thongtin();
                            foreach($tt as $row) :?>
                            <input type="text" required name="receive_name" value="<?=$row['user']?>"> <br/>
                            <input type="text" required name="receive_address" value="<?=$row['address']?>"><br/>
                            <input type="text" required name="receive_tel" value="<?=$row['tel']?>"><br/>
                            <?php endforeach?>
                        </div>
                        <div class="py-2 d-flex flex-row-reverse"><span
                            class="fw-bold align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">
                            Thành Tiền:<?php $sum = sumThanhTien();extract($sum);?>
                            <input type="hidden" name="tongtien" value="<?=$tongtien?>">
                            <input type="text" name="thanhtien" value="<?=$tongtien?>" disabled> 
                        </span></div>
                    </div>
                </div>
                <!-- Buttons-->
                <hr class="my-2">
                <div class="row pt-3 pb-5 mb-2">
                    <div class="col-lg-6">
                        <!-- <button type="button" class="btn btn-secondary">Quay Lại</button> -->
                    </div>
                    <div class="col-lg-6 d-flex flex-row-reverse">
                        <button type="submit" name="thanhtoan" style="display:none" id="thanhtoan" class="btn btn-primary mx-2">Tiếp Tục Thanh Toán</button>
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary mx-2">Chọn phương thức thanh toán</button>
                    </div>
                </div>
            </form>
<?php else:
    // echo '<script>alert("Chưa đăng nhập")</script>';
    echo '<script>window.location.href="index.php?redirect=dangnhap"</script>';
endif?>
   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chọn phương thức thanh toán</h4>
          <button type="button" class="close" data-dismiss="modal">  ✖️</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
          <button type="button" class="btn btn-success" id="popupButton" onclick="handleButtonClick()">Thanh toán bằng tiền mặt</button>
        </div>
        <div class="modal-body">
          <button type="button" class="btn btn-success" disabled onclick="handleButtonClick()">Thanh toán VNPAY (Bảo trì)</button>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  function handleButtonClick() {
    document.getElementById('thanhtoan').click();
    // document.getElementById('thongtin').click();
  }

  document.getElementById('popupButton').addEventListener('click', handleButtonClick);
</script>
<script>
  function updateTotalPrice(selectElement) {
    var selectedQuantity = selectElement.value; 
    var productPrice = <?=$thanhtien?>; 

    var totalPrice = selectedQuantity * productPrice;

    document.querySelector('input[name="thanhtien"]').value = totalPrice + ' vnđ';
  }
  document.querySelector('.count-input select').addEventListener('change', function() {
    updateTotalPrice(this); 
  });

  function handleQuantityChange() {
    var selectElement = document.querySelector('.count-input select');
    if (selectElement) {
      var event = new Event('change');
      selectElement.dispatchEvent(event);
    }
  }
  document.querySelector('.count-input select').addEventListener('change', handleQuantityChange);
</script>
<style>
    .abcxyz{
        padding: 20px;
    }
    .abcxyz input{
        margin: 2px;
        width: 300px;
    }
</style>