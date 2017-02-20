<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
            Schema::create('privileges', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->integer('created_by')->unsigned()->nullable()->index();
                $table->integer('updated_by')->unsigned()->nullable()->index();
                $table->integer('deleted_by')->unsigned()->nullable()->index();
                $table->dateTime('deleted_at')->nullable()->index();
                $table->string('name');
                $table->tinyInteger('is_superadmin');
                $table->string('theme_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
            Schema::dropIfExists('privileges');
    }
}
