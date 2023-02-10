<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportEmployee;
use App\Models\EmployeeData;

class HomeController extends Controller
{

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

    public function searchEmployee()
    {
        $data = EmployeeData::all();
        return view('searchEmployee')->with(compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empl_name' => 'required'
        ]);

        EmployeeData::create($request->all());
        return back()->with('success', 'The Employee has been added Successfully.');
    }
}
