@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

 <div class="row">
    <div class="col-10">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Employee Salary</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
          <form id="findEmployee">
            @csrf
            <div class="row align-items-center">
              <div class="col">
                <div class="form-group">
                  <label  for="date">Department:</label>
                  <select class="form-control" name="department" id="department">
                   <option value="">Department Name</option>
                   @foreach ($department as $item)
                     <option value="{{$item->id}}">{{ $item->department_name }}</option>
                   
                   @endforeach
                 </select>
     
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label  for="date">Employee:</label>
                  <select class="form-control" name="employee" id="employee">
                 <option>Employee ID And Name</option>
               </select>
               </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label  for="date">Date:</label>
                  <input class="form-control" type="date" id="date" name="date">
                </div>
              </div>
           

              <div class="col">
                <button type="submit" id="submitE" class="btn btn-primary">Find</button>
              </div>
            
          </form>
          </div>  <!-- box body end -->      
        </div>      <!-- box end -->       
     </div> <!-- col end --> 

 </div>










 <div class="row" id='pay_salary'>
  <div class="col-lg-10">
    
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Employee Salary</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
          
          <div class="row flex-column ml-10">
            <div class="row">
              <div class="col-4">
                <p class="lead">Name: <span id= "name"></span></p>
                <p class="lead">ID: <span id= "id"></span></p>
              </div>
              <div class="col-4">
                <p class="lead">Total Salary: <span id= "total"></span></p>
                <p class="lead">Paid Salary: <span id= "paid"></span></p>
              </div>
              <div class="col-4">
                <p class="lead">Due Salary: <span id= "due"></span></p>
                <p class="lead">Advance Salary: <span id= "advance"></span></p>
                <p class="lead">Bonus Salary: <span id= "bonus"></span></p>
              </div>

            </div>  





            <div class="row">                  

              <div class="col-4">
                <form id='information' method="POST" action="{{route('payment_salary')}}" enctype="multipart/form-data" >
                  @csrf    
                  <input type="text" id="employee_id" name="id" hidden>       
                        
                    
                        <div class="form-group">
                                <h5> <span class="text-danger"></span> Pay Salary</h5>
                                <div class="controls">
                                    <input type="text" id="brand_name_cats_eye" name="paid" class="form-control" >
                                </div>
                                
                        
                            
                          </div>

                          <div class="form-group mt-5">
                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                          </div>
                        
      
                </form>
              </div>

              <div class="col-4">
                <form id='information' method="POST" action="{{route('payment_salary')}}" enctype="multipart/form-data" >
                  @csrf    
                  <input type="text" id="employee_id" name="id" hidden >       
                      
      
                        
                        <div class="form-group">
                                <h5> <span class="text-danger"></span> Bonus Salary</h5>
                                <div class="controls">
                                    <input type="text" id="brand_name_cats_eye" name="bonus" class="form-control" >
                            </div>
                                
                        
                          
                            <div class="form-group mt-5">
                              <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                            </div>
      
                </form>
              </div>

              <div class="col-4">
                <form id='information' method="POST" action="{{route('payment_salary')}}" enctype="multipart/form-data" >                
                  @csrf    
                  <input type="text" id="employee_id" name="id" hidden >                        
                        <div class="form-group">
                                <h5> <span class="text-danger"></span> Advance Salary</h5>
                                <div class="controls">
                                    <input type="text" id="brand_name_cats_eye" name="advance" class="form-control" >
                                </div>
                          </div>
                          <div class="form-group mt-5">
                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                          </div>
                   </form>
                    </div>                   
                 </div>
                </div>  
                
                
          </div>    
  </div> <!-- col end -->

</div>


@endsection

