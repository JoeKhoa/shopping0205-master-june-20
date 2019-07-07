<style>

.form-control {
  padding-left: 0px !important;
  padding-right:0px !important;
}

.glyphicon{
  vertical-align: middle !important;
  margin-left:5px !important;
}

</style>



<!DOCTYPE html>
<html lang="en">




<script type="text/javascript" src="public/source/js/jquery.min.js"></script>

<head>
  <!-- Basic page needs -->
  <meta charset="utf-8">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title><?=$title?></title>
  <base href="http://localhost/shopping0205-master-june-20/">



  <meta name="description" content="best template, template free, responsive theme, fashion store, responsive theme, responsive html theme, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template">
  <meta name="keywords" content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive theme, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template"
  />
  <!-- Mobile specific metas  , -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon  -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet' type='text/css'>

  <!-- CSS Style -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/bootstrap.min.css">

  <!-- font-awesome & simple line icons CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="public/source/css/simple-line-icons.css" media="all">

  <!-- owl.carousel CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="public/source/css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="public/source/css/owl.transitions.css">

  <!-- animate CSS  -->
  <link rel="stylesheet" type="text/css" href="public/source/css/animate.css" media="all">

  <!-- flexslider CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/flexslider.css">

  <!-- jquery-ui.min CSS  -->
  <link rel="stylesheet" type="text/css" href="public/source/css/jquery-ui.css">

  <!-- Revolution Slider CSS -->
  <link href="public/source/css/revolution-slider.css" rel="stylesheet">

  <!-- style CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/style.css" media="all">
</head>

