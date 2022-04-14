@extends('frontend.main_master')

@section('index') 

   <div class="body-content">
       <div class="container">
           <div class="row">


            
            @include('frontend.common.user_sidebar')





                <div class="col-md-2">

               </div> 
                <div class="col-md-6">
                 <div class="card">                   
                   <h1 class="text-center"> Change Password</h1>               
      
                    <form method="POST" action="{{ route('user.password.update') }}" >
                        @csrf

                   <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Current Password <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input"  name="oldpassword" id="oldpassword" >
                  
                    @error('oldpassword')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>	
                        </span>
                    @enderror        
                </div>   
                
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1"> New Password <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input"  name="password" id="password" >
                  
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>	
                        </span>
                    @enderror
        
                </div>  

                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input"  name="password_confirmation" id="password_confirmation" >
                  
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>	
                        </span>
                    @enderror
        
                </div>              
                
                <div class="form-group">
                    <button type="submit" class="btn btn-danger" > Update Password</button>
                </div>

             </form>
                


                 </div>
               </div>  {{-- col-md-6 end --}}
           </div> 
       </div>
   </div> 

@endsection
