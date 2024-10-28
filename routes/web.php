<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return redirect('notes');
});

Route::get('/notes', [NoteController::class, 'getAllNotes'])->name('notes');
Route::get('/notes/create-note', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/notes/store-note', [NoteController::class, 'storeNote'])->name('storeNote');
Route::get('notes/archive', [NoteController::class, 'viewArchive'])->name('viewArchive');
Route::get('/notes/{id}', [NoteController::class, 'viewNote'])->name('viewNote');
Route::get('notes/{id}/edit-note', [NoteController::class, 'editNote'])->name('editNote');
Route::put('/notes/{id}/update-note', [NoteController::class, 'updateNote'])->name('updateNote');
Route::delete('/notes/{id}/delete-note', [NoteController::class, 'deleteNote'])->name('deleteNote');
Route::patch('/notes/{id}/archive', [NoteController::class, 'archive'])->name('archive');
Route::patch('/notes/{id}/removeFromArchive', [NoteController::class, 'removeFromArchive'])->name('removeFromArchive');


