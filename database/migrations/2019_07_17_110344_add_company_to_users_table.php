<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyToUsersTable extends Migration
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
	
		Schema::table('users', function($table) {
		$table->integer('company_id')->unsigned()->nullable()->after('status');		
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
        //
    }
}
