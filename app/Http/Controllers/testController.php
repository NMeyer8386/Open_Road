<?php

namespace App\Http\Controllers;

use App\Models\Test_Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function index() {
        $students = Test_Student::all();
        //dd($students);
        foreach ($students as $student){
            echo $student->name. "<br>";
        }
    }
}
