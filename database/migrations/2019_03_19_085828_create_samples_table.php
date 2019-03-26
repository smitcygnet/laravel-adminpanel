<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->increments('id');
			$table->string("first_name");
			$table->decimal("amountt",8,2);
			$table->enum("level",['easy','hard']);
			$table->text("comment");
			$table->text("explaination");
			$table->string("gender");
			$table->string("associated_roles");
			$table->dateTime("dateone");
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
        Schema::dropIfExists('samples');
    }
}
