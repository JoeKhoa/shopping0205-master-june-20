<!-- Main Container -->
<div class="main-container col2-left-layout">
  <div class="container">
    <div class="row">
      <div class="col-main col-xs-12">
        <div class="shop-inner">
          <div class="page-title">

            <h2><?= $data['nameType'] ?></h2>
            
          </div>

          <div class="product-grid-area">
            <ul class="products-grid">

              <?php foreach ($data['products'] as $product) : ?>
                <li class="item col-lg-3 col-md-3 col-sm-3 col-xs-4">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <?php
                        if ($product->promotion_price != 0) :
                          ?>
                          <div class="icon-sale-label sale-left">Sale</div>
                        <?php endif ?>
                        <?php
                        if ($product->new == 1) :
                          ?>
                          <div class="icon-new-label new-right">New</div>
                        <?php endif ?>
                        <div class="pr-img-area">
                          <a title="Ipsums Dolors Untra" href="<?= $product->url ?>.html">
                            <figure>
                              <img class="first-img" src="public/source/images/products-images/<?= $product->image ?>" alt="html template">
                              <img class="hover-img" src="public/source/images/products-images/<?= $product->image ?>" alt="html template">
                            </figure>
                          </a>
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="<?= $product->name ?>" href="<?= $product->url ?>.html"><?= $product->name ?></a>
                          </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <?php
                                if ($product->promotion_price != 0) :
                                  ?>
                                  <p class="special-price">
                                    <span class="price-label">Special Price</span>
                                    <span class="price"> <?= number_format($product->promotion_price) ?> </span>
                                  </p>
                                  <p class="old-price">
                                    <span class="price-label">Regular Price:</span>
                                    <span class="price"> <?= number_format($product->price) ?> </span>
                                  </p>
                                <?php else : ?>
                                  <p class="special-price">
                                    <span class="price-label">Special Price</span>
                                    <span class="price"> <?= number_format($product->price) ?> </span>
                                  </p>
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>

            </ul>
          </div>
          <div class="pagination-area ">
            <ul>
                <?=$data['showPagination']?>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Main Container End -->