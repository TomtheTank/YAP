<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
           Schema::create('privilege_roles', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->integer('created_by')->unsigned()->nullable()->index();
                $table->integer('updated_by')->unsigned()->nullable()->index();
                $table->integer('deleted_by')->unsigned()->nullable()->index();
                $table->dateTime('deleted_at')->nullable()->index();
                $table->boolean('is_visible')->nullable();
                $table->boolean('is_create')->nullable();
                $table->boolean('is_read')->nullable();
                $table->boolean('is_edit')->nullable();
                $table->boolean('is_delete')->nullable();
                $table->boolean('is_export')->nullable();
                $table->Integer('privilege_id')->nullable();
                $table->Integer('module_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
           Schema::dropIfExists('privilege_roles');
    }
}
