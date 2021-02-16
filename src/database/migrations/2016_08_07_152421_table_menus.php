<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TableMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cb_menus', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name');
            $table->string("icon")->nullable();
            $table->string("path")->nullable();
            $table->string("type");
            $table->integer("sort_number")->default(0);
            $table->unsignedBigInteger("cb_modules_id")->nullable();
            $table->unsignedBigInteger("parent_cb_menus_id")->nullable();

            $table->foreign('cb_modules_id')->references('id')->on('cb_modules')->onDelete('set null');
            $table->foreign('parent_cb_menus_id')->references('id')->on('cb_menus')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cb_menus', function (Blueprint $table) {
            $table->dropForeign(['cb_modules_id']);
            $table->dropForeign(['parent_cb_menus_id']);
        });
        Schema::dropIfExists('cb_menus');
    }
}
