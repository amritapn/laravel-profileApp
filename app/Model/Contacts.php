<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $primaryKey  = 'PK_ID';
    public $timestamps = false;
}
