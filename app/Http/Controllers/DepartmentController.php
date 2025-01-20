<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
     //Below code are Vue CRUD

     public function deleteDepartment($id){
        DepartmentModel::where('id',$id)->delete();
        return response()->json("Delete Success");

     }

     public function storeDepartment(Request $request)
     {
        //  return response()->json($request->all(), 200); // Returning received data as JSON for testing
          DepartmentModel::create([
            'user_id' =>1,
            'director_id'=>$request->director_id,
            'name' => $request->name,

        ]);
        return response()->json("Success");
     }


  public function getDepartments(){
    //  return response()->json(DepartmentModel::latest()->get());

        $departments = DepartmentModel::all();
        return response()->json($departments);



  }

     public function updateDepartment(Request $request,$id){
        DepartmentModel::where('id',$id)->update(
[
          'name'=>$request->name,
          'director_id'=>$request->director_id,

         ]);
         return response()->json("Success");

    }
    //Below Code are laravel CRUD
    public function index()
    {
        $departments=DepartmentModel::all();
        // return $departments; testing data from db
        return view('management.departments.index',compact('departments'));
    }

    public function create()
    {
        return view ('management.departments.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' =>['required'],
            'director_id' =>['required']

        ]);

        // return $request->all();
        DepartmentModel::create([
            'user_id' =>1,
            'director_id'=>$request->director_id,
            'name' => $request->name,

        ]);

        Session::flash('success-message', 'Department created successfully!');
        return redirect()->route('departmentsIndex');
    }

    public function edit($id)
    {
        $department=DepartmentModel::find($id);
       return view('management.departments.edit',compact('department'));
    }

    public function update(Request $request,$id){
        DepartmentModel::where('id',$id)->update([
            'user_id' =>1,
            'director_id'=>$request->director_id,
            'name' => $request->name,

        ]);

        Session::flash('success-message', 'Department updated successfully!');

        return redirect()->route('departmentsIndex');

    }

    public function delete($id)
    {
        DepartmentModel::where('id',$id)->delete();
        Session::flash('success-message', 'Department deleted successfully!');

        return redirect()->route('departmentsIndex');
    }
}
