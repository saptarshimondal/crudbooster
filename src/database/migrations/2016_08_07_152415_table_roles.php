<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TableRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cb_roles');
        Schema::enableForeignKeyConstraints();
        
        Schema::create('cb_roles', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name');
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
        Schema::dropIfExists('cb_roles');
        Schema::enableForeignKeyConstraints();
    }
}
