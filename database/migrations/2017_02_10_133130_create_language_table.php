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

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
         Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable()->index();
            $table->integer('updated_by')->unsigned()->nullable()->index();
            $table->integer('deleted_by')->unsigned()->nullable()->index();
            $table->dateTime('deleted_at')->nullable()->index();
            $table->integer('published_by')->unsigned()->nullable()->index();
            $table->dateTime('published_at')->nullable()->index();
            $table->integer('ordering')->unsigned()->default(1)->index();
            $table->boolean('default')->unsigned()->default(false)->index();
            $table->string('name',255);
            $table->string('iso639', 5)->index();
            $table->string('iso3166', 5);
            $table->string('flag')->nullable();
            $table->string('short_date');
            $table->string('long_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
           Schema::dropIfExists('languages');
    }
}
