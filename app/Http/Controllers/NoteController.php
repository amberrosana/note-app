<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function getAllNotes(Request $request)
    {
        $search = $request['search'] ?? "";

        if ($search != "") {
            $notes = Note::where('archived', false)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', "%$search%")
                          ->orWhere('description', 'LIKE', "%$search%")
                          ->orWhere('content', 'LIKE', "%$search%");
                })
                ->orderBy('updated_at', 'desc')
                ->get();
        } else {
            $notes = Note::where('archived', false)
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        
        return view('notes', ['notes' => $notes, 'search' => $search]);
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
        $note->title = $validated['title'] ?? 'Untitled';
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('notes')->with('success', 'Note Created Successfully');
    }

    public function viewNote(Request $request)
    {
        $note = Note::find($request->id);
        return view('note', ['note' => $note]);
    }

    public function editNote(Request $request)
    {
        $note = Note::find($request->id);
        return view('edit-note', ['note' => $note]);
    }

    public function updateNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'content' => 'required|max:10000'
        ]);

        $note = Note::find($request->id);
        $note->title = $validated['title'] ?? 'Untitled';
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('viewNote', ['id' => $note->id])->with('success', 'Note Updated Successfully');
    }

    public function deleteNote(Request $request)
    {
        $note = Note::find($request->id);

        if ($note)
        {
            $note->delete();
        }

        return redirect()->route('notes')->with('success', 'Note Deleted Successfully');
    }

    public function archive(Request $request)
    {
        $note = Note::find($request->id);
        $note->archived = true;
        $note->save();

        return redirect('notes');

    }

    public function viewArchive(Request $request)
    {
        $search = $request['search'] ?? "";

        if ($search != "") {
            $notes = Note::where('archived', true)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', "%$search%")
                          ->orWhere('description', 'LIKE', "%$search%")
                          ->orWhere('content', 'LIKE', "%$search%");
                })
                ->orderBy('updated_at', 'desc')
                ->get();
        } else {
            $notes = Note::where('archived', true)
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        
        return view('archive', ['notes' => $notes, 'search' => $search]);
    }

    public function removeFromArchive(Request $request)
    {
        $note = Note::find($request->id);
        $note->archived = false;
        $note->save();

        return redirect()->route(route: 'viewArchive')->with('success', 'Note Removed From Archive');
    }
}
