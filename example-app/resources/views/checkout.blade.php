@extends('layout.home')
@section('body')
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="#" class="billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State / Country</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="" id="" class="form-control">
		                  	<option value="">France</option>
		                    <option value="">Italy</option>
		                    <option value="">Philippines</option>
		                    <option value="">South Korea</option>
		                    <option value="">Hongkong</option>
		                    <option value="">Japan</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" class="form-control" placeholder="House number and street name">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
                </div>
	            </div>
	          </form><!-- END -->
			  <div class="row mt-5 pt-3">

    <!-- Cart Total -->
    <div class="col-md-6 mb-4">
        <div style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 25px; font-weight: 600;">Cart Total</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <span>$20.60</span>
                </li>
                <li class="d-flex justify-content-between mb-2">
                    <span>Delivery</span>
                    <span>$0.00</span>
                </li>
                <li class="d-flex justify-content-between mb-2">
                    <span>Discount</span>
                    <span>$3.00</span>
                </li>
                <hr style="border: 1px solid #000; width: 100%; margin: 41px auto;">

                <li class="d-flex justify-content-between font-weight-bold" style="font-size: 1.2em;">
                    <span>Total</span>
                    <span>$17.60</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Payment Method -->
    <div class="col-md-6 mb-4">
        <div style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 25px; font-weight: 600;">Payment Method</h3>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="bankTransfer">
                    <label class="form-check-label" for="bankTransfer">
                        Direct Bank Transfer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="checkPayment">
                    <label class="form-check-label" for="checkPayment">
                        Check Payment
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="paypal">
                    <label class="form-check-label" for="paypal">
                        PayPal
                    </label>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terms">
                <label class="form-check-label" for="terms">
                    I have read and accept the terms and conditions
                </label>
            </div>

            <a href="#" 
               style="
                   display: inline-block;
                   width: 100%;
                   padding: 12px 20px;
                   background: #cdc8b7ff;
                   color: white;
                   text-align: center;
                   border-radius: 6px;
                   text-decoration: none;
                   font-weight: 500;
               ">
                Place an order
            </a>
        </div>
    </div>

</div>

          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
@endsection
