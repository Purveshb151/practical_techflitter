<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailPractical extends Model
{
    use HasFactory;


    protected $fillable = [
        'subject',
        'message',
        'read',
        'sender_id',
        'receiver_id',
    ];


    public function sender()
    {
        return $this->belongsTo('App\Models\User','sender_id','id');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Models\User','receiver_id','id');
    }	
}
