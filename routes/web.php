<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Models\Note;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'getAllNotes'])->name('notes');
Route::get('/notes/create-note', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/notes/store-note', [NoteController::class, 'storeNote'])->name('storeNote');
Route::get('notes/favorites', [NoteController::class, 'viewFavorites'])->name('viewFavorites');
Route::get('/notes/{id}', [NoteController::class, 'viewNote'])->name('viewNote');
Route::get('notes/{id}/edit-note', [NoteController::class, 'editNote'])->name('editNote');
Route::put('/notes/{id}/update-note', [NoteController::class, 'updateNote'])->name('updateNote');
Route::delete('/notes/{id}/delete-note', [NoteController::class, 'deleteNote'])->name('deleteNote');
Route::patch('/notes/{id}/add-to-favorites', [NoteController::class, 'addToFavorites'])->name('addToFavorites');
Route::patch('/notes/{id}/remove-from-favorites', [NoteController::class, 'removeFromFavorites'])->name('removeFromFavorites');


