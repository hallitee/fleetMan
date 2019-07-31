<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
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
	
	Schema::create('company', function(Blueprint $table){
		 
		 $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->string('gmName');
			$table->string('gmEmail')->nullable();
            $table->string('lat')->nullable();
			$table->string('long')->nullable();
            $table->string('address')->nullable();			
			$table->boolean('status')->nullable()->default(0);	
			$table->integer('fleet_id')->unsigned()->nullable();		
			$table->foreign('fleet_id')->references('id')->on('fleet');	
				
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
		    Schema::dropIfExists('company');
    }
}
