<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Admin\webController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('backend')->group(function () {
    Route::get('/',[webController::class, 'index'])->name('admin.index')->middleware(['auth', 'verified']);
    Route::get('news',[webController::class, 'news'])->name('admin.news')->middleware(['auth', 'verified']);
    Route::post('news/create',[webController::class, 'newsCreate'])->name('news.create')->middleware(['auth', 'verified']);
    Route::get('news/show/{id}',[webController::class, 'newsShow'])->name('news.show')->middleware(['auth', 'verified']);
    Route::post('news/update/{id}',[webController::class, 'newsUpdate'])->name('news.update')->middleware(['auth', 'verified']);
    Route::get('events',[webController::class, 'events'])->name('admin.events')->middleware(['auth', 'verified']);
    Route::post('events/create',[webController::class, 'eventsCreate'])->name('events.create')->middleware(['auth', 'verified']);
    Route::post('events/update/{id}',[webController::class, 'eventsUpdate'])->name('events.update')->middleware(['auth', 'verified']);
    Route::get('events/show/{id}',[webController::class, 'eventsShow'])->name('events.show')->middleware(['auth', 'verified']);
    Route::post('events/image/add/{id}',[webController::class, 'addImage'])->name('events.add')->middleware(['auth', 'verified']);
    Route::post('events/image/delete/{id}',[webController::class, 'deleteImage'])->name('events.delete')->middleware(['auth', 'verified']);
    Route::get('role',[webController::class, 'role'])->name('admin.role')->middleware(['auth', 'verified']);
    Route::post('role/update',[webController::class, 'roleUpdate'])->name('admin.role.update')->middleware(['auth', 'verified']);
    Route::get('servicepoint',[webController::class, 'servicepoint'])->name('admin.servicepoint')->middleware(['auth', 'verified']);
    Route::post('servicepoint/update',[webController::class, 'servicepointUpdate'])->name('admin.servicepoint.update')->middleware(['auth', 'verified']);
});

Route::prefix('th')->group(function () {
    Route::get('role',[FrontEndController::class, 'role'])->name('role');
    Route::get('service',[FrontEndController::class, 'service'])->name('service');
    Route::get('forensics',[FrontEndController::class, 'forensics'])->name('forensics');
    Route::get('servicepoint',[FrontEndController::class, 'servicepoint'])->name('servicepoint');
    Route::get('manual',[FrontEndController::class, 'manual'])->name('manual');
    Route::get('news',[FrontEndController::class, 'news'])->name('news');
    Route::get('news/{id}',[FrontEndController::class, 'newsView'])->name('front.news.view');
    Route::get('events',[FrontEndController::class, 'events'])->name('events');
    Route::get('events/{id}',[FrontEndController::class, 'eventsView'])->name('front.events.view');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
