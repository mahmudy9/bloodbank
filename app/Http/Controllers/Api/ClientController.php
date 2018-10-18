<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Donationreq;
use App\Http\Resources\DonationResource;
use App\Article;
use App\Favorite;
use App\Category;
use App\Contact;
use App\Report;

class ClientController extends Controller
{


    public function __construct()
    {
        //$this->middleware('token');
        $this->middleware('auth:api');
    }
    

    public function profile(Request $request)
    {
        //$token = $request->input('api_token');
        //$client = Client::where('api_token' , $token)->first();
        return apiResponse(200 , 'success' , $request->user());
    }


    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'string|min:3|max:190',
            'email' => 'email|unique:clients',
            'password' => 'confirmed',
            'dob' => 'date',
            'phone' => 'numeric|unique:clients',
            'city_id' => 'integer',
            'blood_id' => 'integer',
            'last_donation' => 'date'
        ]);
        if($validator->fails())
        {
            return apiResponse(400 , 'Failed to update , some fields are invalid' , $validator->errors());
        }
        $client = Client::find($request->user()->id);
        if($request->has('name'))
        {
            $client->name = $request->input('name');
        }
        if($request->has('email'))
        {
            $client->email = $request->input('email');
        }
        if($request->has('password'))
        {
            $client->password = Hash::make($request->input('password'));

        }
        if($request->has('dob'))
        {
            $client->dob = $request->input('dob');
        }
        if($request->has('phone'))
        {
            $client->phone = $request->input('phone');
        }
        if($request->has('city_id')){

            $client->city_id = $request->input('city_id');
        }
        if($request->has('blood_id'))
        {
            $client->blood_id = $request->input('blood_id');

        }
        if($request->has('last_donation'))
        {
            $client->last_donation = $request->input('last_donation');

        }
        $client->save();
        return apiResponse(200 , 'updated successfully' , $client);
    }

    public function request_donation(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|min:3',
            'age' => 'required',
            'blood_id' => 'required|integer',
            'bags' => 'required|integer',
            'hospital' => 'required|min:3',
            'hospital_address' => 'required|min:6',
            'lat' => 'required',
            'lng' => 'required',
            'phone' => 'required|min:5',
            'governerate_id' => 'required|integer',
            'city_id' => 'required|integer',
            'details' => 'required|min:10'
        ]);
        
        if($validator->fails())
        {
            return apiResponse(400 , $validator->errors()->first() , $validator->errors());
        }

        $client = Client::where('api_token' , $token)->firstOrFail();

        $donation = new Donationreq;
        $donation->client_id = $client->id;
        $donation->name = $request->input('name');
        $donation->age = $request->input('age');
        $donation->blood_id = $request->input('blood_id');
        $donation->bags = $request->input('bags');
        $donation->hospital = $request->input('hospital');
        $donation->hospital_address = $request->input('hospital_address');
        $donation->lat = $request->input('lat');
        $donation->lng = $request->input('lng');
        $donation->phone = $request->input('phone');
        $donation->governerate_id = $request->input('governerate_id');
        $donation->city_id = $request->input('city_id');
        $donation->details = $request->input('details');
        $donation->save();
        return apiResponse(200 , 'donation request saved' , $donation);
    }

    
    public function donation_request($id)
    {
       

        $donation = Donationreq::find($id);

        return apiResponse(200 , 'Donation request data' , new DonationResource($donation));

    }


    public function donations()
    {
        
        $donations = Donationreq::paginate(10);

        return apiResponse(200 , 'donations data' , DonationResource::collection($donations));
    }


    public function articles()
    {
        
        $articles = Article::paginate(10);
        return apiResponse(200 , 'Articles data' , $articles);
    }

    public function article($id)
    {
        $article = Article::find($id);
        return apiResponse(200 , 'article data' , $article);
    }

    public function fav_article(Request $request , $id)
    {
        $token = $request->input('api_token');
        $client_id = Client::where('api_token' , $token)->first()->id;
        if(!Article::find($id))
        {
            return apiResponse(404 , 'invalid data');
        }
        $article_id = Article::find($id)->id;
        $fav = new Favorite;
        $fav->user_id = $client_id;
        $fav->article_id = $article_id;
        $fav->save();
        $favs = Favorite::where('user_id' , $client_id)->get();
        return apiResponse(200 , 'article added to favorites' , $favs);
    }


    public function categories()
    {
        return apiResponse(200 , 'categories' , Category::all());
    }


    public function articles_bycategory($id)
    {
        if(!Category::find($id))
        {
            return apiResponse(404 , 'Category not found');
        }
        
        $articles = Article::where('category_id' , $id)->paginate(10);

        return apiResponse(200 , 'articles by category' , $articles);
    }

    public function report(Request $request)
    {
        $client_id = Client::where('api_token' , $request->input('api_token'))->firstOrFail()->id;
        $validator = Validator::make($request->all() , [
            'body' => 'required|min:10'
        ]);

        if($validator->fails())
        {
            return apiResponse(400 , 'Validation error' , $validator->errors());
        }
        
        $report = new Report;
        $report->user_id = $client_id;
        $report->body = $request->input('body');
        $report->save();
        return apiResponse(200 , 'report sent' , $report);
    }

    public function contact(Request $request)
    {
        $client_id = Client::find($request->user()->id);

        $validator = Validator::make($request->all() , [
            'subject' => 'required|min:3',
            'body' => 'required|min:10'
        ]);
        if($validator->fails())
        {
            return apiResponse(400 , 'Validation error' , $validator->errors());
        }

        $contact = new Contact;
        $contact->user_id = $client_id;
        $contact->subject = $request->input('subject');
        $contact->body = $request->input('body');
        $contact->save();
        return apiResponse(200 , 'message sent' , $contact );
    }


    public function search_articles(Request $request)
    {
        $articles = Article::where('title' , 'like' , '%'.$request->input('search').'%')->
        orWhere('body' , 'like' , '%'.$request->input('search').'%')->get();
        return apiResponse(200 , 'search results' , $articles);
    }


     

}
