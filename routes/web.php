<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\CorretorController;
use App\Http\Controllers\SeguradoraController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PropostaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('teste', 'teste')
    ->middleware(['auth', 'verified'])
    ->name('teste');

Route::resource('pessoas', PessoaController::class);
Route::resource('seguradoras', SeguradoraController::class);
Route::resource('corretores', CorretorController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('propostas', PropostaController::class);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
