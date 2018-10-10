<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Validator;

class AuthController extends Controller
{
    

    public function register(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|string|min:3|max:190',
            'email' => 'required|unique:clients',
            'password' => 'required|confirmed',
            'dob' => 'required|date',
            'phone' => 'required|numeric',
            'city_id' => 'required|integer',
            'governerate_id' => 'required|integer',
            'blood_id' => 'required|integer',
            'last_donation' => 'required|date'
        ]);

        if($validator->fails())
        {
            return apiResponse(400 , 'validation error' , $validator->errors());
        }
    }


}
