<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneNoteRequest;
use App\PhoneNote;
use PDF;

/**
 * Class PhoneNotesController
 * @package App\Http\Controllers
 */
class PhoneNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phoneNotes = PhoneNote::orderby('id', 'desc')->paginate(10);

        return view('phone-notes.index')->with(['phoneNotes' => $phoneNotes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phone-notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneNoteRequest $request)
    {
        $phoneNumber = new PhoneNote([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone-number'),
            'description' => $request->get('description')
        ]);
        if (!$phoneNumber->save()) {
            return redirect()->back()->withErrors($phoneNumber);
        } else {
            return redirect()->route('phone-notes.index')->with([
                'message' => 'Yay! Phone note has been created successfully!',
                'status' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phoneNote = PhoneNote::find($id);
        if ($phoneNote) {
            return view('phone-notes.show')->with('phoneNote', $phoneNote);
        } else {
            return redirect()->route('phone-notes.index')->with([
                'message' => 'Oops! The `Phone Note` was not found!',
                'status' => 'danger'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phoneNote = PhoneNote::find($id);
        if ($phoneNote) {
            return view('phone-notes.edit')->with('phoneNote', $phoneNote);
        } else {
            return redirect()->route('phone-notes.index')->with([
                'message' => 'Oops! The `Phone Note` was not found!',
                'status' => 'danger'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneNoteRequest $request, $id)
    {
        $phoneNote = PhoneNote::find($id);
        if (!$phoneNote) {
            return redirect()->route('phone-notes.index')->with([
                'message' => 'Oops! The `Phone Note` was not found!',
                'status' => 'danger'
            ]);
        } else {
            $phoneNote->name = $request->get('name');
            $phoneNote->phone_number = $request->get('phone-number');
            $phoneNote->description = $request->get('description');

            if (!$phoneNote->save()) {
                return redirect()->route('phone-notes.index')->with([
                    'message' => 'Hmm! Something went wrong!',
                    'status' => 'danger'
                ]);
            } else {
                return redirect()->route('phone-notes.index')->with([
                    'message' => 'Phone note has been updated successfully!',
                    'status' => 'success'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phoneNote = PhoneNote::find($id);
        if (!$phoneNote->delete()) {
            return redirect()->route('phone-notes.index')->with([
                'message' => 'Hmm! Something went wrong!',
                'status' => 'danger'
            ]);
        } else {
            return redirect()->route('phone-notes.index')->with([
                'message' => 'Phone note has been deleted successfully!',
                'status' => 'success'
            ]);
        }
    }

    /**
     * Generates PDF file for download
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $phoneNotes = PhoneNote::orderby('name')->get();
        $pdf = PDF::loadView('phone-notes.pdf-view', ['phoneNotes' => $phoneNotes]);

        return $pdf->download('List-of-My-PhoneNotes.pdf');
    }
}
