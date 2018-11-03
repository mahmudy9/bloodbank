<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function cities()
    {
        $cities = City::all();
        return view('admin.cities' , compact('cities'));
    }

    public function update_city($cityid)
    {
        return view('admin.updatecity' , compact('cityid'));
    }

    public function edit_city(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'cityid' => 'required'
        ]);
        if($validator->fails())
        {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $city = City::find($request->input('cityid'));
        if($request->has('name'))
        {
            $city->name = $request->input('name');
        }
        if($request->has('governerate_id'))
        {
            $city->governerate_id = $request->input('governerate_id');
        }
        $city->save();
        return redirect('/admin/cities');
    }

    public function delete_city($cityid)
    {
        return view('admin.deletecity' , compact('cityid'));
    }

    public function destroy_city(Request $request)
    {
        
    }

}
