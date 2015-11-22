<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function(Blueprint $table)
		{
			
			$table->string('id', 50)->unique();
			$table->string('title')->unique();
                        $table->string('description', 100)->unique();
                        
			$table->string('thumb', 200);
			$table->string('google_user_id', 40);
			
                        $table->timestamps();
			$table->rememberToken();
                        $table->foreign('google_user_id')
						->references('id')
						->on('google_users')
						->onDelete('restrict')
						->onUpdate('restrict');
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
        Schema::drop('channels');
        //
    }
}
