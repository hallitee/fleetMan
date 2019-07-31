<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceTable extends Migration
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
			Schema::create('maintenance', function (Blueprint $table) {		
			$table->increments('id');
            $table->string('type');
			 $table->string('desc')->nullable();
            $table->string('meterReading')->nullable();
			$table->string('vendorName')->nullable();
            $table->string('vendorPhone')->nullable();
			$table->string('cost')->nullable();
            $table->text('partsChanged')->nullable();
			$table->string('paymentType')->nullable();
            $table->string('payRef')->nullable();	
			$table->boolean('status')->default(0);	
			$table->text('remarks')->nullable();	
			$table->dateTime('start')->nullable();	
			$table->dateTime('end')->nullable();			
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
		
		Schema::dropIfExists('maintenance');
    }
}
