<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToFleetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::disableForeignKeyConstraints();	
        Schema::table('fleet', function (Blueprint $table) {
            //
			$table->string('picEmail')->nullable()->after('PIC');
            $table->boolean('statusCar')->nullable();
			$table->string('dept')->nullable();
            $table->string('company')->nullable();
			$table->integer('company_id')->unsigned()->nullable();		
			$table->foreign('company_id')->references('id')->on('company');	
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
        Schema::table('fleet', function (Blueprint $table) {
            //
        });
    }
}
