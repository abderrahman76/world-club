<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player_squadlist extends Model
{
    protected $fillable =[
        'squadlist_id',
        'player_id'
    ];
    use HasFactory;
}
