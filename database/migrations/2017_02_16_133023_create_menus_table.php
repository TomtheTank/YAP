<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Kalnoy\Nestedset\NestedSet;

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
                NestedSet::columns($table);
                $table->integer('privilege_id')->index();
                $table->string('name');
                $table->integer('type')->nullable()->default(Menu::TYPE_URL);
                $table->integer('position')->default(Menu::POSITION_TOPMENU)->index();
                $table->string('path')->nullable();
                $table->string('css');
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
