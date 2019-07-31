<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraTable extends Migration
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
	
	 Schema::create('extra', function (Blueprint $table) {
            
		$table->increments('id');
            $table->string('name');
			 $table->string('model')->nullable();
            $table->string('desc')->nullable();
            $table->string('size')->nullable();
			$table->string('capacity')->nullable();
            $table->string('colour')->nullable();
			$table->string('faultStat')->nullable();
            $table->string('cap_uom')->nullable();	
            $table->string('size_uom')->nullable();	
			$table->boolean('status')->default(0);				
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
		    Schema::dropIfExists('extra');
    }
}
