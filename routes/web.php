<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
// routes/web.php

// Route to display the form to create a new member
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');

// Route to handle the creation of a new member
Route::post('/members', [MemberController::class, 'store'])->name('members.store');

//Route to edit members
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');

//Route to delete members
//Route::get('/members/{member}/destroy', [MemberController::class, 'destroy'])->name('members.destroy');

// Route to display all members
Route::get('/members', [MemberController::class, 'index'])->name('members.index');

// Route to display members for a specific school
Route::get('/members/school/{school}', [MemberController::class, 'show'])->name('members.show');

//Routes for School
Route::get('/schools', [SchoolController::class, 'index'])->name('schools.index');
Route::get('/schools/create', [SchoolController::class, 'create'])->name('schools.create');
Route::post('/schools', [SchoolController::class, 'store'])->name('schools.store');
Route::get('/schools/{id}', [SchoolController::class,'show'])->name('schools.show');
Route::get('/schools/{id}/edit', [MemberController::class, 'edit'])->name('schools.edit');
