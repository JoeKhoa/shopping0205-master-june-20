<!-- Main Container -->
<style>
.qty input, .qty i{
  float: left
}
.qty i{
  line-height: 30px;
  margin-left: 5px;
  cursor: pointer;
}
i.icon-close{
  cursor: pointer;  
}
</style>
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart">

        <div class="page-content page-order">
          <div class="page-title">
            <h2>Giỏ hàng của bạn</h2>
          </div>

          <?php if(isset($data['cart']) && $data['cart']->totalQty > 0):?>
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Sản phẩm</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá - Giá khuyến mãi</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cart = $data['cart'];
                    foreach($cart->items as $product):?>
                    <tr class="parent-<?=$product['item']->id?>">
                      <td class="cart_product"><a href="#"><img src="public/source/images/products-images/<?=$product['item']->image?>" alt="<?=$product['item']->name?>"></a></td>
                      <td class="cart_description">
                        <p class="product-name"><a href="<?=$product['item']->url?>.html"><?=$product['item']->name?></a></p>
                      </td>
                      <td class="price">
                        <?php if($product['price'] != $product['promotionPrice']):?>
                        <p style="color:#333e48; font-weight:normal">
                          <del>
                            <?=number_format($product['item']->price)?>
                          </del>
                        </p>
                        <?php endif?>
                        <p>
                          <?=number_format($product['item']->promotion_price)?>
                        </p>
                      </td>
                      <td class="qty">
                        <input class="form-control input-sm
                        txt-qty-<?=$product['item']->id?>" type="text" value="<?=$product['qty']?>">
                        <i title="Cập nhật" class="glyphicon glyphicon-pencil btn-update"
                        data-id="<?=$product['item']->id?>"></i>
                      </td>
                      <td class="price">
                      <?php if($product['price'] != $product['promotionPrice']):?>
                        <p style="color:#333e48; font-weight:normal">
                          <del class="price-<?=$product['item']->id?>">
                            <?=number_format($product['price'])?>
                          </del>
                        </p>
                        <?php endif?>
                        <p class="promotionPrice-<?=$product['item']->id?>">
                          <?=number_format($product['promotionPrice'])?>
                        </p>
                      </td>
                      <td class="action"><a><i class="icon-close"
                      data-id="<?=$product['item']->id?>"
                      ></i></a></td>
                    </tr>
                    <?php endforeach?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Tổng tiền</td>
                      <td colspan="2"
                      class="totalPrice"
                      ><?=number_format($cart->totalPrice)?></td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Thanh toán</strong></td>
                      <td colspan="2"><strong class="promtPrice"><?=number_format($cart->promtPrice)?></strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation">
                <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua sắm</a>
                <a class="checkout-btn" href="./checkout.php"><i class="fa fa-check"></i> Đặt hàng</a> </div>
            </div>
          <?php else:?>
            <p style="color:#fed700; font-size:25px">Giỏ hàng rỗng</p>
            <a class="continue-btn" href="index.html"><i class="fa fa-arrow-left"> </i>&nbsp; Về trang chủ</a>
          <?php endif?>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $('.icon-close').click(function(){
    var idProduct = $(this).attr('data-id')
    $.ajax({
      url: 'cart.html',
      data: {
        id: idProduct,
        action: 'delete'
      },
      type: 'POST',
      dataType: 'JSON',
      success: function(response){
        if(response.success){
          $('.parent-'+idProduct).hide(500)
          $('.promtPrice').text(response.promtPrice)
          $('.totalPrice').text(response.totalPrice)
        }
      }
    })
  })
  $('.btn-update').click(function(){
    var idProduct = $(this).attr('data-id')
    var qty = $('.txt-qty-'+idProduct).val()
    if(qty<=0 || qty=='') {
      alert('Số lượng phải lớn hơn 0') // message
      $('.txt-qty-'+idProduct).val('') // clear value 0
      $('.txt-qty-'+idProduct).focus() // focus mouse into input
      return false; // exit
    }
    $.ajax({
      url: 'cart.html',
      type: 'POST',
      data: {
        id: idProduct,
        quantity: qty,
        action: 'update'
      },
      dataType: 'JSON',
      success: function(response){
        // console.log(response)
        if(response.success){
          if(response.price != response.promotionPrice){
            $('.price-'+idProduct).text(response.price)
          }
          $('.promotionPrice-'+idProduct).text(response.promotionPrice)
          $('.totalPrice').text(response.totalPrice);
          $('.promtPrice').text(response.promtPrice)
          $('.cart-total').text(response.totalQty + ' Item(s)')
        }
      },
      error: function(){
        alert('Vui lòng thử lại')
      }
    })
  })
</script>