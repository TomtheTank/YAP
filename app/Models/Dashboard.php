<?php
namespace App\Model;
/**
 * @package     JAP.Platform
 * @subpackage  Model
 *
 * @copyright   Copyright (C) 2015 - 2017 Abado. All rights reserved.
 */
use App\Library\Config\AConfig;

/**
 * Description of Dashboard
 *
 * @author thoma
 */
class Dashboard {
      /**
       * get the title of the dashboard
       */
      public static function getTitle() {
             return AConfig::trans('dashboard');
      }
}
