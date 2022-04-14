

@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">View Employee </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                    <div class="col">


              <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
               {{-- {{dd($emp)}} --}}

                <div class="row">
                 <div class="col-12">	


                    <div class="row"> <!-- start Image row  -->
                        <div class="col-md-4">
        
                            <div class="form-group">
                                <div class="controls">
                               </div>
                                </div> 
        
                        </div> <!-- end col md 4 -->
        
        
                        
                        <div class="col-md-4">
        
                            <div class="form-group">
                            
                                <img src="{{ asset($emp->employee_img) }}" style="height:50%; border-radius: 50%; width:50%; border: 2px solid rgb(253, 251, 251);">
                                <div class="controls">
                                  
                               
                               </div>
                                </div>  
        
                        </div> <!-- end col md 4 -->
        
        
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                               </div>
                                </div>
        
                        </div> <!-- end col md 4 -->
        
                    </div> <!-- end Image row  -->


            <div class="row"> <!-- start 1st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                        <h5>  <b>Employee Name :</b>{{$emp->employee_name}}</h5>
                        <div class="controls">
                       </div>
                        </div> 

                </div> <!-- end col md 4 -->


                
                <div class="col-md-4">

                    <div class="form-group">
                        <h5><b> Department Name :</b> {{$emp->department->department_name}}</h5>
                        <div class="controls">
                          
                       
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <b>Employee Office Id :</b> {{ $emp->employee_office_id}}</h5>
                        <div class="controls">
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 1st row  -->


            <div class="row"> <!-- start 2st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <b> Employee Email Id :</b> {{ $emp->email_id}}</h5>
                        <div class="controls">
                       </div>
                        </div> 

                </div> <!-- end col md 4 -->


                
                <div class="col-md-4">

                    <div class="form-group">
                        <h5><b>Employee Stutus : </b>
                            @if($emp->employee_status==1)
                            Active
                            @else 
                            In Active 
                            @endif

                        </h5>
                        <div class="controls">
                          
                       
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <b>Employee Phone :</b> {{ $emp->employee_phone}}</h5>
                        <div class="controls">
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 2st row  -->


            <div class="row"> <!-- start 3st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <b> Employee Fathers Name : </b>{{ $emp->employee_fathers_name}}</h5>
                        <div class="controls">
                       </div>
                        </div> 

                </div> <!-- end col md 4 -->

                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <b>Employee Mother Name :</b> {{ $emp->employee_mother_name}}</h5>
                        <div class="controls">
                       </div>
                        </div> 

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <b>Employee Salary :</b>{{ $emp->employee_salary}}</h5>
                        <div class="controls">
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 3st row  -->

            
            <div class="row"> <!-- start 4st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <b> Date Of Birth :</b> {{ $emp->employee_date_of_birth}}</h5>
                        <div class="controls">
                       </div>
                        </div> 

                </div> <!-- end col md 4 -->

                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <b>Employee Joing Date : </b>{{ $emp->employee_joing_date}}</h5>
                        <div class="controls">
                        </div>
                    </div> 
                    
                </div> <!-- end col md 4 -->
                
                
                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <b>Employee Designation : </b>{{ $emp->designation}}</h5>
                        
                        <div class="controls">
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 4st row  -->

            <div class="row"> <!-- start 5st row  -->
                <div class="col-md-6">
                    <div class="form-group" >
                        <div style="display: flex; flex-direction:column;">
                         <h5><b> Employee Present Address :</b></h5>
                              <p  id="employee_present_address" name="employee_present_address">
                                  {{$emp->employee_present_address}}
                              </p> 
                        </div>
                       
                         
                    </div> 

                </div> <!-- end col md 6 -->

                <div class="col-md-6">

                    <div class="form-group" >
                        <div style="display: flex; flex-direction:column;">
                         <h5><b> Employee Present Address :</b></h5>
                              <p  id="employee_present_address" name="employee_present_address" >{{$emp->employee_permanent_address}}</p> 
                        </div>
                         
                    </div> 

                </div> <!-- end col md 6 -->


            </div> <!-- end 5st row  -->


          <div class="text-xs-right">
            <input type="submit" hidden class="btn btn-rounded btn-primary mb-5" value="Update Employee">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>


@endsection

 


