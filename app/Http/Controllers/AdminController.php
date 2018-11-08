<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Governerate;
use Validator;
use App\Donationreq;
use App\Client;
use App\Blood;
use App\Article;
use App\Notification;
use App\Category;
use App\Contact;
use App\Report;


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
        $governerates = Governerate::all();
        $cities = City::all();
        return view('admin.cities' , compact('cities' , 'governerates'));
    }

    public function create_city(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|unique:cities,name',
            'governerateid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('admin/cities')
            ->withErrors($validator)
            ->withInput();
        }
        $gov = Governerate::findOrFail($request->input('governerateid'));
        $city = new City;
        $city->name = $request->input('name');
        $city->governerate_id = $request->input('governerateid');
        $city->save();
        return redirect('/admin/cities');
    }

    public function edit_city($cityid)
    {
        $governerates = Governerate::all();
        $city = City::findOrFail($cityid);
        return view('admin.updatecity' , compact('city' , 'governerates'));
    }

    public function update_city(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'cityid' => 'required',
            'name' => 'min:3|max:100',
            'governerateid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('admin/editcity/'.$request->input('cityid'))
            ->withErrors($validator)
            ->withInput();
        }

        $city = City::findOrFail($request->input('cityid'));
        if($request->has('name'))
        {
            $city->name = $request->input('name');
        }
        $city->governerate_id = $request->input('governerateid');
        $city->save();
        return redirect('/admin/cities');
    }

    public function delete_city($cityid)
    {
        $city = City::findOrFail($cityid);
        return view('admin.deletecity' , compact('cityid' , 'city'));
    }

    public function destroy_city(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'cityid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/cities');
        }
        $city = City::findOrFail($request->input('cityid'));
        if(!$city->clientss()->exists() && !$city->donationreqs()->exists())
        {
            $city->delete();
            $request->session()->flash('success' , 'City Has Been Deleted');
            return redirect('/admin/cities');
        } else {
            $request->session()->flash('error' , 'You can\'t delete this city it has relations');
            return redirect('/admin/cities');
        }
    }

    public function dont_destroy_city(Request $request)
    {
        $request->session()->flash('info' , 'You did not delete the city' );
        return redirect('/admin/cities');
    }

    public function governerates()
    {
        $governerates = Governerate::all();
        return view('admin.governerates' , compact('governerates'));
    }

    public function create_governerate(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|unique:governerates,name'
        ]);
        if($validator->fails())
        {
            return redirect('admin/governerates')
            ->withErrors($validator)
            ->withInput();
        }

        $gov = new Governerate;
        $gov->name =$request->input('name');
        $gov->save();
        return redirect('admin/governerates');
    }

    public function edit_governerate($governerateid)
    {
        $gov = Governerate::findOrFail($governerateid);
        return view('admin.editgovernerate' , compact('gov'));
    }

    public function update_governerate(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required',
            'governerateid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/editgovernerate/'.$request->input('governerateid'))
            ->withErrors($validator)
            ->withInput();
        }
        $gov = Governerate::findOrFail($request->input('governerateid'));
        $gov->name = $request->input('name');
        $gov->save();
        $request->session()->flash('success' , 'governerate updated successfully');
        return redirect('admin/governerates');
    }

    public function delete_governerate($governerateid)
    {
        $gov = Governerate::findOrFail($governerateid);
        return view('admin.deletegovernerate' , compact('gov'));
    }

    public function destroy_governerate(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'governerateid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('admin/governerates');
        }

        $gov = Governerate::findOrFail($request->input('governerateid'));
        if(!$gov->cities()->exists() && !$gov->donationreqs()->exists())
        {
            $gov->delete();
            $request->session()->flash('success' , 'governerate deleted successfully');
            return redirect('admin/governerates');
        } else {
            $request->session()->flash('error' , 'You cant delete governerate it has relations');
            return redirect('admin/governerates');
        }
    }

    public function dont_destroy_governerate(Request $request)
    {
        $request->session()->flash('info' , 'You did not delete the governerate');
        return redirect('admin/governerates');
    }


    public function bloods()
    {
        $bloods = Blood::all();
        return view('admin.bloods' , compact('bloods'));
    }

    public function create_bloodtype(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'type' => 'required|unique:bloods,type'
        ]);
        if($validator->fails())
        {
            return redirect('admin/bloods')
            ->withErrors($validator)
            ->withInput();
        }
        $blood = new Blood;
        $blood->type = $request->input('type');
        $blood->save();
        $request->session()->flash('success' , 'You created new blood type');
        return redirect('admin/bloods');
    }

    public function edit_blood($bloodid)
    {
        $blood = Blood::findOrFail($bloodid);
        return view('admin.editblood' , compact('blood'));
    }

    public function update_blood(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'bloodid' => 'required|integer',
            'type' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect('admin/bloods')
            ->withErrors($validator)
            ->withInput();
        }
        $blood = Blood::findOrFail($request->input('bloodid'));
        $blood->type = $request->input('type');
        $blood->save();
        $request->session()->flash('success' , 'Blood Type updated');
        return redirect('admin/bloods');
    }

    public function delete_blood($bloodid)
    {
        $blood = Blood::findOrFail($bloodid);
        return view('admin.deleteblood' , compact('blood'));
    }

    public function destroy_blood(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'bloodid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('admin/deleteblood')
            ->withErrors($validator);
        }
        $blood = Blood::findOrFail($request->input('bloodid'));
        if(!$blood->clientss()->exists() && !$blood->donationreqs()->exists())
        {
            $blood->delete();
            $request->session()->flash('success' , 'Blood type deleted');
            return redirect('admin/bloods');
        } else {
            $request->session()->flash('error' , 'cant delete blood type it has relations');
            return redirect('admin/bloods');
        }
    }

    public function dont_destroy_blood(Request $request)
    {
        $request->session()->flash('info' , 'You did not destroy blood type');
        return redirect('admin/bloods');
    }

    public function donations()
    {
        $donations = Donationreq::paginate(20);
        return view('admin.donations' , compact('donations'));
    }

    public function delete_donation($donationid)
    {
        $donation = Donationreq::findOrFail($donationid);
        return view('admin.deletedonation' , compact('donation'));
    }

    public function destroy_donation(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'donationid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/donations')
            ->withErrors($validator);
        }
        $donation = Donationreq::findOrFail($request->input('donationid'));
        $not = $donation->notification();
        $not->delete();
        $donation->delete();
        $request->session()->flash('success' , 'You deleted donation request and its notification');
        return redirect('/admin/donations');
    }

    public function dont_destroy_donation(Request $request)
    {
        $request->session()->flash('info' , 'You did not destroy donation request');
        return redirect('admin/donations');
    }


    public function articles()
    {
        $articles = Article::paginate(20);
        $cats = Category::all();
        return view('admin.articles' , compact('articles' , 'cats'));
    }

    public function create_article(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'categoryid' => 'required|integer',
            'title' => 'required|min:3|max:190',
            'body' => 'required|min:50',
            'image' => 'image|max:1999'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/articles')
            ->withErrors($validator)
            ->withInput();
        }
        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('public');
            $file = pathinfo($path , PATHINFO_BASENAME);
        }
        $article = new Article;
        $article->user_id = auth()->user()->id;
        $article->category_id = $request->input('categoryid');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        if($request->hasFile('image'))
        {
            $article->image = $file;
        }
        $article->save();
        return redirect('admin/articles/show/'.$article->id);
    }

    public function show_article($articleid)
    {
        $article = Article::findOrFail($articleid);
        return view('admin.showarticle' , compact('article'));
    }


    public function edit_article($articleid)
    {
        $article = Article::findOrFail($articleid);
        $cats = Category::all();
        return view('admin.editarticle' , compact('article' , 'cats'));
    }

    public function update_article(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'articleid' => 'required|integer',
            'categoryid' => 'required|integer',
            'title' => 'min:3|max:190',
            'body' => 'min:50',
            'image' => 'image|max:1999'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/articles/edit/'.$request->input('articleid'))
            ->withErrors($validator);
        }

        $article = Article::findOrFail($request->input('articleid'));

        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('public');
            $file = pathinfo($path , PATHINFO_BASENAME);
        }
        $article->category_id = $request->input('categoryid');
        if($request->has('title'))
        {
            $article->title = $request->input('title');
        }
        if($request->has('body'))
        {
            $article->body = $request->input('body');
        }
        if($request->hasFile('image'))
        {
            $article->image = $file;
        }
        $article->save();

        $request->session()->flash('success' , 'You edited article');
        return redirect('/admin/articles/show/'.$article->id);

    }

    public function delete_article($articleid)
    {
        $article = Article::findOrFail($articleid);
        return view('admin.deletearticle' , compact('article'));
    }

    public function destroy_article(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'articleid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/articles');
        }
        $article = Article::findOrFail($request->input('articleid'));
        $article->delete();
        $request->session()->flash('success' , 'You deleted article');
        return redirect('/admin/articles');

    }

    public function dont_destroy_article(Request $request)
    {
        $request->session()->flash('info' , 'you did not destroy article');
        return redirect('/admin/articles');

    }

    public function categories()
    {
        $cats = Category::all();
        return view('admin.categories' , compact('cats'));
    }

    public function create_category(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/categories')
            ->withErrors($validator)
            ->withInput();
        }

        $category = new Category;
        $category->name = $request->input('name');
        $category->save();
        $request->session()->flash('success' , 'You created category');
        return redirect('/admin/categories');
    }

    public function edit_category($categoryid)
    {
        $cat = Category::findOrFail($categoryid);
        return view('admin.editcategory' , compact('cat'));
    }

    public function update_category(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'categoryid' => 'required|integer',
            'name' => 'required|min:3|max:100'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/categories/edit/'.$request->input('categoryid'))
            ->withErrors($validator);
        }
        $cat = Category::findOrFail($request->input('categoryid'));
        $cat->name = $request->input('name');
        $cat->save();
        $request->session()->flash('success' , 'You changed category name');
        return redirect('/admin/categories');
    }

    public function delete_category($categoryid)
    {
        $cat = Category::findOrFail($categoryid);
        return view('admin.deletecategory' , compact('cat'));
    }

    public function destroy_category(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'categoryid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/categories');
        }
        $cat = Category::findOrFail($request->input('categoryid'));
        if($cat->articles->exists())
        {
            $request->session()->flash('info' , 'You Can Not Delete Category it has articles');
            return redirect('/admin/categories');
        }
        $cat->delete();
        $request->session()->flash('success' , 'You deleted category');
        return redirect('/admin/categories');
    }

    public function dont_destroy_category(Request $request)
    {
        $request->session()->flash('info' , 'you did not destroy category');
        return redirect('/admin/categories');
    }

    public function clients()
    {
        $clients = Client::paginate(20);
        return view('admin.clients' , compact('clients'));
    }


    public function delete_client($clientid)
    {
        $client = Client::findOrFail($clientid);
        return view('admin.deleteclient' , compact('client'));
    }

    public function destroy_client(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'clientid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/clients');
        }
        $client = Client::findOrFail($request->input('clientid'));
        if($client->donationreqs()->exists())
        {
            $request->session()->flash('error' , 'You can not delete client it has relations with donation requests');
            return redirect('/admin/clients');
        }
        $client->delete();
        $request->session()->flash('success' , 'You deleted client');
        return redirect('/admin/clients');
    }

    public function dont_destroy_client(Request $request)
    {
        $request->session()->flash('info' , 'you did not delete client');
        return redirect('/admin/clients');
    }

    public function contacts()
    {
        $contacts = Contact::paginate(20);
        return view('admin.contacts' , compact('contacts'));
    }

    public function delete_contact($contactid)
    {
        $contact = Contact::findOrFail($contactid);
        return view('admin.deletecontact' , compact('contact'));
    }

    public function destroy_contact(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'contactid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/contacts');
        }
        $contact = Contact::findOrFail($request->input('contactid'));
        $contact->delete();
        $request->session()->flash('success' , 'contact deleted successfully');
        return redirect('/admin/contacts');
    }

    public function dont_destroy_contact(Request $request)
    {
        $request->session()->flash('info' , 'You did not destroy contact');
        return redirect('/admin/contacts');
    }

    public function reports()
    {
        $reports = Report::paginate(20);
        return view('admin.reports' , compact('reports'));
    }

    public function delete_report($reportid)
    {
        $report = Report::findOrFail($reportid);
        return view('admin.deletereport' , compact('report'));
    }

    public function destroy_report(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'reportid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/reports');
        }
        $report = Report::findOrFail($request->input('reprotid'));
        $report->delete();
        $request->session()->flash('success' , 'report deleted successfully');
        return redirect('/admin/reports');

    }

    public function dont_destroy_report(Request $request)
    {
        $request->session()->flash('info' , 'You did not destroy report');
        return redirect('/admin/reports');
    }

}
