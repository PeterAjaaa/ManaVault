<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;

class CardsController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->input('card_name');
        $cards = Cards::where('name', 'like', '%' . $search . '%')->get();
        return view('cards.index', compact('cards'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cards = null;
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Cards $cards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cards $cards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cards $cards)
    {
        //
    }
}
