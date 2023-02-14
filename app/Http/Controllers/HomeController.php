<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportEmployee;
use App\Models\EmployeeData;

class HomeController extends Controller
{
    public function index()
    {
        $data = EmployeeData::all();
        return view('index')->with(compact('data'));
    }

    public function addEmployee()
    {
        return view('addEmployee');
    }

    // Importing the excel file
    public function import(Request $request)
    {

        if ($request->file == "") {

            return back()->with('error', 'Eror!!! Please Upload the File');
        }

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        if ($extension != 'xlsx' && $extension != 'xls') {
            return back()->with('error', 'File format should be either xlsx or xls');
        }

        Excel::import(new ImportEmployee(), $request->file('file')->store('files'));
        return back()->with('success', 'The data has been successfully imported into the database.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'empl_name' => 'required'
        ]);

        EmployeeData::create($request->all());
        return back()->with('success', 'The Employee has been added Successfully.');
    }

    public function editEmployee($id)
    {
        $data = EmployeeData::find($id);
        return view('editEmployee', compact('data'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'empl_name' => 'required'
        ]);
        $data = EmployeeData::find($id);
        $data->empl_name = $request->empl_name;
        $data->father_name = $request->father_name;
        $data->emp_number = $request->emp_number;
        $data->pf = $request->pf;
        $data->esic = $request->esic;
        $data->aadhar = $request->aadhar;
        $data->date_of_joining = $request->date_of_joining;
        $data->date_of_resign = $request->date_of_resign;
        $data->update();
        return redirect('/')->with('success', 'Employee Updated Successfully');
        return view('editEmployee', compact('data'));
    }


    public function deleteEmployee($id)
    {
        $data = EmployeeData::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Employee Deleted Successfully');
    }
}
