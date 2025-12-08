<?php

use App\Livewire\Contact;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Plans;
use App\Livewire\Register;
use App\Livewire\Trainers;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::middleware('auth')->group(function () {

    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/plans', Plans::class)->name('plans');
    Route::get('/trainers', Trainers::class)->name('trainers');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');