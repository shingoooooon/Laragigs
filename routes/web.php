<?php

use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Create Listing
Route::get('/listings/create', [ListingController::class, 'create'])
    ->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])
    ->middleware('auth');

// Edit Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
    ->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class, 'update'])
    ->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth');

// Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])
    ->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'] );


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

// Log out
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');

// show Login form
Route::get('/login', [UserController::class, 'login'])
    ->middleware('guest')
    ->name('login');

// Log in User
Route::post('/user/authenticate', [UserController::class, 'authenticate']);

