<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class ListingController extends Controller
{


//common resources Routes:
//index - show all listings
//show - show a single listing
//create - show the form to create new listings
//store - Store new listings on dB
//edit - show form to edit listings 
//update - Update listings
//destroy - delete listings

    //show all listings
   public function index(){

    return view('listings.index',['heading'=> 'Latest Listings',
                            'listings'=> Listing::latest()
                            -> filter(request(['tag','search']))->paginate(6)
                        ]);


   }

   //show single listing
   public function show(Listing $listing){

    return view('listings.show', [
        'listing'=>$listing]);

   }

   //show create forms

   public function create(){
    return view('listings.create');
}

//store gigs data
public function store(Request $request){

 

    $formFields =  $request->validate([
        'title'=> 'required',
        'company'=>['required',Rule::unique('listings','company')],
        'location'=>'required',
        'website'=>'required',
        'email'=>['required','email'],
        'tags'=> 'required',
        'description'=>'required'
    ]);

    Listing::create($formFields);



    return redirect('/')->with('message','Listing created successfully!');
}
}
