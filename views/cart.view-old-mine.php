<style>
.qty input, .qty i{
  float: left
}

.icon-close{
  cursor: pointer ;
}

.glyphicon {
  cursor: pointer ;

}
</style>

<script type="text/javascript" src="public/source/js/jquery.min.js"></script>


<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            
            
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

                      <?php $cart = $data['cart'];  
                      // print the component Or variable in the ARRAY items: product = vitural vaiable ~ [number_id]
                      foreach ($cart->items as $product):?> 
                        <tr class="parent-<?=$product['item']->id?>" >
                          <td class="cart_product"><a href="#"><img src="public/source/images/products-images/<?=$product['item']->image?>" alt="<?=$product['item']->name?>"></a></td>
                          <td class="cart_description">
                            <p class="product-name"><a href="#"><?=$product['item']->name?></a></p>
                          </td>
                          <td class="price">
                            <?php if (!($product['price'] ==  $product['promotionPrice'])):?>
                            <p style="color:#333e48; font-weight:normal">
                              <del><?=number_format($product['item']->price)?></del>
                            </p>
                            <?php endif?>
                            <p><?=number_format($product['item']->promotion_price)?></p>
                          </td>
                          <td class="qty">
                          <input  id="inputID<?=$product['item']->id?>" class="form-control input-sm" type="number" value="<?php echo ($product['qty'])?>">
                          <label for="inputID<?=$product['item']->id?>"><i id ="Pencil<?=$product['item']->id?>" class="glyphicon glyphicon-pencil"></i></label>

                          </td>
                          <td class="price"><span class="itemTotalPrice"><?=number_format($product['price'])?></span></td>
                          <td class="action"><i data-id ="<?=$product['item']->id?>" class="icon-close"></i></td>
                        </tr>
                    <?php endforeach?>

                  </tbody>
                  <tfoot>
                    <tr>  
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Tổng tiền </td>
                      <td colspan="2"><?=$data['cart']->totalPrice?></td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Thanh toán</strong></td>
                      <td colspan="2"><strong><?=$data['cart']->promtPrice?></strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> ĐẶT HÀNG</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<script>
jQuery(document).ready(function(){
  $('.icon-close').click(function(){
    // alert('a')
    var idProduct = $(this).attr('data-id');
    $.ajax({
      url: 'cart.html',
      type: 'POST',
      data: {
        action: 'delete',  
        id: idProduct
      },
      dataType: 'JSON',
      success: function(response){
        // console.log(reponse)
        if(response.success){
          // $('.parent-'+idPropduct).hide() // why this is not good ?
          $('.parent-'+idProduct).hide(500)
          $('.parent-'+idProduct).hide(500)
          $('.promtPrice').text(response.promtPrice)
          $('.totalPrice').text(response.totalPrice)

        } 
      }
    })
  });

  $('.glyphicon-pencil').click(function(){
      var idProduct = $(this).attr('id');
      idProduct = idProduct.substring(6,9);
      // console.log(idProduct);

      $('#inputID'+idProduct).keypress(function(e){
        if(e.which == 13){
          var inputVal = $(this).val();
          var Qtt = inputVal;
          console.log(inputVal);
          console.log(idProduct);

          $.ajax({
            url: 'cart.html',
            type: 'POST',
            data: {
              id: idProduct, // $_POST['id'] = 22
              quantity: Qtt,
              action: 'update'

            },
            dataType: 'JSON',
            success: function(response)
              console.log(response)
            error: function(err){
                alert( 'error is found !');
            
            }
        })


                //     // response : obj
                //     if(response.success){
                //       $('.form-control').text(response.message)
                //       $('.itemTotalPrice').text(response.data.product_name)
                //     }
                //     else{
                //       $('.modal-title').text('Error!')
                //       $('.modal-body').text(response.message)
                //     }
                //     $('#myMessage').modal('show')
                //   },
    

                //   }
                // })

      })
  });




})
   
</script>


