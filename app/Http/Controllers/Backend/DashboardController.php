<?php
namespace App\Http\Controllers\Backend;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Models\Privilege;
use App\User;

/**
 * Description of DashboardController
 *
 * @author thoma
 */
class DashboardController extends Controller {
      /**
       * show the dashboard
       */
      public function getDashboard() {
             if (!Auth::check()) {          
                return view('backend.auth.login');
             }

/*        
             $menu = Menu::getSideMenu();
             
             // exists menu and url of the menu then redirect to the url
             if($menu && $menu->url) {
                return redirect($dashboard->url);
             }
             
             $data = array();			
	     $data['page_title']       = Dashboard::getTitle();		
             $data['page_menu']        = Route::getCurrentRoute()->getActionName();
             
	     return $this->show('_default',$data);             
*/             
             return view('backend._default');
      }
      
      /**
       * login to the dashboard
       */
      public function postLogin() {
             $validator = Validator::make(Request::all(),			
                [
                    'email'=>'required|email|exists:users,email',
                    'password'=>'required'			
                ]
	     );
             
             if ($validator->fails()) {
                // Validation error
		$message = $validator->errors()->all();
		return redirect()->back()->withErrors($validator);
	     }
             
             $email 	= Request::input("email");
	     $password 	= Request::input("password");
             
	     $user 	= User::where("email",$email)->first();
                
             if(!\Hash::check($password,$user->password)) {
                return redirect()->route('login')->with('message', trans('yap.password_wrong'));  
             }
      
             // get privileges and role
             $priv  = DB::table("privileges")->where("id", $user->privilege_id)->first();
             $roles = DB::table('privilege_roles')
                            ->where('privilege_id',$user->privilege_id)
                            ->join('modules','modules.id','=','module_id')
                            ->select('modules.name','modules.path','is_visible','is_create','is_read','is_edit','is_delete')
                            ->get();
             
             var_dump($roles);
             dd();
             
             // get photo
             $photo = ($user->photo) ? asset($user->photo) : url('/images/photo') . 'default';            
             
             // set session user, priviliges, role and appname
             Session::put("sitename",               Config::get('yap.sitename'));
	     Session::put('user_id',                $user->id);
             Session::put('user_photo',             $photo);
	     Session::put('user_name',              $user->firstname . ' ' . $user->lastname);
	     Session::put('user_loged_in_as',       $priv->name);
	     Session::put('email',                  $user->email);	
                           
	     Session::put('user_is_superadmin',     $priv->is_superadmin);
	     Session::put('user_privileges_roles',  $roles);

             Privilege::setCurrentID($user->privilege_id);
             Privilege::setCurrentName($priv->name);
             
             Session::put('user_lock',              0);
//             Session::put('theme_color',            $priv->theme_color);
             

             // Melde Benutzer an
             Auth::login($user);
             //			CRUDBooster::insertLog(trans("crudbooster.log_login",['email'=>$users->email,'ip'=>Request::server('REMOTE_ADDR')]));		
             //           $cb_hook_session = new \App\Http\Controllers\CBHook;
             //			$cb_hook_session->afterLogin();

//	     return redirect()->route('AdminControllerGetIndex'); 
             return redirect()->route('showDashboard');
      }
      
      /**
       * logout from the dashboard
       */
      public function getLogout() {
             Auth::logout();
             Session::flush();            
             
             return redirect()->route('showDashboard');
      }
      
}
