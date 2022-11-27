<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpoNotification extends Model
{
    use HasFactory;
    protected $fillable = [
      "expoToken",
      "deviceName"
    ];
}
