<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('money');
            $table->string('status');
            $table->boolean('uflag')->default(true);
            $table->boolean('mflag')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applys');
    }
}
