<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/cards', [App\Http\Controllers\CardsController::class, 'index'])->name('cards.index');
Route::get('/cards/search', [App\Http\Controllers\CardsController::class, 'search'])->name('cards.search');

Route::get('/decks', [App\Http\Controllers\DecksController::class, 'index'])->name('decks.index');
Route::get('/decks/new', [App\Http\Controllers\DecksController::class, 'create'])->name('decks.create');
Route::get('/decks/{decks}', [App\Http\Controllers\DecksController::class, 'show'])->name('decks.show');
Route::get('/decks/{decks}/edit', [App\Http\Controllers\DecksController::class, 'edit'])->name('decks.edit');
Route::post('/decks/{decks}/update', [App\Http\Controllers\DecksController::class, 'update'])->name('decks.update');
Route::get('/decks/{decks}/delete', [App\Http\Controllers\DecksController::class, 'destroy'])->name('decks.delete');
Route::post('/decks/store', [App\Http\Controllers\DecksController::class, 'store'])->name('decks.store');
