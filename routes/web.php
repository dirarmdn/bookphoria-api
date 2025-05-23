<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

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
    return view('welcome');
});

Route::get('/test-mail', function() {
    try {
        Mail::raw('Ini isi email plain text', function($message) {
            $message->to('test@example.com')
                   ->subject('Test Email dari Laravel');
        });
        
        return "Email berhasil dikirim! Cek Mailtrap Inbox";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/test-reset-password', function() {
    $user = \App\Models\User::first(); // Ambil user contoh
    
    $user->notify(new ResetPassword('token-reset-contoh'));
    
    return "Email reset password terkirim!";
});
