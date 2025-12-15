<?php

use App\Livewire\Contact;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Plans;
use App\Livewire\Register;
use App\Livewire\Trainers;
use Illuminate\Support\Facades\Route;

use App\Livewire\About;
use App\Livewire\Jobs;
use App\Livewire\Terms;
use App\Livewire\Privacy;
use App\Livewire\Profile;
use App\Livewire\Subscription;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/careers', Jobs::class)->name('jobs');
Route::get('/terms', Terms::class)->name('terms');
Route::get('/privacy', Privacy::class)->name('privacy');
Route::get('/register', Register::class)->name('register');
Route::get('/plans', Plans::class)->name('plans');
Route::get('/trainers', Trainers::class)->name('trainers');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/subscription', Subscription::class)->name('subscription');
    Route::get('/booking/{trainer}', \App\Livewire\Booking::class)->name('booking');
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
    Route::get('/admin/members', \App\Livewire\Admin\ManageMembers::class)->name('admin.members');

});
