<?php

namespace App\Models;

use App\Http\Behavior\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    public $fillable = ["name","slug"];

    use Sluggable;
}

