<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergenciesCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'district',
        'count',
        'emergency',
        'date',
        'year'
    ];
}
