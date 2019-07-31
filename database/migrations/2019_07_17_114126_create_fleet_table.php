<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::disableForeignKeyConstraints();
	
	Schema::create('fleet', function(Blueprint $table){
		 
			$table->increments('id');
            $table->string('model');
            $table->string('type');
            $table->string('regDate');
			$table->string('regNo')->nullable();
            $table->string('make')->nullable();
			$table->string('fleetClass')->nullable();
            $table->string('cost')->nullable();	
            $table->string('vin')->nullable();
			$table->string('chasis')->nullable();
            $table->string('engineNo')->nullable();
			$table->string('PIC')->nullable();
            $table->string('fleetStatus')->nullable();		
			$table->boolean('status')->default(0);				
            $table->timestamps();
		
    });		
		
		
		Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		    Schema::dropIfExists('fleet');
    }
}
