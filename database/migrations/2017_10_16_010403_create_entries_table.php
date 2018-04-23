<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('firstname');
	        $table->string('lastname');
	        $table->string('email');
	        $table->string('phone')->nullable();
	        $table->string('address');
	        $table->string('address2')->nullable();
	        $table->string('city');
	        $table->string('province');
	        $table->string('postalcode');
	        $table->string('imei');
	        $table->string('purchased');
	        $table->string('receipt');
	        $table->string('language')->default('en');
	        $table->boolean('emailed')->default(FALSE);
	        $table->boolean('validated')->default(FALSE);
	        $table->boolean('shipped')->default(FALSE);
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
        Schema::dropIfExists('entries');
    }
}
