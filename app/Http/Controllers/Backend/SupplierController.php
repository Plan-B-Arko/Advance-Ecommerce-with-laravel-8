<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Image;

class SupplierController extends Controller
{
    public function show()
    {
        $suppliers = Supplier::all();
        return view('backend.suppliers.suppliers_view',compact('suppliers'));

    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'number' => 'required',
            
        ]);

        

        if($validated)
        {
            $supplier = new Supplier();
            $supplier->supplyer_name = $request->name;
            $supplier->supplyer_address = $request->address;
            $supplier->supplyer_email = $request->email;
            $supplier->supplyer_phone = $request->number;
            $supplier->supplyer_status= 'deactivate';
            

            if(isset($request->image))
            {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('upload/suppliers/'.$name_gen);
                $save_url = 'upload/suppliers/'.$name_gen;
                $supplier->supplyer_photo = $save_url;
            }
            else
            {
                $supplier->supplyer_photo = 'none';
            }

            
            $supplier->save();
            


        }
        $notification = array(
            'message' =>  'Suppliers Add Sucessyfuly',
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        
        return view('backend.suppliers.suppliers_edit',compact('supplier'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'number' => 'required',
            
        ]);

        

        if($validated)
        {
            $supplier =  Supplier::find($id);
            $supplier->supplyer_name = $request->name;
            $supplier->supplyer_address = $request->address;
            $supplier->supplyer_email = $request->email;
            $supplier->supplyer_phone = $request->number;
            
            

            if(isset($request->image))
            {
                unlink($supplier->supplyer_photo);
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('upload/suppliers/'.$name_gen);
                $save_url = 'upload/suppliers/'.$name_gen;
                $supplier->supplyer_photo = $save_url;
            }
            

            
            $supplier->save();
    }

    $notification = array(
        'message' =>  'Suppliers Updated Sucessyfuly',
        'alert-type' => 'info'
    ); 

    return redirect()->route('suppliers.show')->with($notification);
}

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        unlink($supplier->supplyer_photo);
        $supplier->delete();

        $notification = array(
            'message' =>  'Suppliers Deleted Sucessyfuly',
            'alert-type' => 'warning'
        ); 
        return redirect()->back()->with($notification);
    }
}
