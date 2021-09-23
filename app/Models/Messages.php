<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $table = "messages";

    protected $fillable = [
        'subject',
        'message_contents',
        'sender_id',
        'recipient_id',
    ];

    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
