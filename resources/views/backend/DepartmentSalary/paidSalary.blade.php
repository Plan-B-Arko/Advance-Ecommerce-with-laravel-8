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
                        
                        <th>Offlice ID</th>    
                        <th>Employee Name</th>    
                        <th>Employee Designation</th>    
                        <th>Total Salary</th>    
                        <th>Paid Salary</th>    
                        <th>Due Salary</th>  
                        <th>Bonus Salary</th>  
                        <th>Advance Salary</th>
                        
                     </tr>
                 </thead>
                 <tbody>

                    @foreach ($paidEmployes as $employee)
                        
                    
                    <tr>
                       
                       <td>{{ $employee->employee_office_id }}</td>  
                       <td>{{ $employee->employee_name }}</td>  
                       <td>{{ $employee->designation }}</td>  
                       <td>{{ $employee->employee_salary }}</td>  
                       <td>{{ $employee->paid_salary }}</td>  
                       <td>{{ $employee->due_salary }}</td>  
                       <td>{{ $employee->bonus }}</td>  
                       <td>{{ $employee->advance_salary }} </td>               
                    
                        
                    </tr>
                    @endforeach
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

