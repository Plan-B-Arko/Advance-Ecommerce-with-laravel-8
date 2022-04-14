
@php
$id = Auth::user()->id;
$user = App\Models\User::find($id);
@endphp


<div class="col-md-2">
    <img class="cart-img-top" style="border-radius:50%" src="{{ (!empty($user->profile_photo_path))?url('upload/users_images/' 
        .$user->profile_photo_path):url('upload/avatar-1.png') }}" alt="User Avatar" height="150px" weight="150px">   
           <br>
           <br>                   
     
         <div class="list-group" id="list-tab" role="tablist">
           <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="{{ url('dashboard') }}" role="tab" aria-controls="home">Home</a>
           <a class="list-group-item list-group-item-success" id="list-profile-list" data-toggle="list" href="{{ route('user.profile') }}" role="tab" aria-controls="profile">Profile Update</a>
           <a class="list-group-item list-group-item-secondary" id="list-messages-list" data-toggle="list"
            href="{{ route('change.password') }}" role="tab" aria-controls="messages">Change Password</a>
            
            <a class="list-group-item list-group-item-secondary" id="list-messages-list" data-toggle="list"
            href="{{ route('my.orders') }}" role="tab" aria-controls="messages">My Orders</a>

            <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>

            <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>

           <a class="list-group-item list-group-item-danger" id="list-settings-list" data-toggle="list" href="{{ route('user.logout') }}" role="tab" aria-controls="settings">Logout</a>
         </div>
    
     
</div> 