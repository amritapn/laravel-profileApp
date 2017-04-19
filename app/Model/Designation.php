<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'designation';
    protected $primaryKey  = 'PK_ID';
    public $timestamps = false;
}
