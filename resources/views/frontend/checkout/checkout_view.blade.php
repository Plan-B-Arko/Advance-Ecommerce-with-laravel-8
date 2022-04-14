@extends('frontend.main_master')

 @section('index')   

 {{-- ajax  --}}
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">

				<li><a href="{{ '/' }}">Home</a></li>
				<li class='active'>Checkout</li>

			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
                                <!-- checkout-step-01  -->
        <div class="panel panel-default checkout-step-01">
            <div id="collapseOne" class="panel-collapse collapse in">
                <!-- panel-body  -->
                <div class="panel-body">
                    <div class="row">		

				<!-- guest-login -->			
                <div class="col-md-6 col-sm-6 already-registered-login">

					<h2 class="checkout-subtitle"><b>Shapping Address</b></h2>
					<h3 class="text title-tag-line"> <b>log in below:</b> </h3>

	             <form class="register-form" method="POST"  action="{{ route('checkout.store') }}" >

                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> <b></b>Shipping Name </b> <span>*</span></label>

                            <input type="text" name="shipping_name" value="{{ Auth::user()->name }}" 
                            class="form-control" id="#" placeholder="Your Full Name">
                         
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> <b>Shipping Email </b> <span>*</span></label>

                            <input type="text" name="shipping_email" value="{{ Auth::user()->email }}" 
                            class="form-control" id="#" placeholder="Your Email">
                         
                        </div>
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> <b>Shipping Phone  </b><span>*</span></label>

                            <input type="number" name="shipping_phone" value="{{ Auth::user()->phone }}" 
                            class="form-control" id="#" placeholder="Your Phone Number">
                         
                        </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b>Post Code</b> <span>*</span></label>
                        <input type="text" name="post_code" class="form-control" id="#" placeholder="Post Code" required="">
                 </div>  <!-- // end form group  -->					

				</div>	
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">

                        <div class="form-group">
                            <h5><b>Division Select</b> <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="division_id" class="form-control" required="" >
                                    <option value="" selected="" disabled="">Select Division</option>
                                    @foreach($divisions as $item)
                                   <option value="{{ $item->id }}">{{ $item->division_name }}</option>	
                                    @endforeach
                                </select>
                                @error('category_id') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                            </div>
                       </div>

                       <div class="form-group">
                        <h5><b>District Select</b>  <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="district_id" class="form-control" required="">
                                <option value="" selected="" disabled="">Select District</option>
                    
                            </select>
                            @error('district_id') 
                         <span class="text-danger">{{ $message }}</span>
                         @enderror 
                         </div>
                             </div> <!-- // end form group -->
                    
                    

                             <div class="form-group">
                        <h5><b>State Select</b> <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="state_id" class="form-control" required="" >
                                <option value="" selected="" disabled>Select State</option>
                    
                            </select>
                            @error('state_id') 
                         <span class="text-danger">{{ $message }}</span>
                         @enderror 
                         </div>
                          </div> <!-- // end form group -->

                        <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
                        <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                    </div>  <!-- // end form group  -->		
                    
               
                                </div>	
                                <!-- already-registered-login -->
                                </div>			
                            </div>
                            <!-- panel-body  -->

                        </div><!-- row -->
                    </div>

					  	
					</div><!-- /.checkout-steps -->
				</div> 


        <div class="col-md-4">		
          <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                        </div>

                        <div class="">
                            
                            <ul class="nav nav-checkout-progress list-unstyled">

                                @foreach($carts as $item)
                                <li> 
                                    <strong>Image: </strong>
                                    <img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
                                </li>
            
                                <li> 
                                    <strong>Qty: </strong>
                                     ( {{ $item->qty }} )
            
                                     <strong>Color: </strong>
                                     {{ $item->options->color }}
            
                                     <strong>Size: </strong>
                                     {{ $item->options->size }}
                                </li>
                                @endforeach 
                       <hr>
                     <li>
                         @if(Session::has('coupon'))  
            
                        <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>
                        
                        <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
                        ( {{ session()->get('coupon')['coupon_discount'] }} % )
                        <hr>
                        
                        <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
                        <hr>
                        
                        <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
                        <hr>         
            
                         @else            
                        <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>                        
                        <strong>Grand Total : </strong> ${{ $cartTotal }} <hr>            
            
                         @endif 
            
                          </li>
                          </ul>	
                      </div>
                    </div>
                </div>
            </div>       	
       </div>  <!-- col-lg-4 end-->



         <div class="col-md-6" style="margin-left:310px">
        <!-- checkout-progress-sidebar -->
           <div class="checkout-progress-sidebar ">
           <div class="panel-group">
           <div class="panel panel-default">
           <div class="panel-heading">
               <h4 class="unicase-checkout-title">Select Payment Method</h4>
           </div>

           <div class="row">

               <div class="col-md-4">
           <label for="">Stripe</label> 		
           <input type="radio" name="payment_method" value="stripe">
           <img src="{{ asset('frontend/assets/images/payments/4.png') }}">		    		
               </div> <!-- end col md 4 -->

               <div class="col-md-4">
                   <label for="">Card</label> 		
           <input type="radio" name="payment_method" value="card">	
           <img src="{{ asset('frontend/assets/images/payments/3.png') }}">    		
               </div> <!-- end col md 4 -->

               <div class="col-md-4">
                   <label for="">Cash</label> 		
           <input type="radio" name="payment_method" value="cash">	
           <img src="{{ asset('frontend/assets/images/payments/6.png') }}">  		
               </div> <!-- end col md 4 -->


           </div> <!-- // end row  -->
           <hr>
           <button type="submit" class="btn-upper btn btn-success btn-large checkout-page-button ">Payment Step</button>


           </div>
           </div>
           </div> 
           <!-- checkout-progress-sidebar -->     
       </div> <!-- col-lg-4 end-->

    </form>


    </div><!-- /.row -->
    </div><!-- /.checkout-box -->





<!-- ========== BRANDS CAROUSEL ===================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
		

		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ========== BRANDS CAROUSEL : END ================== -->	
</div><!-- /.container -->
</div><!-- /.body-content -->


{{-- select discrict and state --}}
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {
              $.ajax({
                  url: "{{  url('/district-get/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",

                  success:function(data) {


                      $('select[name="state_id"]').empty(); 
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        
                        
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });



      $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/state-get/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 

  });
  </script>






@endsection