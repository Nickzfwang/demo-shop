<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ChatRecord extends Model
{
    protected $fillable = [
    	'username', 'message'
    ];
}
