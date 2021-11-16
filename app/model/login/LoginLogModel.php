<?php

namespace App\model\login;

use Illuminate\Database\Eloquent\Model;

class LoginLogModel extends Model
{
    protected $table = 'tbl_login_log';
    // protected $fillable = ['scope_name'];
    public $timestamps = false;
}
