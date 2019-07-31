<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenewalMasterTable extends Migration
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
	
	 Schema::create('renewalMaster', function (Blueprint $table) {
            
		$table->increments('id');
            $table->string('name');
			 $table->string('desc')->nullable();
            $table->string('issuer')->nullable();
			$table->string('issuerAddress')->nullable();
            $table->string('contactName')->nullable();
			$table->string('contactNum')->nullable();
            $table->string('frequency')->nullable();
			$table->string('validity')->nullable();
            $table->string('valid_uom')->nullable();	
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
    }
}
