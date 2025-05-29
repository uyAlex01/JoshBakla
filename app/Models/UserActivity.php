<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    // Activity Types
    const TYPE_ACCOUNT_CREATED = 'account_created';
    const TYPE_LOGIN = 'login';
    const TYPE_LOGOUT = 'logout';
    const TYPE_EVENT_PURCHASE = 'event_purchase';
    // Add more as needed

    protected $fillable = [
        'user_id',
        'type',
        'description',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper method to create activities
    public static function log($userId, $type, $description = null, $metadata = [])
    {
        return static::create([
            'user_id' => $userId,
            'type' => $type,
            'description' => $description ?? $type,
            'metadata' => $metadata
        ]);
    }
}