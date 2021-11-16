<?php
namespace App\Http\Controllers\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\LoginModel;
use App\model\login\LoginLogModel;
use Auth;
use Session;
use Jenssegers\Agent\Agent;

class LoginController extends Controller {
    public function login(Request $request){
        return view('login.index');
    }
    public function loginDckap(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $LoginModel = LoginModel::where('username','=',$username)
                    ->where('password','=',$password)
                    ->where('record_status','=',1)
                    ->first();
        if($LoginModel){
            $returnValue['error'] = 1;
            $returnValue['msg'] = 'Ready to Login';
            $request->session()->put('loginuser', $LoginModel->username);
            $request->session()->put('loginid', $LoginModel->id);
            $request->session()->put('login_user_role', $LoginModel->user_role);
            // $returnValue['url'] = (Session::get('last_url')=="")?'queries':Session::get('last_url');
            if(Session::get('last_url') == ""){
                $returnValue['url'] = ($LoginModel->user_role==2) ? 'customers' : 'queries';
            } else {
                $returnValue['url'] = ($LoginModel->user_role==2) ? Session::get('last_url') : 'queries';
            }
            $agent = new Agent();
            $login_user_id = Session::get('loginid');
            $dckap_device = 'Unknown device';
            if($agent->isDesktop()){
                $dckap_device = 'desktop';
            }else if($agent->isMobile()){
                $dckap_device = 'Mobile';
            }else if($agent->isTablet()){
                $dckap_device = 'Tablet';
            }
            $loginlog = new LoginLogModel;
            $loginlog->user_id = $login_user_id;
            $loginlog->user_action = 'login';
            $loginlog->action_datetime = date('Y-m-d H:i:s');
            $loginlog->logged_device = $dckap_device;
            $loginlog->logged_browser = $agent->browser();
            $loginlog->logged_os = $agent->platform();
            $loginlog->logged_ip = request()->ip();
            $loginlog->save();
        } else {
            $returnValue['error'] = 0;
            $returnValue['msg'] = 'Invalid Username or Password';
        }
        return $returnValue;   
    }

    public function logout(Request $request) {
        //login-log data save
        $agent = new Agent();
        // $logArray = array();
        $login_user_id = Session::get('loginid');
        $dckap_device = 'Unknown device';
        if($agent->isDesktop()){
            $dckap_device = 'desktop';
        }else if($agent->isMobile()){
            $dckap_device = 'Mobile';
        }else if($agent->isTablet()){
            $dckap_device = 'Tablet';
        }
        $log = new LoginLogModel;
        $log->user_id = $login_user_id;
        $log->user_action = 'logout';
        $log->action_datetime = date('Y-m-d H:i:s');
        $log->logged_device = $dckap_device;
        $log->logged_browser = $agent->browser();
        $log->logged_os = $agent->platform();
        $log->logged_ip = request()->ip();
        $log->save();
        Session::flush();
        return redirect('/');
    }

    public function checksession(Request $request){
        if($request->session()->has('loginuser')) {
            $returnValue = 0;
        } else {
            $returnValue = 1;
        }
        return $returnValue;
    }
}
