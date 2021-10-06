<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_by',
        'shift_date',
        'shift_start',
        'shift_end',
        'Clock_in',
        'Clock_out',
        'shift_complete'
    ];

    protected $dateFormat = 'UK';//needs adjusting

}
