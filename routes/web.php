<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\GuestDashboardController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ContactController;


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

Route::get('/', function () {
    return view('guest.dashboard');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/qr-code', function () {
    return QrCode::size(300)->generate(url('/visitor/create')); // Ensure this URL is correct
})->name('qr.code');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', [VisitorController::class, 'dashboard'])->name('dashboard');
Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors.index');
Route::get('/visitors/create', [VisitorController::class, 'create'])->name('visitors.create');
Route::post('/visitors', [VisitorController::class, 'store'])->name('visitors.store');
Route::get('/visitors', [VisitorController::class, 'index'])->name('visitor.index');
Route::get('/visitors/{id}/edit', [VisitorController::class, 'edit'])->name('visitors.edit');
Route::put('/visitors/{id}', [VisitorController::class, 'update'])->name('visitors.update');
Route::delete('/visitors/{id}', [VisitorController::class, 'destroy'])->name('visitors.destroy');



Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors.index');
Route::get('/visitors/today', [VisitorController::class, 'today'])->name('visitors.today');


Route::get('/guest-dashboard', [GuestDashboardController::class, 'index'])->name('guest.dashboard');

Route::get('/qrcode/generate/{id}', [QRCodeController::class, 'generate'])->name('qrcode.generate');
  

Route::get('/visitors/{id}/timeout', [VisitorController::class, 'showTimeoutForm'])->name('visitors.timeout');
Route::post('/visitors/{id}/timeout', [VisitorController::class, 'timeout'])->name('visitors.timeout.submit');



Route::resource('contacts', ContactController::class);

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('qr-code', [QRCodeController::class, 'index']);
Route::get('/line-chart',[ChartController::class,'LineChart']);
require __DIR__.'/auth.php';
