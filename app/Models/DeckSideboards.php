<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeckSideboards extends Model
{
    protected $fillable = ['deck_id', 'card_id', 'quantity'];

    public function decks()
    {
        return $this->belongsTo(Decks::class, 'deck_id');
    }

    public function cards()
    {
        return $this->belongsTo(Cards::class, 'card_id');
    }
}
