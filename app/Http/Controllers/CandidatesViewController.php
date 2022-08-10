<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CandidatesViewController extends Controller
{
    public function index(){
        // $users = DB::select('select * from student_details');
        // return view('stud_view',['users'=>$users]);
        $candidates = DB::select('SELECT id,
            MATCH (name, address, education, work) AGAINST ("Ty") as score
        FROM
            c_v_s
        WHERE
            MATCH (name, address, education, work) AGAINST ("Ty") > 0
        ORDER BY
            score DESC');
        }
}
