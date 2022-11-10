<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class,
            RoomUser::class,
            'room_id', // Foreign key on the room_users table...
            'id', // Foreign key on the users table...
            'id',  // Local key on the rooms table...
            'user_id' // Local key on the room_users table...
        );
    }

    public function messages()
    {
        return $this->hasMany(Message::class);//->orderBy('created_at', 'desc');
    }
}
