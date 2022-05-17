<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class Student_Section_Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $data;

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
                              'class' => $row[3],
                              'section'=>$row[4]);
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
