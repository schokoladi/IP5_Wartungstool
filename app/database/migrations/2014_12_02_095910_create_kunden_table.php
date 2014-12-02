<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKundenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Kunden', function(Blueprint $table)
		{
            // Primärschlüssel
            $table->increments('ID');

            $table->string('Name');
            $table->string('Strasse');
            $table->string('Nr');
            $table->string('PLZ');
            $table->string('Ort');
            $table->string('E-Mail');
            $table->string('Telefon');

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
		Schema::drop('Kunden');
	}

}
