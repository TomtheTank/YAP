<?php
/**
 * @package     JAP.Platform
 * @subpackage  Datatable
 *
 * @copyright   Copyright (C) 2015-2017 Abado. All rights reserved.
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable()->index();
            $table->integer('updated_by')->unsigned()->nullable()->index();
            $table->integer('deleted_by')->unsigned()->nullable()->index();
            $table->dateTime('deleted_at')->nullable()->index();
            $table->integer('published_by')->unsigned()->nullable()->index();
            $table->dateTime('published_at')->nullable()->index();
        });
        
        Schema::create('region_names', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->unsigned();            
            $table->string('locale')->index();
            $table->string('name');
            
            $table->unique(['region_id','locale']);
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
           Schema::dropIfExists('region_names');
           Schema::dropIfExists('regions');
    }
}
