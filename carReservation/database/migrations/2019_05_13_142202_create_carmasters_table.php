<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmasters', function (Blueprint $table) {
            $table->increments('id');
			$table->string('make');
			$table->string('model');
			$table->string('regNo');
			$table->string('type')->nullable();
			$table->string('purpose')->nullable();
			$table->string('opStatus')->nullable();
			$table->integer('opStatusCode')->nullable();
			$table->string('assDriver')->nullable();
			$table->string('cost')->nullable();
			$table->boolean('status')->default(1);
			$table->date('regDate')->nullable();
			$table->date('insuranceDue')->nullable();
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
        Schema::dropIfExists('carmasters');
    }
}
