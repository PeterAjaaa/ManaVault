<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Decks;
use App\Models\DeckCards;
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
            'decklist' => 'required',
        ]);

        $deck = Decks::create($request->except('decklist'));

        $decklist = $request->input('decklist');
        $lines = explode("\n", $decklist);
        foreach ($lines as $line) {
            if (preg_match('/^(\d+)x\s+(.+)$/', trim($line), $matches)) {
                $quantity = (int)$matches[1];
                $cardName = trim($matches[2]);

                $card = Cards::where('name', $cardName)->first();
                if ($card) {
                    DeckCards::create([
                        'deck_id' => $deck->id,
                        'card_id' => $card->id,
                        'quantity' => $quantity,
                    ]);
                } else {
                    return redirect()->back()->withErrors(["Card '$cardName' not found"]);
                }
            }
        }
        return redirect()->route('decks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Decks $decks)
    {
        $decks->load('deckCards.cards');
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
            'decklist' => 'required',
        ]);

        $deck = Decks::findOrFail($decks->id);
        $deck->update($request->except(['_token', '_method', 'created_by_user_id', 'decklist']));
        $deck->deckCards()->delete();

        $decklist = $request->input('decklist');
        $lines = explode("\n", $decklist);

        foreach ($lines as $line) {
            if (preg_match('/^(\d+)x\s+(.+)$/', trim($line), $matches)) {
                $quantity = (int)$matches[1];
                $cardName = trim($matches[2]);

                $card = Cards::where('name', $cardName)->first();
                if ($card) {
                    $deck->deckCards()->create([
                        'card_id' => $card->id,
                        'quantity' => $quantity,
                    ]);
                } else {
                    return redirect()->back()->withErrors(["Card '$cardName' not found"]);
                }
            }
        }
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
