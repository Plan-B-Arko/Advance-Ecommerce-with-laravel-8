@extends('admin.admin_master')
@section('admin')
<div class="container-full"> 
 <section class="content">

<div class="row">
    <div class="col-lg-12">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Pending Orders List</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Order Date</th>                     
                         <th>Invoice</th>                     
                         <th>Amount</th>                     
                         <th>Payment</th>
                         <th>Status</th>
                         <th>Action</th>
                        
                     </tr>
                 </thead>
                 <tbody>

                    @foreach($orders as $item)
                        <tr>
                            <td> {{ $item->order_date }}  </td>
                            <td> {{ $item->invoice_no }} </td>
                            <td> ${{ $item->amount }} </td>
                            <td> {{ $item->payment_method }} </td>
                            <td> <span class="badge badge-pill badge-danger"> {{ $item->status }} </span></td>                           

                            <td>

                    <a href="{{ route('pending.orders.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>
                     
                </td>

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

