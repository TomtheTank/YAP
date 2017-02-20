<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable()->index();
            $table->integer('updated_by')->unsigned()->nullable()->index();
            $table->integer('deleted_by')->unsigned()->nullable()->index();
            $table->dateTime('deleted_at')->nullable()->index();
            $table->integer('published_by')->unsigned()->nullable()->index();
            $table->dateTime('published_at')->nullable()->index();
            $table->string('name');
            $table->string('iso', 5)->index();
            $table->string('num_iso', 5)->index();
            $table->double('exchange_rate', 15, 8)->unsigned();
            $table->string('symbol', 5);
            $table->boolean('sym_left')->unsigned()->default(false);
            $table->integer('distance')->unsigned()->default(1);
            $table->string('dec_point',1);
            $table->string('thousands_sep',1);
        });
    /*    
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('prefered_language_id')->references('id')->on('languages')->onDelete('cascade');            
        });
     */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('currencies');
    }    
}
