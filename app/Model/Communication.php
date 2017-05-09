<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $table = 'communication';
    protected $primaryKey  = 'PK_ID';
    public $timestamps = true;
}
