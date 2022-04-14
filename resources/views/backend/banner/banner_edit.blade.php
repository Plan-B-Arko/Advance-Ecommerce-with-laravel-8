@extends('admin.admin_master')

@section('admin')
<div class="row">


<div class="col-lg-12">
    <div class="box mt-2">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Banner</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form   method="POST" action="{{ route('bennar.update')  }}" enctype="multipart/form-data">
                @csrf   

                <input type="hidden" name="id" value="{{ $bennars->id }}">        
                <input type="hidden" name="old_img" value="{{ $bennars->bennar_img}}">        

                <div class="form-group">
                 <h5> <span class="text-danger">*</span> Banner Title</h5>
                 <div class="controls">
                   <input id="title" value="{{ $bennars->title }}" name="title" type="text"  class="form-control
                   " id="exampleInputEmail1" aria-describedby="emailHelp">


               </div>

           </div>      

                   
                       <div class="form-group">
                           <h5>Banner Description <span class="text-danger">*</span></h5>
                           <div class="controls">
                           <input type="text" value="{{ $bennars->description }}" id="description" name="description" class="form-control" > 
                            
                        </div>
                           
                           </div>    

                           
                                          
    
                        
                           <div class="form-group">
                           <h5> Banner Img <span class="text-danger">*</span></h5>
                           <div class="controls">
                           <input type="file" id=" bennar_img"  name="bennar_img" class="form-control" required="Input Img"> 
                           
                           @error('bennar_img')
                           <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>	
                         </span>
                             @enderror 
                        </div>
                            
                          
                           </div>

                           
                           
                           
                   
                       {{-- <div class="text-xs-right">
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Banner</button>
                   </div> --}}

                   <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Add Banner">
                </div>
    
               </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
</div>

        




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


@endsection
