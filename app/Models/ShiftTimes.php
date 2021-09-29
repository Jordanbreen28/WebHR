<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftTimes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shift_date',
        'shift_start',
        'shift_end',
    ];

    protected $dateFormat = 'UK';//needs adjusting

}
