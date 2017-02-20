<?php
namespace App\Model;
/**
 * @package     JAP.Platform
 * @subpackage  Model
 *
 * @copyright   Copyright (C) 2015 - 2017 Abado. All rights reserved.
 */
use Illuminate\Database\Eloquent\Model;
use App\Library\Database\Eloquent\AModel;

/**
 * Currency model
 *
 * @since       1.0
 */
class Currency extends AModel {
      /**
       * the datatable
       *
       * @var array
       */
      public $table = 'currencies';
      
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'deleted_by', 'deleted_at', 'published_by', 'published_at', 'name', 
          'iso', 'num_iso', 'exchange_rate', 'symbol', 'sym_left', 'distance', 
          'decimals', 'dec_point', 'thousands_sep'
      ];

      /**
       * The rules.
       *
       * @var array
       */
      public static $rules = [
                    'name'          => 'required|string|max:255',
                    'iso'           => 'required|string|max:5',
                    'num_iso'       => 'required|string|max:5',
                    'exchange_rate' => "required|regex:/^\d*(\.\d{1,4})?$/",
                    'symbol'        => 'required|string|max:5',
                    'distance'      => 'required|integer|min:1',
                    'dec_point'     => 'required|string|max:1',
                    'thousands_sep' => 'required|string|max:1',
      ];
      
      /**
       * Fill the model with an array of attributes.
       *
       * @param  array  $attributes
       * @return $this
       *
       * @throws \Illuminate\Database\Eloquent\MassAssignmentException
       */
      public function fill(array $attributes) {
             if (isset($attributes['deleted'])) {
                $attributes['deleted_by'] = Auth::id();
                $attributes['deleted_at'] = date("Y-m-d H:i:s"); 
                
                unset($attributes['deleted']);
             } else {
                $attributes['deleted_by'] = null;
                $attributes['deleted_at'] = null; 
             }
             
             if (isset($attributes['published'])) {
                $attributes['published_by'] = Auth::id();
                $attributes['published_at'] = date("Y-m-d H:i:s"); 
                
                unset($attributes['published']);
             } else {
                $attributes['published_by'] = null;
                $attributes['published_at'] = null; 
             }

             return parent::fill($attributes);
      }
}
