<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TableModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cb_modules');
        Schema::enableForeignKeyConstraints();
        
        Schema::create('cb_modules', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name');
            $table->string("icon");
            $table->string("table_name");
            $table->string("controller");
            $table->longText("last_column_build")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cb_modules');
        Schema::enableForeignKeyConstraints();
    }
}
