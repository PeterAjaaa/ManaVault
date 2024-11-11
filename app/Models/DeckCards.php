<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeckCards extends Model
{
    protected $fillable = [
        'deck_id',
        'card_id',
        'quantity',
    ];

    public function decks()
    {
        return $this->belongsTo(Decks::class, 'deck_id');
    }

    /**
     * Get the card associated with this deckcard.
     */
    public function cards()
    {
        return $this->belongsTo(Cards::class, 'card_id');
    }
}
