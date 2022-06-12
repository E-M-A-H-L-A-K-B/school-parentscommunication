<?php

namespace App\Imports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;

class Students_Grades_Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct()
    {
        $this->data=[];
    }

    public function makeArray(array $row)
    {
        error_log("row columns: ".sizeof($row));
        $this->data[] = array('name'=> $row[0],
                              'last_name' => $row[1],
                              'father' => $row[2],
                              'grade'=>$row[3]);
    }

    public function getArray(): array
    {
        return $this->data;
    }

    public function model(array $row)
    {
        $this->makeArray($row);
        /*return new Test([
            //
        ]);*/
    }
}
