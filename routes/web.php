<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::post('/sendEMail', [MailController::class, 'dispair'])->name('sendEmail');
});


require __DIR__.'/auth.php';
