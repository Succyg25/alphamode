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
Route::get('/plans', Plans::class)->name('plans');
Route::get('/trainers', Trainers::class)->name('trainers');


Route::middleware('auth')->group(function () {
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

Route::post('/logout', function () {
    Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/trainers', \App\Livewire\Admin\ManageTrainers::class)->name('admin.trainers');
    Route::get('/admin/plans', \App\Livewire\Admin\ManagePlans::class)->name('admin.plans');
    Route::get('/admin/classes', \App\Livewire\Admin\ManageClasses::class)->name('admin.classes');
    Route::get('/admin/schedules', \App\Livewire\Admin\ManageSchedules::class)->name('admin.schedules');

});
