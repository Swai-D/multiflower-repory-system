<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectMessage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sender()
    {
      return $this->belongsTo('App\Models\User', 'senderId');;
    }

    public function receiver()
    {
      return $this->belongsTo('App\Models\User', 'receiver_id');;
    }
}
