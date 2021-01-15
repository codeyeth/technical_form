<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'attBy',
    ];
}
