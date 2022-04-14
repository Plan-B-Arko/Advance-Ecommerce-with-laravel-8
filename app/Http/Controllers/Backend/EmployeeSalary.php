<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Department_salary;
use App\Models\DepartmentSalary;
use App\Models\Employee;
use Carbon\Carbon;
use DB;

class EmployeeSalary extends Controller
{
    //
    public function AddSalary()
    {   $id=2;
        $department= Department::all();
        $employee= Employee::where('department_id','=',$id )->get();
       
         
        return view('backend.DepartmentSalary.AddSalary',compact('department'));
    }

    public function getEmployee($id)
    {
        $employee= Employee::where('department_id','=',$id )->get();
        return response()->json($employee);
    }

    public function find(Request $request)
    {
        $employee = Employee::find($request->employee);

        $first_date = Carbon::create($request->date)->startOfMonth();
        $end_date = Carbon::create($request->date)->endOfMonth();
        $salary = Department_salary::where('employee_id',$employee->id)->whereBetween('salary_date', [$first_date, $end_date])->first();
        
      if(isset($salary->id))
      {
        return response()->json([$salary,$employee,'already in database']);
      }
      else
      {
        $employee = Employee::find($request->employee);
        $salary = new Department_salary();
        $salary->department_id = $employee->department_id;
        $salary->total_salary = $employee->employee_salary;
        $salary->employee_id = $employee->id;
        $salary->paid_salary = 0;
        $salary->due_salary = $employee->employee_salary;
        $salary->salary_date = $end_date;
        $salary->advance_salary = 0;
        $salary->bonus = 0;
        $salary->advance_salary_date = $end_date;
        $salary->save();
        return response()->json([$salary,$employee,'not in database']);
      }

        
    }

    public function getSalary(Request $request)
    {
        $transiction = Department_salary::find($request->id);
        
        if(isset($request->paid))
        {
            $transiction->paid_salary+=$request->paid;
            $transiction->due_salary-=$request->paid;
            $transiction->save();
            $notification = array(
                'message' => 'Paid Salary Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('salary-add')->with($notification);
        }
        if(isset($request->bonus))
        {
            $transiction->bonus+=$request->bonus;
            $transiction->total_salary+=$request->bonus;
            $transiction->save();
            $notification = array(
                'message' => 'Bonus Add Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('salary-add')->with($notification);
        }
        if(isset($request->advance))
        {
            $transiction->advance_salary+=$request->advance;
            $transiction->due_salary-=$request->advance;
            $transiction->paid_salary+=$request->advance;
            $transiction->save();
            $notification = array(
                'message' => 'Advance Salary Add Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('salary-add')->with($notification);
        }

        
    }
//  test


    public function paidSalary()
    {
        $date = Carbon::now();

        $first_date = Carbon::create($date)->startOfMonth();
        $end_date = Carbon::create($date)->endOfMonth();
        $paidEmployes = Department_salary::whereBetween('salary_date', [$first_date, $end_date])->get();


        $paidEmployes = DB::table('employees')
            ->join('department_salaries', 'employees.id', '=', 'department_salaries.employee_id')
            ->whereBetween('department_salaries.salary_date', [$first_date, $end_date])
            ->select('employees.*', 'department_salaries.paid_salary','department_salaries.due_salary','department_salaries.bonus','department_salaries.advance_salary','department_salaries.total_salary')
            ->get();

       
        return view('backend.DepartmentSalary.paidSalary',compact('paidEmployes'));
         
    }


}
