<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('listings',['heading'=> 'Latest Listings',
                            'listings'=> Listing::all()
                        ]);
});

//Single Listings
Route::get('/listings/{id}',function($id){

    
    return view('listing', ['listing'=> Listing::find($id)]);

});

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
