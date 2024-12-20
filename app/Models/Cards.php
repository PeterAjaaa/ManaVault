<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    public function cardSets()
    {
        return $this->belongsTo(CardSets::class, 'set_id');
    }

    public function deckCards()
    {
        return $this->hasMany(DeckCards::class, 'card_id');
    }

    public function sideboards()
    {
        return $this->hasMany(DeckSideboards::class, 'card_id');
    }
}
