<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'raw_response',
        'status',
        'errors',
        'redirect_uri'
    ];
}
