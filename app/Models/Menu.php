<?php
namespace App\Models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

use App\Models\Privilege;

/**
 * Description of Menu
 *
 * @author thoma
 */
class Menu extends Model {
      use NodeTrait;

      // Type
      const TYPE_PARENT_MENU          = 0;
      const TYPE_PATH                 = 1;
      const TYPE_ROUTE                = 2;
      const TYPE_CONTROLLERS_AND_MENU = 3;
      const TYPE_MODULE               = 4;
      const TYPE_STATISTIC            = 5;
      const TYPE_URL                  = 6;
      
      // Position
      const POSITION_SIDEMENU         = 1;
      const POSITION_TOPMENU          = 2;
      
      /**
       * the datatable
       *
       * @var array
       */
      public $table = 'menus';
      
      /**
       * load the menu items for the sidebar
       * 
       * @return array | null
       */
      public static function getSideMenuItems() {
             // get menu from database
             return Menu::where('privilege_id', Privilege::getCurrentID())          
                          ->where('position', Menu::POSITION_SIDEMENU)
                          ->whereNotNull('published_at')
                          ->orderby('_lft', 'asc')
                          ->get();
      }
      
      /**
       * get the sidemenu as tree
       * 
       * @return array | null
       */
      public static function getSideMenu() {
            $menues = Menu::getSideMenuItems();
//             $createMenu = function ( $tree = array(array('name'=>'','depth'=>'', 'lft'=>'','rgt'=>''))){
            $current_depth  = 0;
            $counter        = 0;
            $result         = ''; // '<ul>';
            $start          = true;

            foreach($menues as $menuitem) {
                $depth      = $menuitem['depth'];
                $name       = $menuitem['name'];
                $is_node    = $menuitem['_rgt'] - $menuitem['_lft'] > 1;
                $current    = (url()->current() == $menuitem['path']) ? ' class="active"' : ''; 

                if ($depth == $current_depth){
                    if($counter > 0) $result .= '</li>';
                }
                elseif ($depth > $current_depth){
                    if ( $start ) {
                        $class = 'sidebar-menu';
                        $start = !$start;
                    } else {
                        $class = 'treeview-menu';
                    }

                    $result .= '<ul class="' . $class . '">';
                    $current_depth = $current_depth + ($depth - $current_depth);
                }
                elseif($depth < $current_depth){
                    $result .= str_repeat('</li></ul>',$current_depth - $depth).'</li>';
                    $current_depth = $current_depth - ($current_depth - $depth);
                }

                $result .= '<li' . $current .  '><a href="';
                $result .= ($is_node) ? '#' : $menuitem['path'];
                $result .= '"><i class="' . ((empty($menuitem['css'])) ? "fa fa-circle-o" : $menuitem['css']) . '"></i>';
                $result .= ($is_node || $depth == 1) ? '<span>' . $name . '</span>' : $name; 
                $result .= ($is_node) ? '<i class="fa fa-angle-right"></i>' : ''; 
                $result .= '</a>';

                ++$counter;
            }

            return $result . str_repeat('</li></ul>',$depth); 
      }
}
