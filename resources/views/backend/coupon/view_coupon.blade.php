@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

<div class="row">
    <div class="col-lg-8">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Coupon List</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Coupon Name</th>                     
                         <th>Coupon Discount</th>                     
                         <th>Coupon Validity</th>                     
                         <th>Status</th>
                         <th>Action</th>
                        
                     </tr>
                 </thead>
                 <tbody>

                    @foreach($coupons as $item)
                        <tr>
                            <td> {{ $item->coupon_name }}  </td>
                            <td> {{ $item->coupon_discount }}% </td>
                            <td width="25%">
                                {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
                                      </td>

                            <td>
                                @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="badge badge-pill badge-success"> Active </span>
                                @else
                            <span class="badge badge-pill badge-danger"> InActive </span>
                                @endif

                            </td>

                            <td>
                                <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="">  <i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                     
                 </tbody>
             
               </table>
               </div> <!-- table res.. end -->
             </div>  <!-- box body end -->      
          </div>      <!-- box end -->       
     </div> <!-- col end --> 



<!--================================form add Category======================================- -->

<div class="col-lg-4">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Coupon</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
        

         <form  method="POST" action="{{ route('coupon.store') }}" >
            
            @csrf           
            
                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Coupon Name</h5>
                      <div class="controls">
                      <input type="text" id="coupon_name" name="coupon_name" class="form-control" > 
                       
                      @error('coupon_name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span>
                  @enderror
                     
                     </div>


                      </div>                  
              
                  <div class="form-group">
                      <h5>Coupon Discount  <span class="text-danger">%</span></h5>
                      <div class="controls">
                      <input type="text"  id="coupon_discount" name="coupon_discount" class="form-control" > 
                     
                      @error('coupon_discount')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span> 
                  @enderror
                     
                     </div> 
                      </div>  
                      


                      <div class="form-group">
                        <h5>Coupon Validity Date</h5>
                        <div class="controls">
                            <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                       
                        @error('coupon_validity')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>	
                        </span> 
                    @enderror
                       
                       </div> 
                        </div> 





               </div>   
              
                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Add Category">
              </div>

          </form>





         </div> <!-- table res.. end -->
       </div>  <!-- box body end -->      
    </div>      <!-- box end -->       
</div> <!-- col end -->

</div> <!--  row end-->
</section> <!--  content end-->
</div> <!--  row end-->






@endsection

