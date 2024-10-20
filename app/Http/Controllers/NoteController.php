<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function getAllNotes()
    {
        $notes = Note::orderBy('updated_at', 'desc');
        return view('notes', ['notes' => $notes]);
    }

    public function createNote()
    {
        return view('create-note');
    }

    public function storeNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'content' => 'required|max:10000'
        ]);

        $note = new Note();
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->save;

        return redirect()->route('all-notes')->with('success', 'Note Created Successfully');
    }
}
