<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Services;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'PK_ID';
    public $timestamps = true;
    protected $fillable = array('userName', 'password');


}
