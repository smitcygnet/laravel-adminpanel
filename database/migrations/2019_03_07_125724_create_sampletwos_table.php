<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampletwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampletwos', function (Blueprint $table) {
            $table->increments('id');
			$table->string("last_name");
			$table->integer("age");
			$table->dateTime("datethree");
			$table->string("profile_pic");
			$table->string("profile_img");
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
        Schema::dropIfExists('sampletwos');
    }
}
