<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxSearchController extends Controller
{
    function index()
    {
        return view('ajax_search');
    }

    function action(Request $request)
    {
        
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('jobs')
                        ->where('title','like', '%'.$query.'%')
                        ->orWhere('company','like', '%'.$query.'%')
                        ->orWhere('location','like', '%'.$query.'%')
                        ->orderBy('id','desc')
                        ->get();

                        
            }
            else {
                $data = DB::table('jobs')
                ->orderBy('id', 'desc')
                ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                        <td>'.$row->title.'</td>
                        <td>'.$row->company.'</td>
                        <td>'.$row->location.'</td>
                        <td>'.$row->description.'</td>
                    </tr>
                    ';
                }

            }
            else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_data
            );
            echo json_encode($data);
        }
    }
}