<body class="cms-index-index cms-home-page">
  <div id="page">

    <!-- Header -->
    <header>
      <div class="header-container">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-sm-4 hidden-xs">
                <!-- Default Welcome Message -->
                <div class="welcome-msg ">Welcome to MyStore! </div>
                <span class="phone hidden-sm">Call Us: +123.456.789</span>
              </div>

              <!-- top links -->
              <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                <div class="links">
                  <div class="myaccount">
                    <a title="My Account" href="account_page.html">
                      <i class="fa fa-user"></i>
                      <span class="hidden-xs">My Account</span>
                    </a>
                  </div>

                  <div class="login">
                    <a href="account_page.html">
                      <i class="fa fa-unlock-alt"></i>
                      <span class="hidden-xs">Log In</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12">
              <!-- Header Logo -->
              <div class="logo">
                <a title="e-commerce" href="index.html">
                  <img alt="responsive theme logo" src="public/source/images//logo.png">
                </a>
              </div>
              <!-- End Header Logo -->
            </div>
            <div class="col-xs-9 col-sm-6 col-md-6">
              <!-- Search -->

              <div class="top-search">
                <div id="search">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="search">
                      <button class="btn-search" type="button">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- End Search -->
            </div>
            <!-- top cart -->

            <div class="col-lg-3 col-xs-3 top-cart">
              <div class="top-cart-contain">
                <div class="mini-cart">
                  <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                    <a href="#">
                      <div class="cart-icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                      <div class="shoppingcart-inner hidden-xs">
                        <span class="cart-title">Shopping Cart</span>
                        <span class="cart-total"> <?php 
                        echo isset($_SESSION['cart']) ? $_SESSION['cart']->totalQty: 0;
                        ?>
                        item(s)</span>
                      </div>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    <!-- Navbar -->
    <nav>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-4">
            <div class="mm-toggle-wrap">
              <div class="mm-toggle">
                <i class="fa fa-align-justify"></i>
              </div>
              <span class="mm-label">Categories</span>
            </div>
            <div class="mega-container visible-lg visible-md visible-sm">
              <div class="navleft-container">
                <div class="mega-menu-title">
                  <h3>Categories</h3>
                </div>
                <div class="mega-menu-category">
                  <ul class="nav">
                    <?php foreach($categories as $menu):?>
                    <li class="nosub">
                      <a href="<?=$menu->url?>">
                        <i class="icon fa <?=$menu->icon?> fa-fw"></i> 
                        <?=$menu->name?>
                      </a>
                    </li>
                    <?php endforeach?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="mtmegamenu">
              <ul>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="index.html">
                      <div class="title title_font">
                        <span class="title-text">Home</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="contact_us.html">
                      <div class="title title_font">
                        <span class="title-text">Contact Us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="about_us.html">
                      <div class="title title_font">
                        <span class="title-text">about us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="blog_full_width.html">
                      <div class="title title_font">
                        <span class="title-text">Blog</span>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end nav -->

    <?php require_once "$view.view.php"; ?>

    <!-- Footer -->

    <footer>
      <div class="footer-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-7">
              <form id="newsletter-validate-detail" method="post" action="#">
                <h3 class="hidden-sm">Sign up for newsletter</h3>
                <div class="newsletter-inner">
                  <input class="newsletter-email" name='Email' placeholder='Enter Your Email' />
                  <button class="button subscribe" type="submit" title="Subscribe">Subscribe</button>
                </div>
              </form>
            </div>
            <div class="social col-md-4 col-sm-5">
              <ul class="inline-mode">
                <li class="social-network fb">
                  <a title="Connect us on Facebook" target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="social-network googleplus">
                  <a title="Connect us on Google+" target="_blank" href="https://plus.google.com/">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </li>
                <li class="social-network tw">
                  <a title="Connect us on Twitter" target="_blank" href="https://twitter.com/">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="social-network linkedin">
                  <a title="Connect us on Linkedin" target="_blank" href="https://www.pinterest.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
                <li class="social-network rss">
                  <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                    <i class="fa fa-rss"></i>
                  </a>
                </li>
                <li class="social-network instagram">
                  <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
     
      <div class="footer-coppyright">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2018 MyStore. Edit by
              <a href="https://www.facebook.com/huongnguyen.nh"> Huong </a>. All Rights Reserved. </div>
            <div class="col-sm-6 col-xs-12">
              <div class="payment">
                <ul>
                  <li>
                    <a href="#">
                      <img title="Visa" alt="Visa" src="public/source/images//visa.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Paypal" alt="Paypal" src="public/source/images//paypal.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Discover" alt="Discover" src="public/source/images//discover.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Master Card" alt="Master Card" src="public/source/images//master-card.png">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <a href="#" class="totop"> </a>
    <!-- End Footer -->

  </div>



  <div id="myMessage" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> message </h4>
        </div>
        <div class="modal-body">
          <p> Sản phẩm <i>...</i> đã thêm vào giỏ hàng</p>
          <p><a href="cart.html"> Xem giỏ hàng</a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- JS -->

  <!-- jquery js -->
  <script type="text/javascript" src="public/source/js/jquery.min.js"></script>

  <!-- bootstrap js -->
  <script type="text/javascript" src="public/source/js/bootstrap.min.js"></script>


  <!-- owl.carousel.min js -->
  <script type="text/javascript" src="public/source/js/owl.carousel.min.js"></script>

  <!-- bxslider js -->
  <script type="text/javascript" src="public/source/js/jquery.bxslider.js"></script>

  <!-- Slider Js -->
  <script type="text/javascript" src="public/source/js/revolution-slider.js"></script>

  <!-- megamenu js -->
  <script type="text/javascript" src="public/source/js/megamenu.js"></script>
  <script type="text/javascript">
    /* <![CDATA[ */
    var mega_menu = '0';

  /* ]]> */
  </script>

  <!-- jquery.mobile-menu js -->
  <script type="text/javascript" src="public/source/js/mobile-menu.js"></script>

  <!--jquery-ui.min js -->
  <script type="text/javascript" src="public/source/js/jquery-ui.js"></script>

  <!-- main js -->
  <script type="text/javascript" src="public/source/js/main.js"></script>

  <!-- countdown js -->
  <script type="text/javascript" src="public/source/js/countdown.js"></script>




  <!-- Revolution Slider -->
  <script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery('.tp-banner').revolution(
        {
          delay: 9000,
          startwidth: 1170,
          startheight: 530,
          hideThumbs: 10,

          navigationType: "bullet",
          navigationStyle: "preview1",

          hideArrowsOnMobile: "on",

          touchenabled: "on",
          onHoverStop: "on",
          spinner: "spinner4"
        });
    });

    // $('.mega-menu-category').css({ display: "none"})
    $('.mega-menu-category').hide();
  </script>


  <script>
    jQuery(document).ready(function() {
      $('.add-to-cart-mt, .button-cart').click(function() {
        var idProduct = $(this).attr('data-id');
        $.ajax({
          url: 'cart.html',
          type: 'POST',
          data: {
            id: idProduct, // $_POST['id'] = 22
            quantity: 1,
            action: 'add'
          },
          dataType: 'JSON',
          success: function(response){
            console.log(response)
            // response : obj
            if(response.success){
              $('.modal-title').text(response.message)
              $('.modal-body i').text(response.data.product_name)
            }
            else{
              $('.modal-title').text('Error!')
              $('.modal-body').text(response.message)
            }
            $('#myMessage').modal('show')
          },
          error: function(err){
            console.log(err)

          }
        })
      });

      $('.pro-add-to-cart').click(function() {
        var idProduct = $(this).attr('data-id');
        var quantity = $('.qty').val();
        $.ajax({
          url: 'cart.html',
          type: 'POST',
          data: {
            id: idProduct,
            quantity: quantity,
            action: 'add'
          },
          dataType: 'JSON',
          success: function(response){
            console.log(response)
            // response : obj
            if(response.success){
              $('.modal-title').text(response.message)
              $('.modal-body i').text(response.data.product_name)
            }
            else{
              $('.modal-title').text('Error!')
              $('.modal-body').text(response.message)
            }
            $('#myMessage').modal('show')
        
          }
        })
      });

      // $('window').keypress(function(e){
      //     if(e.which == 13){
      //       $('#myMessage').modal('hide')
      //     }
      // })

    //   $('window').on('keypress', (event)=> {
    //     if(event.which === 13){
    //       $('#myMessage').modal('hide')        }
    //   });

  })


  </script>



</body>
</html>