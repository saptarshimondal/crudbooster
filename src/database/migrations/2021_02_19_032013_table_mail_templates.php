<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMailTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cb_mail_templates');
        Schema::enableForeignKeyConstraints();
        
        Schema::create('cb_mail_templates', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('from_name');
            $table->string('from_email');
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->string('subject');
            $table->text('content');
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
        Schema::dropIfExists('cb_mail_templates');
        Schema::enableForeignKeyConstraints();
    }
}
