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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
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

    public const HOME_VILLAGE = ['Konoha', 'Ame', 'Iwa', 'Suna', 'Kusa', 'Kumo', 'Taki', 'Landlos'];

    public const GENDER =  ['m', 'w', 'd'];

    protected static $relations_to_cascade = ['charValue'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                foreach ($resource->{$relation}()->get() as $item) {
                    $item->delete();
                }
            }
        });

        static::restoring(function ($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                foreach ($resource->{$relation}()->get() as $item) {
                    $item->withTrashed()->restore();
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function charValue()
    {
        return $this->hasOne(CharValue::class, 'char_id');
    }

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
