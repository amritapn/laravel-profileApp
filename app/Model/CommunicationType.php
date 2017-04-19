<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommunicationType extends Model
{
    protected $table = 'communicationType';
    protected $primaryKey  = 'PK_ID';
    public $timestamps = false;
}
