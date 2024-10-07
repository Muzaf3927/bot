<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [TestController::class, 'viewLogin'])->name('login');

Route::post('/admin', [TestController::class, 'create'])->name('utish.create');
Route::post('/kirish', [TestController::class, 'login'])->name('login.create');

Route::get('/error', [TestController::class, 'create'])->name('xatolik.create');

Route::resource('users', UsersController::class);

Route::get('/posts', [NewsController::class, 'index'])->name('news.index');
Route::get('/posts/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/posts', [NewsController::class, 'store'])->name('news.store');
Route::get('/posts/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/posts/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::get('/posts/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/posts/{id}', [NewsController::class, 'destroy'])->name('news.destroy');



Route::get('/bot', function (){
    Http::withOptions(['verify' => false])->post('https://api.telegram.org/bot7500484487:AAG8vzVLbHQJCRadC6HkGVN_tThNOkA5TXc/sendMessage', [
        'chat_id' => 5635436119,//6102457823,
        'text' => 'Salom, bu bot sizga boshqalar akkauntini tekshirish uchun yaratilgan. Iltimos, bu xabarni e\'tibor bilan o\'qing!'
    ]);
});
