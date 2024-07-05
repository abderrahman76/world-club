<?php

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

Route::get('/', [\App\Http\Controllers\userControlle::class, 'index'])->name('home');

Route::get('/match', [\App\Http\Controllers\MatchsController::class, 'index']);
Route::get('/matchinfo/{match}', [\App\Http\Controllers\MatchsController::class, 'show'])->name('matchinfo');
Route::get('/teams', [\App\Http\Controllers\TeamController::class, 'index'])->name('teams');
Route::get('/stadium/{field}', [\App\Http\Controllers\FieldController::class, 'show'])->name('stadium');
Route::get('/team/{team}', [\App\Http\Controllers\TeamController::class, 'show'])->name('team');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('redirects');
    })->name('dashboard');
});

route::group(['middleware' => 'auth'], function () {
    Route::get('redirects', [\App\Http\Controllers\userControlle::class, 'index'])->name('redirects');

    // Route::middleware(['is_admin'])->get('/results', function () {
    //     return view('adminResults')->name('adminResults');
    // });
    Route::middleware(['is_user'])->get('/book/{id}', [\App\Http\Controllers\TicketController::class, 'index'])->name('book');
    Route::middleware(['is_user'])->post('/checkout', [\App\Http\Controllers\TicketController::class, 'create'])->name('checkout');
    Route::middleware(['is_user'])->get('/ticket/{ticket}', [\App\Http\Controllers\TicketController::class, 'show'])->name('ticket');
    Route::middleware(['is_user'])->get('/pdf/{id}', [\App\Http\Controllers\TicketController::class, 'pdf'])->name('download');
    Route::middleware(['is_user'])->get('/myticket', [\App\Http\Controllers\TicketController::class, 'store'])->name('myticket');
    Route::middleware(['is_coach'])->get('/coachMatchs', [\App\Http\Controllers\CoachController::class, 'index'])->name('coachMatchs');
    Route::middleware(['is_coach'])->get('/squadlistForm/{match}/{coach}', [\App\Http\Controllers\CoachController::class, 'show'])->name('squadlistForm');
    Route::middleware(['is_coach'])->post('/squadlistCreate', [\App\Http\Controllers\squadlistController::class, 'store'])->name('squadlistCreate');
    Route::middleware(['is_coach'])->get('/squadlistCreat2/{$playerIdsString}', [\App\Http\Controllers\squadlistController::class, 'create2'])->name('squadlistCreat2');
    Route::middleware(['is_referee'])->get('/refereeMatchs', [\App\Http\Controllers\refereeController::class, 'index'])->name('refereeMatchs');
    Route::middleware(['is_referee'])->get('/refereeMatch/{match}', [\App\Http\Controllers\refereeController::class, 'show'])->name('refereeMatch');
    Route::middleware(['is_referee'])->post('/resultconfirm/{result}', [\App\Http\Controllers\resultController::class, 'update'])->name('resultconfirm');
    Route::middleware(['is_admin'])->get('/adminResults', [\App\Http\Controllers\userControlle::class, 'admin'])->name('adminResults');





   
});
