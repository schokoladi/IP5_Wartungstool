<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWartungsartikelherstellerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Wartungsartikelhersteller', function(Blueprint $table)
		{
            $table->increments('ID');
            $table->string('Name');
            $table->text('Beschreibung');
            $table->decimal('Einkaufspreis', 8, 2); // Preis mit maximal 8 Stellen, davon 2 Nachkomma
            $table->decimal('Verkaufspreis', 8, 2);
            $table->integer('Dauer'); // Anzahl Monate

            // unsigned ist notwendig bei Fremdschlüsseln!
            $table->integer('Artikel_ID')->unsigned();
            $table->foreign('Artikel_ID')->references('ID')->on('Artikel');

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
		Schema::drop('Wartungsartikelhersteller');
	}

}
