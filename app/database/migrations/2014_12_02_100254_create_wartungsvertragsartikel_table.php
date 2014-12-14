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
            $table->increments('ID');
            $table->string('Titel');
            $table->string('Seriennummer');
            $table->text('Beschreibung')->nullable();
            $table->date('Kaufdatum')->nullable();
            $table->boolean('Verrechnet')->default(FALSE);

            // unsigned ist notwendig bei Fremdschlüsseln!
            $table->integer('Wartungsvertraege_ID')->unsigned();
            $table->foreign('Wartungsvertraege_ID')->references('ID')->on('Wartungsvertraege');

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
