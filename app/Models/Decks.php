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
}
