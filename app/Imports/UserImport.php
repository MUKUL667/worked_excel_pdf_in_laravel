<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'name'     =>   $row[1],
            'email'    =>   $row[2],
            'phone_number' => $row[3],
            'dob'    => $row[4],

        ]);
    }
}
