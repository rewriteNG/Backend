<?php

namespace App\Moduls;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use SoftDeletes;
    protected $table= "char_base";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'home_village', 'current_location', 'faction', 'age', 'picture', 'rank'
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
