<?php

namespace App\Http\Controllers\Backend;  

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller   
{
    // Department View
    public function DepartmentView(){
        $departments=Department::all();
        return view('backend.department.manage_department',compact('departments'));

    }// end method

         // store departments
  public function DepartmentStore(Request $request){   
      
    // validation 
        $request->validate([
            'department_name' => 'required',
            
       
          ]);

        // department Insert    
        Department::insert([
           'department_name' => $request->department_name,
       
          ]); 

          $notification = array(
            'message' =>  'Department Add Sucessyfuly',
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notification);

          

  } // end method 

      // edit Department    
      public function DepartmentEdit($id){
        $department = Department::findOrfail($id);
        return view('backend.department.department_edit', compact('department')); 
  
      } // end mathod

    // Department Update
    public function DepartmentUpdate(Request $request){

        $dep_id = $request->id;
       
    
              // Department Update    
              Department::findorfail($dep_id)->update([
            'department_name' => $request->department_name,
                
    
           ]); 
    
           $notification = array(
             'message' =>  'Department Name Update Sucessyfully',
             'alert-type' => 'success'
         ); 
    
         return redirect()->route('department.view')->with($notification);
      } // end mathod

    // Department Delete
    public function DepartmentDelete($id){

        Department::find($id)->delete();
      
        $notification = array(
            'message' =>  'Department Delete Sucessyfully',
            'alert-type' => 'success'
        ); 
    
        return redirect()->back()->with($notification);

    }// end method



} // main end 
