<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
   protected $fillable = ['nom','succursale_id','contact','lieu','date','statutClt','CodeMat','mail'];   
}
