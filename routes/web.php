<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\CardsController::class, 'index'])->name('cards.index');
Route::get('/cards/search', [App\Http\Controllers\CardsController::class, 'search'])->name('cards.search');

Route::get('/decks', [App\Http\Controllers\DecksController::class, 'index'])->name('decks.index');
Route::get('/decks/new', [App\Http\Controllers\DecksController::class, 'create'])->name('decks.create');
