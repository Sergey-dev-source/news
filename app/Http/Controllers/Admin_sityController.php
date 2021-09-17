<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Sity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Admin_sityController extends Controller
{
    public function index(){
        $data['language'] = App::getLocale();
        $data['town'] = Sity::join('countries', 'sities.country_id', '=', 'countries.id')->get();
        return view('admin.town.index',$data);
    }

    public function create(){
        $data['language'] = App::getLocale();
        $data['country'] = Country::all();
        return view('admin.town.create',$data);
    }
    public function add(Request $request) {
        $request->validate([
            'e_name'=>'required',
            'r_name'=>'required',
            'a_name'=>'required',
            'country'=>'required',
        ]);
        $country = Sity::create([
            'ru_sity_name'=> $request->r_name,
            'en_sity_name'=> $request->e_name,
            'arm_sity_name'=> $request->a_name,
            'country_id'=> $request->country,
        ]);
        if ($country){
            return redirect()->back()->with('success', 'Town created successful ');
        }
    }
    public function edit($id){
        $data['town'] = Sity::where('id', $id)->first();

        return view('admin.town.edit',$data);
    }
    public function edit_town(Request $request){
        $request->validate([
            'e_name'=>'required',
            'r_name'=>'required',
            'a_name'=>'required',
        ]);
        $town = Sity::find($request->id);
        $town->en_sity_name = $request->e_name;
        $town->ru_sity_name = $request->r_name;
        $town->arm_sity_name = $request->a_name;
        $town->save();
        return redirect()->back()->with('success', 'Town updated successful');
    }
    public function delete(Request $request)
    {
        Sity::destroy($request->id);
        echo 'success';
    }
}
