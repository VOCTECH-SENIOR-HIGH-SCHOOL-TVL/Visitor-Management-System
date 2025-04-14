<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'contact_number', 'address', 'who_to_meet', 'reason', 'time_in', 'time_out'];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'who_to_meet');
    }
}