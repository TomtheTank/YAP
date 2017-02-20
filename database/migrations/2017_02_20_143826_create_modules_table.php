<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('modules', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->integer('created_by')->unsigned()->nullable()->index();
                $table->integer('updated_by')->unsigned()->nullable()->index();
                $table->integer('deleted_by')->unsigned()->nullable()->index();
                $table->dateTime('deleted_at')->nullable()->index();
                $table->integer('published_by')->unsigned()->nullable()->index();
                $table->dateTime('published_at')->nullable()->index();
                $table->string('name');
                $table->string('icon')->nullable();
                $table->string('path');
                $table->string('table_name')->nullable();
                $table->string('controller');
                $table->boolean('is_protected')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
