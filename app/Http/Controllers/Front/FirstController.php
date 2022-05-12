<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class FirstController extends Controller
{
    public function PrintAdmin(): string
    {
        return 'Ahmed Elgazwy';
    }

    public function getindex(){
        $obj = new \stdClass();
        $obj->name='ahmed';
        $obj->age=22;
        $data=['ahmed','basel'];
        return view('welcome',compact(['obj','data']));
    }
}
