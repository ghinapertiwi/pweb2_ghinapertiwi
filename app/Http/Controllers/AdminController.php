<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('tables');
    }

    function form(){
        return view('form');
    }
}
