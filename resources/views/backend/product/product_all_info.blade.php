@extends('admin.admin_master')
@section('admin')

<div class="container-full"> 
 <section class="content">
<div class="row">
    <div class="col-md-12">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">View Products</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                        <th>Image </th>
                        <th>Product Name</th>    
                        <th>Product Code</th>    
                        <th>Product Qty</th>    
                        <th>Product Size</th>    
                        <th>Product Color</th>  
                        <th>Product Price</th>
                        <th>Discount </th>
                        <th>Status </th>
                     </tr>
                 </thead>
                 <tbody>

                
                    <tr>
                       <td> <img src="{{ asset($product->product_thambnail) }}" style="width: 60px; height: 50px;">  </td>
                       <td>{{ $product->product_name }}</td>  
                       <td>{{ $product->product_code }}</td>  
                       <td>{{ $product->product_qty }}</td>  
                       <td>{{ $product->product_size }}</td>  
                       <td>{{ $product->product_color }}</td>  
                       <td>{{ $product->selling_price }} $</td>               
                    
                        <td>                         

                           @if($product->discount_price == NULL)
                              <span class="badge badge-pill badge-danger">No Discount</span>
                           @else                       

                              @php
                              $amount = $product->selling_price - $product->discount_price;
                              
                              $discount = ($amount/$product->selling_price) * 100;
                              @endphp

                          <span class="badge badge-pill badge-danger">{{ round($discount) }} %</span>

                           @endif                        
                      
                       s</td>
                     <td>
                        @if($product->status == 1)
                           <span class="badge badge-pill badge-success">Active</span>
                        @else
                        <span class="badge badge-pill badge-success">Deactive</span>
                        @endif
                     </td> 
                    </tr>
                   
                 </tbody>
               </table>
               </div> <!-- table res.. end -->
             </div>  <!-- box body end -->      
          </div>      <!-- box end -->       
     </div> <!-- col end --> 
</div> <!--  row end-->
</section> <!--  content end-->
</div> <!--  row end-->
@endsection

