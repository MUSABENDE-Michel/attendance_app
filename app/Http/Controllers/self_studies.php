<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class self_studies extends Controller
{
    public function studies(){

        $array=[
            "name"=>"Michel",
            "age"=>100,
            "city"=>"kigali",
            "address"=>"Huye"
        ];
        return view('self_studies',["data"=>$array]);
    }
}
