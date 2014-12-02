<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWartungsvertragsartikelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Wartungsvertragsartikel', function(Blueprint $table)
		{
            $table->increments('ID'); // Promary Key
            $table->string('Titel');
            $table->string('Seriennummer');
            $table->text('Beschreibung');
            $table->date('Kaufdatum');
            $table->boolean('Verrechnet');
            $table->decimal('Preis', 6, 2); // Preis mit maximal 6 Stellen, davon 2 Nachkomma

            // unsigned ist notwendig bei Fremdschlüsseln!
            $table->integer('Wartungsvertraege_ID')->unsigned();
            $table->foreign('Wartungsvertraege_ID')->references('ID')->on('Wartungsvertraege');
            //$table->foreign('Wartungsvertraege_Kunden_ID')->references('ID')->on('Kunden');
            $table->integer('Artikel_ID')->unsigned();
            $table->foreign('Artikel_ID')->references('ID')->on('Artikel');
            $table->integer('Wartungsartikelhersteller_ID')->unsigned();
            $table->foreign('Wartungsartikelhersteller_ID')->references('ID')->on('Wartungsartikelhersteller');

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
		Schema::drop('Wartungsvertragsartikel');
	}

}
