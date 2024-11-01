<?php

namespace App\Models;

use App\Models\Cards;
use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    public function cards()
    {
        return $this->hasMany(Cards::class);
    }
}
