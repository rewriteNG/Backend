<?php

namespace App\Moduls\Character;

use Database\Factories\CharValueFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharValue extends Model
{
    use SoftDeletes;
    use HasFactory;
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

    protected $hidden = [
        'user_id', 'id'
    ];

    public function charBase()
    {
        return $this->belongsTo(CharBase::class);
    }

    /**
     * 
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CharValueFactory::new();
    }
}
