<?php 
  $idsp = $_GET['id'];
  $ctsp = chiTietSanPham($idsp);
  foreach($ctsp as $row) :
  extract($row)?>
  <main>
    <div class="boxcenter">
      <section class="py-5 mt-4">
        <div class="container">
          <div class="row gx-5">
            <aside class="col-lg-6">
              <div class="border rounded-4 mb-3 d-flex justify-content-center">
                <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                  href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
                  <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                    src="public/img/<?=$img?>" />
                </a>
              </div>
              <div class="d-flex justify-content-center mb-3">
                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href=""
                  class="item-thumb">
                  <img width="60" height="60" class="rounded-2" src="public/img/<?=$img?>" />
                </a>
                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                  href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp"
                  class="item-thumb">
                  <img width="60" height="60" class="rounded-2" src="public/img/<?=$img?>" />
                </a>
                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                  href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp"
                  class="item-thumb">
                  <img width="60" height="60" class="rounded-2" src="public/img/<?=$img?>" />
                </a>
                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                  href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp"
                  class="item-thumb">
                  <img width="60" height="60" class="rounded-2" src="public/img/<?=$img?>" />
                </a>
                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                  href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp"
                  class="item-thumb">
                  <img width="60" height="60" class="rounded-2" src="public/img/<?=$img?>" />
                </a>
              </div>
              <!-- thumbs-wrap.// -->
              <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
              <form class="ps-lg-3" action="" id="myForm" method="post">
                <h4 class="title text-dark">
                  <?=$name_sp?>
                </h4>
                <div class="d-flex flex-row my-3">
                  <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 Lượt xem</span>
                </div>

                <div class="mb-3">
                  <span class="h5"><?=$price?> vnđ</span>
                  <span class="text-muted">/per box</span>
                </div>
                <p>
                  <?=$mota?>
                </p>

                <div class="row">
                  <dt class="col-3">Kiểu:</dt>
                  <dd class="col-9">Regular</dd>

                  <dt class="col-3">Màu</dt>
                  <dd class="col-9">Brown</dd>

                  <dt class="col-3">Chất liệu</dt>
                  <dd class="col-9">Cotton, Jeans</dd>

                  <dt class="col-3">Hãng</dt>
                  <dd class="col-9"><?=$name_dm?></dd>
                </div>

                <hr />

                <div class="row mb-4">
                  <div class="col-md-4 col-6">
                    <label class="mb-2">Size</label>
                    <select name="size" class="form-select border border-secondary" style="height: 35px;">
                      <option value="36">36</option>
                      <option value="37">37</option>
                      <option value="38">38</option>
                      <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="44">44</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-6 mb-3">
                    <label class="mb-2 d-block">Số lượng</label>
                    <div class="input-group mb-3" style="width: 170px;">
                      <input type="number" oninput="validateQuantity(this)" name="soluong" min="1" class="form-control text-center border border-secondary"
                        aria-label="Example text with button addon" aria-describedby="button-addon1" />
                    </div>
                  </div>
                  <input type="hidden" name="idpro" value="<?=$idsp?>">
                  <input type="hidden" name="price" value="<?=$price?>">
                  <input type="hidden" name="ngaydathang" value="<?php echo date("Y-m-d") ?>">
                  <?php
                  $tt = thongtin(); 
                  if(isset($tt)){
                  foreach($tt as $row):
                  extract($row);
                  
                  ?>
                  <input type="hidden" name="receive_name" value="<?=$user?>">
                  <input type="hidden" name="receive_address" value="<?=$address?>">
                  <input type="hidden" name="receive_tel" value="<?=$tel?>">
                  <?php endforeach ;} ?>
                  <?php if(isset($_SESSION['iduser'])):?>
                  <input type="hidden" name="iduser" value="<?=$_SESSION['iduser']?>">
                  <?php endif ?>
                </div>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary mx-2">Mua ngay</button>
                <button type="submit" id="thanhtoan" style="display:none" name="muangay" onclick="submitForm('muangay')" class="btn btn-warning shadow-0"> Mua ngay</button>
                <button type="submit" name="themgiohang" onclick="submitForm('addtocart')" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Thêm vào giỏ hàng </button>
              </form>
              <?php endforeach;?>
            </main>
          </div>
        </div>
      </section>
    </div>
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Chọn phương thức thanh toán</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>

        </div>
      </div>
    </div>
    <script>
      function handleButtonClick() {
        document.getElementById('thanhtoan').click();
      }

      document.getElementById('popupButton').addEventListener('click', handleButtonClick);
    </script>
    <script>
    function submitForm(action) {
        var form = document.getElementById("myForm");

        // Kiểm tra giá trị của action và chuyển hướng action tương ứng
        if (action === 'muangay') {
            form.action = "index.php?redirect=thongtin"; // Thay đổi thành đường dẫn thích hợp cho Buy Now
        } else if (action === 'addtocart') {
            form.action = "index.php?redirect=themgiohang"; // Thay đổi thành đường dẫn thích hợp cho Add to Cart
        }

        // Submit form
        form.submit();
        }
    </script>
    <section class="bg-light border-top py-4">
      <div class="container">
        <div class="row gx-4">
          <div class="col-lg-6 mb-4">
            <div class="customer-reviews">
              <?php include("app/views/Client/chucnangphu/binhluan.php")?>
            <hr>
              <div class="reviews-wrapper">
                <?php 
                $idsp = $_GET['id'];
                $cmt = loadAllBinhLuan($idsp);
                foreach($cmt as $row):
                  extract($row);?>

                <div class="d-flex flex-column flex-lg-row gap-3">
                  <div class=""><span class="badge bg-green rounded-0">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"></font>
                      </font>
                    </span></div>
                  <div class="flex-grow-1">
                    <p class="mb-2">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"><?=$noidung?>
                        </font>
                      </font>
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                      <div class="hstack flex-grow-1 gap-3">
                        <p class="mb-0">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><?=$username?></font>
                          </font>
                        </p>
                        <div class="vr"></div>
                        <div class="date-posted">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><?=$ngaybinhluan?></font>
                          </font>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <?php endforeach ?>

                
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="px-0 border rounded-2 shadow-0">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Similar items</h5>

                  <?php 
                  // echo $idsp;echo $iddm;
                  $spcl = sanPhamCungLoai($iddm,$idsp);
                    foreach($spcl as $row):
                    extract($row);
                    ?>
                  <div class="d-flex mb-3">
                    <a href="index.php?redirect=ctsp&id=<?=$idsp?>" class="me-3">
                      <img src="public/img/<?=$img?>" style="min-width: 96px; height: 96px;"
                        class="img-md img-thumbnail" />
                    </a>
                    <div class="info">
                      <a href="index.php?redirect=ctsp&id=<?=$idsp?>" class="nav-link mb-1">
                        <?=$name_sp?> <br />
                      </a>
                      <strong class="text-dark mx-3"> <?=$price?></strong>
                    </div>
                  </div>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
<script>
function validateQuantity(input) {
    if (input.value <= 0) {
        input.value = 1; // Đặt lại giá trị thành 1 nếu giá trị là 0 hoặc âm
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
