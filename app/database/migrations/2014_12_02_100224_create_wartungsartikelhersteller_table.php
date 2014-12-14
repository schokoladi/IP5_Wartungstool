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
            $table->text('Beschreibung')->nullable();

            // Preis mit maximal 10 Stellen, davon 2 Nachkomma
            $table->decimal('Einkaufspreis', 10, 2);
            $table->decimal('Verkaufspreis', 10, 2);

            $table->integer('EK_Waehrungen_ID')->unsigned();
            $table->foreign('EK_Waehrungen_ID')->references('ID')->on('Waehrungen');
            $table->integer('VK_Waehrungen_ID')->unsigned();
            $table->foreign('VK_Waehrungen_ID')->references('ID')->on('Waehrungen');

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
