<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelRecordTable extends Migration
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
		Schema::create('fuelRecord', function (Blueprint $table) {		
			$table->increments('id');
            $table->string('fillingStation');
			 $table->string('meterReading')->nullable();
            $table->string('pumpedLitres')->nullable();
			$table->string('fillType')->nullable();
            $table->string('pricePerLitre')->nullable();
			$table->string('lastMilage')->nullable();
            $table->string('fuelEconomy')->nullable();
			$table->string('fuelType')->nullable();
            $table->string('recSource')->nullable();	
			$table->boolean('status')->default(0);	
			$table->text('remarks')->nullable();				
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
		    Schema::dropIfExists('fuelRecord');
    }
}
