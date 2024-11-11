<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;

class CardsController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->input('card_name');
        $cards = Cards::with('cardSets')->where('name', 'like', '%' . $search . '%')->get();
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
}
