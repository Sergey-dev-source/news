<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Admin_countryController extends Controller
{
    public function index(){
        $data['country'] = Country::all();
        $data['language'] = App::getLocale();
        return view('admin.country.index',$data);
    }
    public function create(){
        return view('admin.country.create');
    }
    public function add(Request $request){
       $request->validate([
           'e_name'=>'required',
           'r_name'=>'required',
           'a_name'=>'required',
        ]);
        $country = Country::create([
            'ru_name'=> $request->r_name,
            'en_name'=> $request->e_name,
            'arm_name'=> $request->a_name,
        ]);
        if ($country){
            return redirect()->back()->with('success', 'Country created successful ');
        }
    }
    public function edit($id){
        $data['country'] = Country::where('id',$id)->first();
        return view('admin.country.edit',$data);
    }

    public function edit_country(Request $request){
        $request->validate([
            'e_name'=>'required',
            'r_name'=>'required',
            'a_name'=>'required',
        ]);
        $country = Country::find($request->id);
        $country->en_name = $request->e_name;
        $country->ru_name = $request->r_name;
        $country->arm_name = $request->a_name;
        $country->save();
        return redirect()->back()->with('success', 'Country updated successful ');

    }
    public function delete(Request $request)
    {
        Country::destroy($request->id);
        echo 'success';
    }
}
