<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cart page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="minishop/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="minishop/css/animate.css">
    
    <link rel="stylesheet" href="minishop/css/owl.carousel.min.css">
    <link rel="stylesheet" href="minishop/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="minishop/css/magnific-popup.css">

    <link rel="stylesheet" href="minishop/css/aos.css">

    <link rel="stylesheet" href="minishop/css/ionicons.min.css">

    <link rel="stylesheet" href="minishop/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="minishop/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="minishop/css/flaticon.css">
    <link rel="stylesheet" href="minishop/css/icomoon.css">
    <link rel="stylesheet" href="minishop/css/style.css">
  </head>
 <div style="text-align: right;">
    <a href="{{ route('home') }}" 
   style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 18px;
        background: #DBCC8F;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        z-index: 9999;
   ">
    Trở về
</a>
</div>
    <section class="ftco-section ftco-cart">
		
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(minishop/images/product-3.jpg);"></div></td>
						        
						        <td class="product-name">
						        	<h3>Nike Free RN 2019 iD</h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        <td class="price">$4.90</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">$4.90</td>
						      </tr><!-- END TR-->

						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(minishop/images/product-4.jpg);"></div></td>
						        
						        <td class="product-name">
						        	<h3>Nike Free RN 2019 iD</h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        <td class="price">$15.70</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">$15.70</td>
						      </tr><!-- END TR-->
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-start">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$20.60</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$17.60</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="{{ route('checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="minishop/js/jquery.min.js"></script>
  <script src="minishop/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="minishop/js/popper.min.js"></script>
  <script src="minishop/js/bootstrap.min.js"></script>
  <script src="minishop/js/jquery.easing.1.3.js"></script>
  <script src="minishop/js/jquery.waypoints.min.js"></script>
  <script src="minishop/js/jquery.stellar.min.js"></script>
  <script src="minishop/js/owl.carousel.min.js"></script>
  <script src="minishop/js/jquery.magnific-popup.min.js"></script>
  <script src="minishop/js/aos.js"></script>
  <script src="minishop/js/jquery.animateNumber.min.js"></script>
  <script src="minishop/js/bootstrap-datepicker.js"></script>
  <script src="minishop/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="minishop/js/google-map.js"></script>
  <script src="minishop/js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>