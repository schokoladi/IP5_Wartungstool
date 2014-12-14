<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaktpersonenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Kontaktpersonen', function(Blueprint $table)
		{
            $table->increments('ID');
            $table->string('Name');
            $table->string('Vorname');
            $table->string('Rolle')->nullable();
            $table->string('Typ')->nullable();

            // unsigned ist notwendig bei Fremdschlüsseln!
            $table->integer('Kunden_ID')->unsigned();
            $table->foreign('Kunden_ID')->references('ID')->on('Kunden');

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
		Schema::drop('Kontaktpersonen');
	}

}
