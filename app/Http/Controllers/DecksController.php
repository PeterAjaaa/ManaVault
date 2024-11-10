<?php

namespace App\Http\Controllers;

use App\Models\Decks;
use Illuminate\Http\Request;

class DecksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = Decks::all();
        return view('decks.index', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $user_id = $request->user()->id;
        return view('decks.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'created_by_user_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'format' => 'required',
        ]);

        Decks::create($request->all());

        return redirect()->route('decks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Decks $decks)
    {
        return view('decks.show', compact('decks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Decks $decks)
    {

        return view('decks.edit', compact('decks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decks $decks)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'format' => 'required',
        ]);

        $decks = Decks::where('id', $decks->id)->first();
        $decks->update($request->except(['_token', '_method', 'created_by_user_id']));

        return redirect()->route('decks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Decks $decks)
    {
        $decks->delete();
        return redirect()->route('decks.index');
    }
}
