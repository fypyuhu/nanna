<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GoogleUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_users', function(Blueprint $table)
		{
                        $table->string('id',40)->unique();
                    	$table->string('name');
                        $table->string('given_name');
                        $table->string('family_name');
                        $table->string('link');
                        $table->string('picture');
                        $table->string('gender');
                        $table->string('locale');
                        $table->string('refreshToken')->nullable();
			
			
                      
			
                        $table->timestamps();
			$table->rememberToken();			
		});
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('google_users');
        //
    }
}
