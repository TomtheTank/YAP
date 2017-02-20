<?php
namespace App\Models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
//use \App\Library\Database\Eloquent\AModel;
use App\Model\Privilege;

/**
 * Description of Menu
 *
 * @author thoma
 */
class Menu extends Model {
      const TYPE_PATH                 = 1;
      const TYPE_ROUTE                = 2;
      const TYPE_CONTROLLERS_AND_MENU = 3;
      const TYPE_MODULE               = 4;
      const TYPE_STATISTIC            = 5;
      const TYPE_URL                  = 6;
      
      /**
       * the datatable
       *
       * @var array
       */
      public $table = 'menus';
      
      /**
       * get the menu for the sidebar
       * 
       * @return array | null
       */
      public static function getSideMenu() {
             // get menu from database
             $menu = Menu::where('privilege_id', Privilege::getCurrentID())          
                         ->where('is_dashboard', 1)
                         ->whereNotNull('published_at')
                         ->first();
             
             // replace url with real url
             if ( !is_null($menu) ) {
                switch ($menu->type) {
                       case Menu::TYPE_ROUTE:
                           $url = route($menu->path);
                           break;

                       case Menu::TYPE_CONTROLLERS_AND_MENU:
                            $url = action($menu->path);
                            break;

                       case Menu::TYPE_MODULE:
                       case Menu::TYPE_STATISTIC:
                           $url = ''; // self::adminPath($menu->path);
                           break;	  			

                       case Menu::TYPE_URL:
                       default:
                           $url = $menu->path;
                           break;
                }
                
                @$menu->url = $url;  
             }

             return $menu;
      }
}
