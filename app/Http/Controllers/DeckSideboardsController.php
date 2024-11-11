<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Decks;
use App\Models\DeckCards;
use App\Models\DeckSideboards;
use Illuminate\Http\Request;

class DeckSideboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Decks $decks)
    {
        $decks = Decks::with('sideboards.cards')->findOrFail($decks->id);
        return view('sideboards.index', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Decks $decks)
    {
        $decks = Decks::findOrFail($decks->id);
        return view('sideboards.create', compact('decks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Decks $decks)
    {
        $request->validate([
            'decklist' => 'required',
        ]);

        $decklist = $request->input('decklist');
        $lines = explode("\n", $decklist);
        foreach ($lines as $line) {
            if (preg_match('/^(\d+)x\s+(.+)$/', trim($line), $matches)) {
                $quantity = (int)$matches[1];
                $cardname = trim($matches[2]);

                $card = cards::where('name', $cardname)->first();
                if ($card) {
                    DeckSideboards::create([
                        'deck_id' => $decks->id,
                        'card_id' => $card->id,
                        'quantity' => $quantity,
                    ]);
                } else {
                    return redirect()->back()->witherrors(["card '$cardname' not found"]);
                }
            }
        }
        return redirect()->route('sideboards.index', $decks);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeckSideboards $deckSideboards, Decks $decks)
    {
        return view('sideboards.edit', compact('deckSideboards', 'decks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decks $decks)
    {
        $request->validate([
            'decklist' => 'required',
        ]);

        $deck = Decks::findOrFail($decks->id);
        $deck->update($request->except(['_token', '_method', 'decklist']));
        $deck->sideboards()->delete();

        $decklist = $request->input('decklist');
        $lines = explode("\n", $decklist);

        foreach ($lines as $line) {
            if (preg_match('/^(\d+)x\s+(.+)$/', trim($line), $matches)) {
                $quantity = (int)$matches[1];
                $cardName = trim($matches[2]);

                $card = Cards::where('name', $cardName)->first();
                if ($card) {
                    $deck->sideboards()->create([
                        'card_id' => $card->id,
                        'quantity' => $quantity,
                    ]);
                } else {
                    return redirect()->back()->withErrors(["Card '$cardName' not found"]);
                }
            }
        }
        return redirect()->route('sideboards.index', $decks);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeckSideboards $deckSideboards)
    {
        $deckSideboards->delete();
        return redirect()->route('decks.index');
    }
}
