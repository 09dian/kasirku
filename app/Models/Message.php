<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'sender_type',
        'receiver_id',
        'receiver_type',
        'message',
    ];

    // Relasi ke pengirim (sender) menggunakan polymorphic relationship
    public function sender(): MorphTo
    {
        return $this->morphTo();
    }

    // Relasi ke penerima (receiver) menggunakan polymorphic relationship
    public function receiver(): MorphTo
    {
        return $this->morphTo();
    }
}