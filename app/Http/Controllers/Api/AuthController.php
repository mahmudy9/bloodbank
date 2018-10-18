<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\resetpassword;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('token')->except(['register' , 'login' , 'sendresetpassword']);
    }
    

    public function register(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|string|min:3|max:190',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed',
            'dob' => 'required|date',
            'phone' => 'required|numeric|unique:clients',
            'city_id' => 'required|integer',
            'blood_id' => 'required|integer',
            'last_donation' => 'required|date'
        ]);

        if($validator->fails())
        {
            return apiResponse(400 , $validator->errors()->first() , $validator->errors());
        }

        $dobtime = strtotime($request->input('dob'));
        $time = time();
        if($dobtime > $time - 568080000)
        {
            return apiResponse(400 , 'Date of birth must be 18 years old or older' , $request->input('dob') );
        }

        if(strtotime($request->input('last_donation')) > time() )
        {
            return apiResponse(400 , 'Date of last donation is invalid' , $request->input('last_donation'));
        }

        $client = new Client;
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->dob = $request->input('dob');
        $client->phone = $request->input('phone');
        $client->city_id = $request->input('city_id');
        $client->blood_id = $request->input('blood_id');
        $client->last_donation = $request->input('last_donation');
        $client->api_token = str_random(60);
        $client->save();
        return apiResponse(201 , $client->api_token , $client);
    }



    public function login(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails())
        {
            return apiResponse(400 , 'validation error' , $validator->errors());
        }

        if(!Client::where('phone' , $request->input('phone'))->exists())
        {
            return apiResponse(400 , 'Authentication failed');
        
        }

        $client = Client::where('phone' , $request->input('phone'))->firstOrFail();

        if(Hash::check($request->input('password') , $client->password))
        {
            $api_token = str_random(60);
            if(Client::where('api_token' , $api_token)->exists())
            {
                $client->api_token = str_random(60);
                $client->save();
            } else {
                $client->api_token = $api_token;
                $client->save();
            }
            
            return apiResponse(200 , $client->api_token , $client);
        }

        return apiResponse(400 , 'Authentication failed');

    }


    public function logout(Request $request)
    {
        $client_id = Client::where( 'api_token' ,$request->input('api_token'))->firstOrFail()->id;
        $client = Client::find($client_id);
        $client->api_token = null;
        $client->save();
        return apiResponse(200 , 'logged out successfully');
    }

    

    public function sendresetpassword(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'email' => 'required|email'
        ]);
        if($validator->fails())
        {
            return apiResponse(400 , 'validation error' , $validator->errors());
        }

        if(!Client::where('email' , $request->input('email'))->exists())
        {
            return apiResponse(400 , 'email not valid');
        }
        $rand = str_random(60);
        $passwordreset = DB::table('password_resets')->insert(['email'=> $request->input('email') , 
            'token' => $rand]);

        Mail::to($request->input('email'))->send(new resetpassword($rand));
        return apiResponse(200 , 'email sent');
    }


}
