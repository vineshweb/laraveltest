<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function index() {
      
      $sql =DB::table('company_sales')
                ->join('levels', 'levels.id', '=', 'company_sales.level_id')
                ->select('company_sales.*','levels.*')
                ->where('company_sales.level_id','1')
                ->get();
      $results = $sql->toArray();
      //echo "<pre>";print_r($results);exit;
      return view('test',['results'=>$results,'num_rec'=>10]);

   }
   public function getcounting()
   {
       $msg = "This is a simple message.";
       return response()->json(array('msg'=> $msg), 200);
   }

    
}
