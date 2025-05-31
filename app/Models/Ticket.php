<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'order_id',
        'attended',
        'qr_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
{
    return $this->belongsTo(Event::class);
}

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}