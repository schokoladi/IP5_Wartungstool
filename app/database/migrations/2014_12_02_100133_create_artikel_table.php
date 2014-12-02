<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Artikel', function(Blueprint $table)
		{
            $table->increments('ID');
            $table->string('Artikelnummer');
            $table->string('Name');
            $table->text('Beschreibung');
            $table->decimal('Einkaufspreis', 8, 2); // Preis mit maxmal 8 Stellen, davon 2 Nachkomma
            $table->decimal('Verkaufspreis', 8, 2);

            // unsigned ist notwendig bei Fremdschlüsseln!
            $table->integer('Artikelhersteller_ID')->unsigned();
            $table->foreign('Artikelhersteller_ID')->references('ID')->on('Artikelhersteller');

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
		Schema::drop('Artikel');
	}

}
