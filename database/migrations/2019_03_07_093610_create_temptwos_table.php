<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemptwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temptwos', function (Blueprint $table) {
            $table->increments('id');
			$table->string("first_name");
			$table->string("last_name");
			$table->integer("age");
			$table->text("comment");
			$table->string("dropdown");
			$table->text("explaination");
			$table->string("gender");
			$table->string("associated_roles");
			$table->dateTime("dataone");
			$table->dateTime("datetwo");
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
        Schema::dropIfExists('temptwos');
    }
}
