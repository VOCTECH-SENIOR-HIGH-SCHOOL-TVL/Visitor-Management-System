<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    // Specify the fillable fields
    protected $fillable = [
        'full_name',
        'contact_number',
        'address',
        'who_to_meet',
        'reason',
        'time_in',
        'time_out',
    ];
}