<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Menu;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
           Schema::create('menus', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->integer('created_by')->unsigned()->nullable()->index();
                $table->integer('updated_by')->unsigned()->nullable()->index();
                $table->integer('deleted_by')->unsigned()->nullable()->index();
                $table->dateTime('deleted_at')->nullable()->index();
                $table->integer('published_by')->unsigned()->nullable()->index();
                $table->dateTime('published_at')->nullable()->index();
                $table->integer('ordering')->default(1)->index();
                $table->boolean('is_dashboard')->default(false)->index();
                $table->integer('privilege_id')->index();
                $table->string('name')->nullable();
                $table->integer('type')->default();
                $table->string('path');
                $table->string('css');
                $table->string('icon');
                $table->integer('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
           Schema::dropIfExists('menus');
    }
}
