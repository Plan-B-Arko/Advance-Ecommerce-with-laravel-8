@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

<div class="row">
    <div class="col-lg-8">


 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Suppler</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
        

         <form  method="POST" action="{{route('suppliers.update',$supplier->id)}}" enctype="multipart/form-data" >
           @csrf           
            
                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Name</h5>
                      <div class="controls">
                      <input type="text" id="name" name="name" value="{{$supplier->supplyer_name}}" class="form-control" > 
                       
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span>
                  @enderror
                     
                     </div>

                                        


                      </div>                  
              
                  <div class="form-group">
                      <h5>Address <span class="text-danger">*</span></h5>
                      <div class="controls">
                      <input type="text" value="{{$supplier->supplyer_address}}"  id="address" name="address" class="form-control" > 
                     
                      @error('address')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span>
                    @enderror
</div>
                     
                     </div>   

                  <div class="form-group">
                      <h5>Phone <span class="text-danger">*</span></h5>
                      <div class="controls">
                      <input type="number" value="{{$supplier->supplyer_phone}}" id="number" name="number" class="form-control" > 
                     
                      @error('number')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span>
                    @enderror
                     
                     </div>             
                     </div>             
                  <div class="form-group">
                      <h5>Email <span class="text-danger">*</span></h5>
                      <div class="controls">
                      <input type="email" value="{{$supplier->supplyer_email}}"  id="email" name="email" class="form-control" > 
                     
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span>
                    @enderror
                     
                     </div>             


                      </div>                   

                   
                      <div class="form-group">
                      <h5>Image <span class="text-danger">*</span></h5>
                      <div class="controls">
                      <input type="file" id="image" name="image" class="form-control">
                       
                     
                      @error('image')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span>
                  @enderror
                     
                     
                     </div>




                      </div>   
              
                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Add Supplyer">
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











