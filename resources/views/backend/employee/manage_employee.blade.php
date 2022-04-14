@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

<div class="row">
    <div class="col-lg-12">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Data Table With Full Features</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Employee ID</th>
                         <th>Employee Name</th>
                         <th>Employee Phone</th>
                         <th>Employee Profile Image</th>
                         <th>Action</th>
                        
                     </tr>
                 </thead>
                 <tbody>

                   @foreach ($employees as $employee)
                   <tr>
                       <td>{{ $employee->id }}</td>
                       <td>{{ $employee->employee_name }}</td>
                       <td>{{ $employee->employee_phone }}</td>
                       <td>                          
                         <img src="{{ asset($employee->employee_img) }}" style="height:40px; width:70px;">
                                                  
                      
                       </td>
                       <td>
                        <a href="{{ route('employee.details', $employee->id )}}" class="btn btn-success">View</a> 

                           <a href="{{ route('employee.edit', $employee->id ) }}" class="btn btn-warning">Edit</a> 

                           <a href="{{ route('employee.delete', $employee->id ) }}" class="btn btn-danger" id="#">Delete</a>
                       </td>  
                       
                       
                       
                   </tr>  
                   @endforeach --> 
                     
                     
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





