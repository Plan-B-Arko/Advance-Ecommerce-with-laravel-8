 
@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Update Employee </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                    <div class="col">


              <form action="{{route('employee.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $employee->id }}">        
                <input type="hidden" name="old_img" value="{{ $employee->employee_img}}">


                {{-- <img src="{{ asset($employee->employee_img) }}" style="height:40px; width:70px;"> --}}
    

                <div class="row">
                 <div class="col-12">	


            <div class="row"> <!-- start 1st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Name</h5>
                        <div class="controls">
                        <input type="text" id="employee_name" name="employee_name" value="{{ $employee->employee_name}}" class="form-control" required> 
                        @error('employee_name')
                        <strong>{{ $message }}</strong>	
                    @enderror
                       
                       </div>
                        </div> 

                </div> <!-- end col md 4 -->


                
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Department Name</h5>
                        <div class="controls">
                            <select id="department_id" name="department_id"class="form-control" required>
                                <option value=" ">Select Department Name</option>
                                @foreach ($departments as $department)
                                    @if ($employee->department_id==$department->id)
                                    <option value="{{$department->id}}" selected>{{$department->department_name}}</option>
                                    @else
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>

                                    @endif

                                @endforeach
                                
                             </select>                        
                              @error('department_id')
                        <strong>{{ $message }}</strong>	
                    @enderror
                       
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Office Id</h5>
                        <div class="controls">
                        <input type="text" id="employee_office_id" value="{{ $employee->employee_office_id}}" name="employee_office_id" class="form-control" required> 
                        @error('employee_office_id')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       
                       </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 1st row  -->



            <div class="row"> <!-- start 2st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                       <h5> Employee Profile Image <span class="text-danger">*</span></h5>
                       <div class="controls">
                       <input type="file" id="employee_photo" name="employee_photo" class="form-control"  > 
                        
                      
                       @error('employee_photo')
                       <strong>{{ $message }}</strong>	
                       
                   @enderror
                      </div>
                    </div>

                </div> <!-- end col md 4 -->


                
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Email Id</h5>
                        <div class="controls">
                        <input type="email" id="email_id" name="email_id"value="{{ $employee->email_id}}"  class="form-control" required> 
                        @error('email_id')
                        <strong>{{ $message }}</strong>	
                       
                    @enderror
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Stutus</h5>
                            <div class="controls">
                           <select id="employee_status" name="employee_status"class="form-control">
                                <option value="1">Select Employee Stutus</option>
                              
                                <option {{($employee->employee_status==1? 'selected':'') }} value="1">Active</option>
                                
                                <option {{($employee->employee_status==0? 'selected':'') }}  value="0">In Active </option>
                               
                             </select>                            
                             @error('employee_status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>

                </div> <!-- end col md 4 -->

            </div> <!-- end 2st row  -->

            <div class="row"> <!-- start 3st row  -->
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Phone</h5>
                        <div class="controls">
                        <input type="number" id="employee_phone"value="{{ $employee->employee_phone}}" name="employee_phone" class="form-control" required> 
                        @error('employee_phone')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->


                
                <div class="col-md-4">

                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Fathers Name</h5>
                        <div class="controls">
                        <input type="text" id="employee_fathers_name"value="{{ $employee->employee_fathers_name}}" name="employee_fathers_name" class="form-control" required> 
                        @error('employee_fathers_name')
                        <strong>{{ $message }}</strong>	
                       
                    @enderror
                       </div>
                        </div>    

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Mother Name</h5>
                        <div class="controls">
                        <input type="text" id="employee_mother_name"value="{{ $employee->employee_mother_name}}" name="employee_mother_name" class="form-control" required> 
                        @error('employee_mother_name')
                        <strong>{{ $message }}</strong>	
                       
                    @enderror
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->

            </div> <!-- end 3st row  -->

            <!-- start 4st row  -->
            <div class="row"> 
                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Salary</h5>
                        <div class="controls">
                        <input type="number" id="employee_salary"value="{{ $employee->employee_salary}}" name="employee_salary" class="form-control" required> 
                        @error('employee_salary')
                        <strong>{{ $message }}</strong>	
                        
                    @enderror
                       </div>
                        </div>  

                </div> <!-- end col md 4 -->


                
                <div class="col-md-4">

                    
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Date Of Birth</h5>
                            <div class="controls">
                            <input type="date" value="{{ $employee->employee_date_of_birth}}" class="form-control" name="employee_date_of_birth"value="{{old('dob')}}" id="employee_date_of_birth" placeholder="Enter Your Date Of Birth">
                            @error('employee_date_of_birth')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>   

                </div> <!-- end col md 4 -->


                <div class="col-md-4">
                    <div class="form-group">
                        <h5> <span class="text-danger">*</span> Employee Joing Date</h5>
                            <div class="controls">
                            <input type="date" value="{{ $employee->employee_joing_date}}"class="form-control" name="employee_joing_date"value="{{old('dob')}}" id="employee_joing_date" placeholder="Enter Your Date Of Birth">
                            @error('employee_date_of_birth')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div> 

                </div> <!-- end col md 4 -->

            </div> <!-- end 4st row  -->

            <!-- start 5st row  -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" >
                        <div style="display: flex; flex-direction:column;">
                         <h5> <span class="text-danger">*</span> Employee Present Address</h5>
                              <textarea  id="employee_present_address" class="form-control"name="employee_present_address" rows="4"  cols="70">
                                {{$employee->employee_present_address}}
                            </textarea> 
                        </div>
                         @error('employee_present_address')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div> 

                </div> <!-- end col md 4 -->


                
                <div class="col-md-6">

                    <div class="form-group" >
                        <div style="display: flex; flex-direction:column;">
                         <h5> <span class="text-danger">*</span> Employee Permanent Address</h5>
                              <textarea  id="employee_permanent_address"
                               class="form-control"name="employee_permanent_address" rows="4"  cols="70">
                            {{$employee->employee_permanent_address}}
                            </textarea> 
                        </div>
                         @error('employee_permanent_address')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>   

                </div> <!-- end col md 4 -->

            </div>
                 <!-- end 5st row  -->

        

      <br>
       <br>
       <br>

          <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Employee">
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

 

