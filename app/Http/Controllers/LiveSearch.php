<?php

namespace CatchAbook\Http\Controllers;


use Illuminate\Http\Request;
use CatchAbook\Http\Controllers\Controller;
use DB;
class LiveSearch extends Controller
{
    function index ()
    {
        return view ('search');
    }
    function action(Request $request)
    {
//        if ($request->ajax())
//        {
//            $query = $request->get('query'); 
//            if ($query != '')
//            {
//                $data = DB::table('books')
//                    ->where('name','like','%'.$query.'%')
//                    ->get();
//            }
//            else 
//            {
//                $data = DB::table('books')
//                    ->orderedBy('id','desc')
//                    ->get();
//            }
//            $total_row = $data->count();
//            if ($total_row>0)
//            {
//                foreach($data as $row)
//                {
//                    $output = '';
//                }
//            }
//            else
//            {
//                $output = 'alert("Not found!")';
//            }
//            $data = array (
//                'table_data'  => $output,
//                'total_data'  => $total_data 
//            );
//            echo json_encode($data);
//        }
//        $query = $request->input('query1');
//        return $query;
//     
        
	    $query1 = $request->input('query1');  
        $query2 = $request->input('query2');
        $query3 = $request->input('query3');
       
	if ($query1 != '' && $query2 == '' && $query3 == '')   
        {
                $data = DB::table('books')
                    ->where('name','like','%'.$query1.'%')
                    ->get();
        }
        else if ($query1 == '' && $query2 != '' && $query3 == '')   
        {
                $data = DB::table('books')
                    ->where('filed','like','%'.$query2.'%')
                    ->get();
        }
        else  if ($query1 == '' && $query2 == '' && $query3 != '')   
        {
                $data = DB::table('books')
                    ->where('isbn','like','%'.$query3.'%')
                    ->get();
        }
	else if ($query1 != '' && $query2 != '' && $query3 == '')   
        {
                $data = DB::table('books')
                    ->where('name','like','%'.$query1.'%')
                    ->where('filed','like','%'.$query2.'%')
                    ->get();
        }
	else if ($query1 != '' && $query2 == '' && $query3 != '')   
        {
                $data = DB::table('books')
                    ->where('name','like','%'.$query1.'%')
                    ->where('isbn','like','%'.$query3.'%')
                    ->get();
        }
	else if ($query1 == '' && $query2 != '' && $query3 != '')   
        {
                $data = DB::table('books')
                    ->where('filed','like','%'.$query2.'%')
                    ->where('isbn','like','%'.$query3.'%')
                    ->get();
        }
	else if ($query1 != '' && $query2 != '' && $query3 != '')   
        {
                $data = DB::table('books')
                    ->where('name','like','%'.$query1.'%')
                    ->where('filed','like','%'.$query2.'%')
                    ->where('isbn','like','%'.$query3.'%')
                    ->get();
        }
        else 
        {
            $data = "NO Data !!";
        }
        
        return $data;
       //return view('home',compact('data'));

        
    }
        
}