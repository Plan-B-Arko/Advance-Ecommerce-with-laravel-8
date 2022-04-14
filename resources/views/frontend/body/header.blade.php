<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
     <div class="container">
   
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled" >
              <li><a href="{{ url('/dashboard') }}"><i class="icon fa fa-user"></i>My Account</a></li>
              
              <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>

              <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
           
              <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
              {{-- <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li> --}}

              <li> <a href="{{ route('shop.page') }}">Shop</a> </li>

              <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i class="icon fa fa-check"></i>Order Traking</a></li>


              @auth
              {{-- for user login then show --}}
              <li><a href="{{ url('/dashboard') }}"><i class="icon fa fa-user"></i>User Profile</a></li>    
              @else           
              {{-- for not login then show --}}
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>              
              @endauth


            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">USD</a></li>
                  <li><a href="#">INR</a></li>
                  <li><a href="#">GBP</a></li>
                </ul>
              </li> --}}


              {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  
                  <li><a href="#">English</a></li>
                  <li><a href="#">French</a></li>
                  <li><a href="#">German</a></li> --}}

                  {{-- @if(session()->get('language') == 'hindi')
                  <li><a href="{{ route('english.language') }}">English</a></li>
                  @else
                  <li><a href="{{ route('hindi.language') }}">हिंदी</a></li>
                  @endif --}}

                {{-- </ul>
              </li> --}}


            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>

      {{-- row --}}
    
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    
    {{-- @php
    $setting = App\Models\SiteSetting::find(1);
     @endphp --}}
    
    
    <div class="main-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a> </div>
           
            {{-- <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ $setting->logo }}" alt="logo"> </a> </div> --}}
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ======================================= SEARCH AREA =================================== -->
    
           
            {{-- <div class="search-area">

              <form method="POST" action="{{ route('product.search') }}">

                @csrf
                
                    <div class="control-group ">
                      @php
                          $categories = App\Models\Category::all();
                      @endphp
                      <select class="form-control" name="cat">
                        <option selected disabled>Default select</option>
                        @foreach ($categories as $cat)  
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                        @endforeach
                      </select>
                      <input type="submit" class="search-button" >
                      <input class="search-field"  name="search"placeholder="Search here..." />

                      
                    </div>
                
              </form>
          </div>  --}}
          
            <div class="search-area">

              <form method="post" action="{{ route('product.search') }}">

                @csrf

                <div class="control-group">
                  @php
                  $categories = App\Models\Category::all();
              @endphp
              <select style = "border:none" name="cat" class="animate-dropdown">
                <option  selected disabled>Select Category</option>
                @foreach ($categories as $cat)  
                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endforeach
              </select>
                  
                 <input class="search-field" name="search" placeholder="Search here..." />
                <button type="submit" class="search-button"></button>
                  
                  
                    
                 
                </div>
              </form>
            </div>
            <!-- /.search-area --> 
            <!-- ====================================== SEARCH AREA : END ======================================== --> </div>
          <!-- /.top-search-holder -->

          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 

            <!-- =============== SHOPPING CART DROPDOWN =================== -->
            
            <div class="dropdown dropdown-cart"><a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> 
                  <span class="sign">$</span>
                  <span class="value" id="cartSubTotal"></span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">

                <li>
                  
                {{-- mini cat start with ajax --}}

                  <div id="miniCart"> 
                  
                  </div>
                 {{-- mini cat end with ajax --}}
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text"> Sub Total :</span>
                      <span class='price' id="cartSubTotal"></span> </div>
                    <div class="clearfix"></div>
                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> 
                  </div>
                  <!-- /.cart-total--> 
                  
                </li>

              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================= SHOPPING CART DROPDOWN : END======================== --> 

          </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container-fluid">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>

              {{-- category list --}}
              @php
                $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
              @endphp


                  @foreach($categories as $category)
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" 
                    class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name }}</a>
                   <ul class="dropdown-menu container">
                <li>
                  <div class="yamm-content ">
                    <div class="row">

                  {{-- Sub category list --}}
                  @php
                  $subcategories = App\Models\SubCategory::where('category_id', 
                  $category->id)->orderBy('sub_category_name', 'ASC')->get();
                  @endphp

                      {{-- sub category Loop start --}}
                      @foreach($subcategories as $subcategory)  

                      <div class="col-xs-12 col-sm-6 col-md-2 col-menu">    

                      <a href="{{ url('subcategory/product/'.$subcategory->id) }}" > <h2 class="title">{{ $subcategory->sub_category_name }}</h2> </a> 

                      {{-- Sub Sub Category List --}}
                      @php
                      $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', 
                      $subcategory->id)->orderBy('subsubcategory_name', 'ASC')->get();
                      @endphp
                      {{-- Start sub sub category loop --}}
                      
                        @foreach($subsubcategories as $subsubcategory)
                        <ul class="links">
                          <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id) }}">{{ $subsubcategory->subsubcategory_name }}</a></li>                         
                        </ul>
                        @endforeach 
                        {{-- end sub sub category loop --}}

                      </div>
                    
                      @endforeach 
                      {{-- end sub category loop --}}

                      
                      <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                      <!-- /.yamm-content --> 
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            @endforeach 

                  <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    


<!-- Order Traking Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('order.tracking') }}">
          @csrf
         <div class="modal-body">
          <label>Invoice Code</label>
          <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">           
         </div>

         <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

        </form> 


      </div>

    </div>
  </div>
</div>










  </header>