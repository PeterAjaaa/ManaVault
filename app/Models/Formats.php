<?php

namespace App\Models;

use App\Models\Decks;
use Illuminate\Database\Eloquent\Model;

class Formats extends Model
{
    public function users()
    {
        return $this->hasMany(Decks::class);
    }
}
