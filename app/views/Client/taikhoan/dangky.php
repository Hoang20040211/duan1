
<section style="margin-top:20px" class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                  <img src="public/img/user.png" style="width:400px; margin-left:70px"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form method="post">
          
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Tên đăng nhập</label>
                      <input type="text" name="user" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Nhập tên" />
                      
                    </div>
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Số điện thoại</label>
                      <input type="number" name="tel" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Nhập số điện thoại" />
                      
                    </div>
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Địa chỉ</label>
                      <input type="text" name="address" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Nhập địa chỉ" />
                      
                    </div>
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email</label>
                      <input type="text" name="email" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Email" />
                     
                    </div>
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Mật khẩu</label>
                      <input type="password" name="pass" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Nhập mật khẩu" />
                      
                      <input type="hidden" name="role" value="0" id=""><br>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Xác nhận mật khẩu</label>
                      <input type="password" name="cfpass" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Xác nhận" />
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="submit" name="dangky" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng ký</button>
                      <p class="small fw-bold mt-2 pt-1 mb-0">Đã có tài khoản ? <a href="index.php?redirect=dangnhap"
                          class="link-danger">Đăng nhập</a></p>
                    </div>
          
                  </form>
                </div>
              </div>
            </div>
          </section>