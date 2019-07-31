<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenewalTable extends Migration
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
	
	 Schema::create('renewal', function (Blueprint $table) {
            
			$table->increments('id');
			$table->string('lastSub')->nullable();
            $table->string('nextSub')->nullable();
            $table->string('notType')->nullable();
			$table->string('notDate')->nullable();
            $table->string('notFreq')->nullable();
			$table->string('paymentDate')->nullable();
            $table->string('paidBy')->nullable();	
            $table->string('notSent')->nullable();	
			$table->string('notStatus')->nullable();	
			$table->boolean('renewalCost')->default(0);				
			$table->integer('fleet_id')->unsigned()->nullable();		
			$table->foreign('fleet_id')->references('id')->on('fleet');	
			$table->integer('renewal_id')->unsigned()->nullable();		
			$table->foreign('renewal_id')->references('id')->on('renewalMaster');			
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
				    Schema::dropIfExists('renewal');

    }
}
