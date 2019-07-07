<!-- Main Container -->
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Checkout</h2>
          <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                 echo $_SESSION['success'];
                 unset($_SESSION['success']);
                 ?>
            </div>
            <?php  endif ?>
            <?php
            if(isset($_SESSION['error'])):?>
            <div class="alert alert-danger">
                <?php
                 echo $_SESSION['error'];
                 unset($_SESSION['error'])
                ?>
            </div>
            <?php endif ?>
        </div>
       
            <div class="box-border">
                <form action="checkout.php" method="post">
                    <ul>
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="first_name" class="required">Họ tên</label>
                                <input type="text" class="input form-control" name="fullname" id="first_name" require>
                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label for="last_name" class="required">Email</label>
                                <input type="email" name="email" class="input form-control" id="last_name" require>
                            </div><!--/ [col] -->
                        </li><!--/ .row -->
                        <li class="row">
                            <div class="col-sm-6">
                                <label class="required">Giới tính</label>
                                    <select class="input form-control" name="gender">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                </select>
                                
                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label for="phone" class="required">Số điện thoại</label>
                                <input type="text" class="input form-control" name="phone" id="phone">
                            </div><!--/ [col] -->
                        </li><!--/ .row -->
                        <li class="row"> 

                            <div class="col-sm-6">
                                <label for="company_name">Địa chỉ</label>
                                <input type="text" name="address" class="input form-control" require id="company_name">
                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label class="required">Chọn hình thức thanh toán</label>
                                    <select class="input form-control" name="payment_method">
                                        <option value="COD">COD</option>
                                        <option value="chuyenkhoan">Chuyển khoản</option>
                                </select>
                                
                            </div><!--/ [col] -->
                        
                        </li><!-- / .row -->
                        <li class="row">
                            <div class="col-sm-12">
                                <label for="note">Ghi chú đơn hàng</label>
                                <textarea name="note" class="form-control" require id="note"></textarea>
                            </div>
                        </li>
                        <li>
                            <button class="button" type="submit" name="btnCheckout"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Đặt hàng</span></button>
                        </li>
                        <li>
                            <p>Thông tin thanh toán ...</p>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
      </div>
      
    </div>
  </div>
  </section>
  <!-- Main Container End -->