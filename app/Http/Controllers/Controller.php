<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\model\settings\system\SystemLogModel;
use App\model\settings\scope\ScopeLogModel;
use Session;
use Jenssegers\Agent\Agent;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function userRole(){
        $user_role=DB::table('tbl_customers')
            ->select('user_role')
            ->where('id','=',Session::get('loginid'))
            ->where('record_status','=',1)
            ->get()->toArray();
        return $user_role;
    }
}
