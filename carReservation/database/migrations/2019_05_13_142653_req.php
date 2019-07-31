<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Req extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		
		 Schema::create('req', function (Blueprint $table) {
            $table->increments('id');
			$table->string('reqName');
			$table->string('reqComp');
			$table->date('reqDate');
			$table->time('reqTime');
			$table->string('reqDept');
			$table->string('location');
			$table->string('reqDest');
			$table->integer('reqPass')->nullable();
			$table->boolean('passLoad')->nullable();
			$table->string('purpose');
			$table->string('reqStatus')->nullable();
			$table->string('reqCode')->nullable();
			$table->string('reqEmail')->nullable();
			
			$table->dateTime('hodAppr')->nullable();
			$table->dateTime('hodViewReq')->nullable();
			$table->string('hodName')->nullable();
			$table->dateTime('gaViewReq')->nullable();
			$table->dateTime('gaAppReq')->nullable();
			$table->string('gaName')->nullable();
			$table->text('hodRemark')->nullable();
			$table->text('gaRemark')->nullable();
			$table->text('retRemark')->nullable();
			$table->dateTime('retTime')->nullable();
			$table->string('retStatus')->nullable();
			$table->string('retAck')->nullable();

			$table->text('drvRemark')->nullable();


			$table->integer('hod_id')->unsigned()->index()->nullable();
			$table->integer('driver_id')->unsigned()->index()->nullable();
			$table->integer('car_id')->unsigned()->index()->nullable();		
		
			$table->foreign('hod_id')->references('id')->on('approvers')->onDelete('cascade');	
			$table->foreign('driver_id')->references('id')->on('drivers');
			$table->foreign('car_id')->references('id')->on('carmasters');					
							
			
			
			
	
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
        //
    }
}
