<?php

namespace App\Imports;

use App\Models\EmployeeData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Validation\Rule;

class ImportEmployee implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new EmployeeData([
            'empl_name' => $row['name'],
            'father_name' => $row['father_name'],
            'emp_number' => $row['number'],
            'date_of_joining' => $row['date_of_joining'],
            'date_of_resign' => $row['date_of_resign'],
            'pf' => $row['pf'],
            'esic' => $row['esic'],
            'aadhar' => $row['aadhaar'],
        ]);
    }

    public function rules(): array
    {
        return [
            'date_of_joining' => 'date:Y/m/d',
            'date_of_resign' => 'date:Y/m/d',
        ];
    }

    public function onFailure(Failure $failure)
    {
        return back()->with('error', 'The date format should be in the format of YYYY/MM/DD.');
    }
}
