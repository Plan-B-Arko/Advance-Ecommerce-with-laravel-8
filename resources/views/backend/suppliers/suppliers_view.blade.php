@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

<div class="row">
    <div class="col-lg-8">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Suppliers Data</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
             <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Suppliers Name</th>
                         <th>Phone</th>
                         <th>Address</th>
                         <th>Email</th>
                         <th>Status</th>
                         <th>IMG</th>
                         <th>Action</th>
                        
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($suppliers as $supplier)
                        
                     
                         <tr>
                             
                             <td>{{$supplier->supplyer_name}}</td>
                             <td>{{$supplier->supplyer_phone}}</td>
                             <td>{{$supplier->supplyer_address}}</td>
                             <td>{{$supplier->supplyer_email}}</td>
                             <td>{{$supplier->supplyer_status}}</td>
                             @if($supplier->supplyer_photo!='none')
                             <td><img src="{{asset($supplier->supplyer_photo)}}" alt=""  height="80" width="80" ></td>
                             @else
                             <td>Not uploaded</td>
                             @endif
                             <td>
                             <a href="{{route('suppliers.edit',$supplier->id)}}" class="btn btn-success">Edit</a> 

                            <a href="{{route('suppliers.delete',$supplier->id)}}" class="btn btn-danger" id="delete">Delete</a>
                             </td>

                         </tr>
                     @endforeach

                    
                     
                     
                 </tbody>
             
               </table>
               </div> <!-- table res.. end -->
             </div>  <!-- box body end -->      
          </div>      <!-- box end -->       
     </div> <!-- col end --> 



<!--================================form add brand======================================- -->

<div class="col-lg-4">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Suppler</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
        

         <form  method="POST" action="{{ route('suppliers.store') }}" enctype="multipart/form-data" >
           @csrf           
            
                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Name</h5>
                      <div class="controls">
                      <input type="text" id="name" name="name" class="form-control" > 
                       
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
                      <input type="text"  id="address" name="address" class="form-control" > 
                     
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
                      <input type="number"  id="number" name="number" class="form-control" > 
                     
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
                      <input type="email"  id="email" name="email" class="form-control" > 
                     
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











