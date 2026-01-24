<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageServiceController extends Controller
{
     public function Pageservice()
    {
        return view('frontend.pageservice');
    }
}
