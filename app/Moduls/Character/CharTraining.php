<?php

namespace App\Moduls\Character;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharTraining extends Model
{
    use HasFactory;
    use SoftDeletes;
}
