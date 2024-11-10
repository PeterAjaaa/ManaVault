<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Decks;
use Illuminate\Http\Request;

class DecksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = null;
        return view('decks.index', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('decks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Decks $decks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Decks $decks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decks $decks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Decks $decks)
    {
        //
    }
}
