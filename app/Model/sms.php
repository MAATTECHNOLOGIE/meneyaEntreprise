<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class sms extends Model
{
    protected $fillable = ['codeSMS','dateSend','msg'];
}
