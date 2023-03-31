<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//show all listings
Route::get('/', [ListingController::class,'index']);


//Show form to create new listings
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');


//Store listing Data
Route::post('/listings',[ListingController::class,'store']);


//Update Listings
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//Delete Listings
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');


//Manage Listings 
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//Single Listings
Route::get('/listings/{listing}',[ListingController::class,'show']);



//Show the Register Form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//Create new user
Route::post('users',[UserController::class,'store']);


//Logout user
Route::post('/logout',[UserController::class,'logout']);

//Show log in form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');


//Log in user
Route::post('/users/authenticate',[UserController::class,'authenticate']);














//function(Listing $listing){

    // with eloquent model binding
   

    
    // without eloquent model binding
    // $listing = Listing::find($id);

    // if($listing){

    //     return view('listing', ['listing'=> $listing]);
    // }
    // else {

    //     abort(404);
    // }


    



// Route::get('/hello',function(){

//     return response('<h1>Hello World</h1>',404)
//     ->header('Content-Type','text/plain')
//     ->header('foo','bar');
// });

// Route::get('/posts/{id}',function ($id){
// dd($id);

//     return response('Post '. $id);
// })->where('id','[0-9]+');

// Route::get('/search',function(Request $request){

//     return $request->name.' '. $request->city;
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
