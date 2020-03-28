<?php

namespace App\Moduls\Character;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharValue extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'str', 'def', 'speed', 'stamina', 'chakra', 'tai', 'nin', 'gen', 'learn', 'elements'
    ];

    protected $casts = [
        'elements' => 'array'
    ];
}
