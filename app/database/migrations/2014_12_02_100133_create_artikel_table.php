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
            $table->text('Beschreibung')->nullable();
            // Preise mit maxmal 10 Stellen, davon 2 Nachkomma
            $table->decimal('Einkaufspreis', 10, 2);
            $table->decimal('Verkaufspreis', 10, 2);

            // unsigned ist notwendig bei Fremdschlüsseln!
            $table->integer('EK_Waehrungen_ID')->unsigned();
            $table->foreign('EK_Waehrungen_ID')->references('ID')->on('Waehrungen');
            $table->integer('VK_Waehrungen_ID')->unsigned();
            $table->foreign('VK_Waehrungen_ID')->references('ID')->on('Waehrungen');

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
