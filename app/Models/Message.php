<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['receiver_id', 'receiver_type', 'sender_id', 'sender_type', 'message'];

    public function sender()
    {
        return $this->morphTo('sender', 'sender_type', 'sender_id');
    }

    public function receiver()
    {
        return $this->morphTo('receiver', 'receiver_type', 'receiver_id');
    }
}