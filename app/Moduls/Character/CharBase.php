<?php

namespace App\Moduls\Character;

use Database\Factories\CharBaseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharBase extends Model
{
    use SoftDeletes;
    use HasFactory;
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

    /**
     * 
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CharBaseFactory::new();
    }
}
