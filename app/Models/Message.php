<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'message',
    ];

    public function message_owner() {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
