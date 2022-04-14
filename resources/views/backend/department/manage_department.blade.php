@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

<div class="row">
    <div class="col-lg-8">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Department List</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Department Id</th>                     
                         <th>Department Name</th>                     
                         <th>Action</th>
                        
                     </tr>
                 </thead>
                 <tbody>

                   @foreach ($departments as $department)
                   <tr>
                    <td>  {{ $department->id }}</td>
                     <td>{{ $department->department_name }}</td>
                      
                       <td width="35%">
                           <a href="{{ route('department.edit', $department->id ) }}" class="btn btn-success">Edit</a> 

                           <a href="{{ route('department.delete', $department->id ) }}" id="#" class="btn btn-danger" >Delete</a>
                       </td>  
                       
                       
                   </tr>  
                   @endforeach
                     
                     
                 </tbody>
             
               </table>
               </div> <!-- table res.. end -->
             </div>  <!-- box body end -->      
          </div>      <!-- box end -->       
     </div> <!-- col end --> 



<!--================================form add Department======================================- -->

<div class="col-lg-4">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Department</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
        

         <form  method="POST" action="{{route('department.store')}}" >
            
            @csrf           
            
                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Department Name</h5>
                      <div class="controls">
                      <input type="text" id="department_name" name="department_name" class="form-control" > 
                       
                      @error('department_name')
                      <strong>{{ $message }}</strong>	
                      
                  @enderror
                     
                     </div>
                                    
                      </div>                  
              

               </div>   
              
                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Add Department">
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

