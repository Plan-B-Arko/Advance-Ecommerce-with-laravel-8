
 @php
$prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();

@endphp




<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="   {{ asset('backend/images/logo-dark.png') }}" alt="logo">
						  <h3><b>Shop</b> Now</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class=" {{($route=='dashboard')?'active':'' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>


        @php
        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $cupons = (auth()->guard('admin')->user()->cupons == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $alluser = (auth()->guard('admin')->user()->alluser == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp








        @if($brand == true)

        <li class="treeview {{ ($prefix=='/brand')?'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brands</a></li>
          </ul>
        </li>


        @endif


        @if($category == true)

        <li class="treeview {{ ($prefix=='/category')?'active':'' }} ">
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
            <li><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Sub Category</a></li>
            <li><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub-Sub Category</a></li>

          </ul>
        </li>

        @else
        @endif

		   @if($product == true)
        <li class="treeview  {{ ($prefix=='/product')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('product.add')}}"><i class="ti-more"></i>Add Products </a></li>
            <li><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage All Products</a></li>

          </ul>
        </li>

           @else
        @endif


        @if($slider == true)
        <li class="treeview  {{ ($prefix=='/slider')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Slider Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('manage.slider')}}"><i class="ti-more"></i>Manage Slider </a></li>


          </ul>
        </li>
        @else
        @endif

        @if($cupons == true)
        <li class="treeview  {{ ($prefix=='/cupons')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Cupon Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ ($route == 'manage.coupon')? 'active':'' }}">
              <a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
            {{-- <li><a href="{{ route('manage.cupon')}}"><i class="ti-more"></i>Manage Cupon </a></li> --}}


          </ul>
        </li>

        @else
        @endif



        <li class="treeview  {{ ($prefix=='/banner')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Banner Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ ($route == 'bennar.manage')? 'active':'' }}">
              <a href="{{ route('bennar.manage') }}"><i class="ti-more"></i>Manage Banner</a></li>
            {{-- <li><a href="{{ route('manage.cupon')}}"><i class="ti-more"></i>Manage Cupon </a></li> --}}


          </ul>
        </li>

        @if($shipping == true)

        <li class="treeview  {{ ($prefix=='/shipping')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ ($route == 'manage.division')? 'active':'' }}">
              <a href="{{ route('manage.division') }}"><i class="ti-more">
                </i>Shipping Division</a></li>

          <li class="{{ ($route == 'manage.district')? 'active':'' }}">
            <a href="{{ route('manage.district') }}"><i class="ti-more">
              </i>Shipping District</a></li>

              <li class="{{ ($route == 'manage.state')? 'active':'' }}">
                <a href="{{ route('manage.state') }}"><i class="ti-more">
                  </i>Shipping State</a></li>


          </ul>
        </li>

        @else
        @endif


        @if($orders == true)
        <li class="treeview  {{ ($prefix=='/orders')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ ($route == 'pending.orders')? 'active':'' }}">

              <a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Order</a></li>


              <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}">
                <i class="ti-more"></i>Confirmed Orders</a></li>



              <li class="{{ ($route == 'confirm-processing')? 'active':'' }}"><a href="{{ route('confirm-processing') }}">
                <i class="ti-more"></i>Processing Orders</a></li>


            <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}">
              <i class="ti-more"></i> Picked Orders</a></li>



            <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}">
              <i class="ti-more"></i> Shipped Orders</a></li>

           <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}">
            <i class="ti-more"></i> Delivered Orders</a></li>

        <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>






          </ul>
        </li>


        @else
        @endif


       @if($returnorder == true)

        <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Return Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>

        <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>


          </ul>
        </li>

        @else
        @endif



        @if($stock == true)
        <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Manage Stock </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>


          </ul>
        </li>
        @else
        @endif



        @if($alluser == true)

        <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Users </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>


          </ul>
        </li>
        @else
        @endif


  @if($adminuserrole == true)

        <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Admin User Role </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all.admin.user')? 'active':'' }}">
          <a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin user role </a></li>


          </ul>
        </li>

        @else
        @endif



       @if($reports == true)

        <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

        <li class="{{ ($route == 'all-reports')? 'active':'' }}">
        <a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>

          </ul>
        </li>

        @else
        @endif


        @if($setting == true)
        <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Manage Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>

        <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>
          </ul>
        </li>


        @else
        @endif
        <li class="treeview  {{ ($prefix=='/orders')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Suppliers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ ($route == 'pending.orders')? 'active':'' }}">

              <a href="{{ route('suppliers.show') }}"><i class="ti-more"></i>All Suppliers</a></li>

          </ul>
        </li>

        {{-- ashim start --}}
         {{-- Ashim Start  Department  --}}

        {{-- @if($department == true) --}}
        <li class="treeview {{ ($prefix == '/department')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>

            <span>Department</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{route('department.view')}}"><i class="ti-more"></i>Manage Department</a></li>


              </ul>

        </li>


        {{-- @else --}}

        {{-- @endif --}}



        {{-- @if($employee == true) --}}
        <li class="treeview {{ ($prefix == '/employee')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>

            <span>Employee Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'employee.add')? 'active':''}}"><a href="{{route('employee.addform')}}"><i class="ti-more"></i>Add Employee</a></li>
            <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{route('employee.view')}}"><i class="ti-more"></i>Manage Employee</a></li>


              </ul>

        </li>


        {{-- @else --}}

        {{-- @endif --}}

{{-- ashim end --}}



       	{{-- start employe salary --}}
         

         <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Manage Salary</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li ><a href="{{ route('salary-add') }}"><i class="ti-more"></i>Pay Salary</a></li>
            <li ><a href="{{ route('paid_salary') }}"><i class="ti-more"></i>Paid Salary List</a></li>

          </ul>
        </li> 
         {{-- end employe salary --}}

      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
