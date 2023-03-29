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
        'description'=>'required',
        
    ]);

   
// image path was not saved to the database cause the in the protected $fillable varibale on the Model, the logo field was not defined and 
// as the field is nullable laravel did not show any error.
     if($request->hasFile('logo')){
     
        $formFields['logo']= $request->file('logo')->store('logos','public');
    
     
        }



    Listing::create($formFields);



    return redirect('/')->with('message','Listing created successfully!');
    }

    public function edit(Listing $listing){
        

        
        return view('listings.edit',['listing'=> $listing]);
    }

//Update
    public function Update(Request $request, Listing $listing){


        $formFields =  $request->validate([
            'title'=> 'required',
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=> 'required',
            'description'=>'required',
            
        ]);


        if($request->hasFile('logo')){
     
            $formFields['logo']= $request->file('logo')->store('logos','public');       
      
            }
    

            $listing->update($formFields);

            return back()->with('message','Listing updated successfully!');



}

//Delete Listings 
public function destroy(Listing $listing){

    $listing->delete();

    return redirect('/')->with('message','Listing deleted successfully');

}

}