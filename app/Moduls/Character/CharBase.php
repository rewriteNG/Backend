<?php

namespace App\Moduls\Character;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharBase extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'home_village', 'current_location', 'faction', 'age', 'picture', 'rank'
    ];

    protected $guarded = [
        'id', 'user_id'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'rank' => 'Genin',
    ];
}
