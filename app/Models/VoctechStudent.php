<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoctechStudent extends Model
{
    use HasFactory;

    protected $table = 'voctechstudents'; 
    
    protected $fillable = [
        'full_name',
        'contact_number',
        'address',
        'visits_count',
        'last_visitor',
    ];
}