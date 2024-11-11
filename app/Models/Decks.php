<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decks extends Model
{
    protected $fillable = [
        'created_by_user_id',
        'name',
        'description',
        'format',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function deckCards()
    {
        return $this->hasMany(DeckCards::class, 'deck_id');
    }

    public function cards()
    {
        return $this->hasManyThrough(Cards::class, DeckCards::class, 'deck_id', 'id', 'id', 'card_id');
    }

    public function sideboards()
    {
        return $this->hasMany(DeckSideboards::class, 'deck_id');
    }
}
