<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_sliderController extends Controller
{
    public function index(){
        return view('admin.sliders.index');
    }

    public function create(){
        return view('admin.sliders.create');
    }
}
