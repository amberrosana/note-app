<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Models\Note;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/note-app/all-notes', [NoteController::class, 'getAllNotes'])->name('all-notes');
Route::get('/note-app/create-note', [NoteController::class, 'createNote'])->name('create-note');
Route::post('/note-app/store-note', [NoteController::class, 'storeNote'])->name('store-note');