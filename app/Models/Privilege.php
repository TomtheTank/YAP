<?php
namespace App\Models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Support\Facades\Session;

/**
 * Description of Privilege
 *
 * @author thoma
 */
class Privilege {
      const SESSION_NAME_ID    = 'user_privileges';
      const SESSION_NAME_NAME  = 'user_privileges_name';
              
      /**
       * get the current privilege id
       * 
       * @param integer $id
       * @return void
       */
      public static function setCurrentID($id) {
             Session::put(Privilege::SESSION_NAME_ID, $id);
      }
    
      /**
       * get the current privilege id
       * 
       * @return integer
       */
      public static function getCurrentID() {
             return Session::get(Privilege::SESSION_NAME_ID);
      }

      /**
       * set the current privilege name
       * 
       * @param string $name
       * @return 
       */
      public static function setCurrentName($name) {
             Session::put(Privilege::SESSION_NAME_NAME, $name);
      }
      
      /**
       * get the current privilege name
       * 
       * @return string
       */
      public static function getCurrentName($name) {
             return Session::put(Privilege::SESSION_NAME_NAME);
      }
                   			

    //put your code here
}
