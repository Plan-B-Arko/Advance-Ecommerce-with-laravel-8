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
                   <h2 class="text-center"><span class="text-success">Hi,..</span><strong>{{ Auth::user()->name }}</strong></h2>
                   <h1 class="text-center" >Welcome To Shop Now</h1>
                 </div>
               </div>  {{-- col-md-6 end --}}
           </div> 
       </div>
   </div> 

@endsection
