<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ModifyUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('cb_roles_id');
            $table->ipAddress("ip_address")->nullable();
            $table->string("user_agent")->nullable();
            $table->timestamp("login_at")->nullable();

            $table->foreign('cb_roles_id')->references('id')->on('cb_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['cb_roles_id']);
            $table->dropColumn(["photo","cb_roles_id","ip_address","user_agent","login_at"]);
        });
    }
}
