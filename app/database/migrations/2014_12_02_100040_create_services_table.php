<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Services', function(Blueprint $table)
		{
            $table->increments('ID');
            $table->string('Artikelnummer');
            $table->string('Titel');
            $table->text('Beschreibung');
            $table->date('Kaufdatum'); // Noch nicht sicher, eventuell anderer Typ
            $table->decimal('Preis', 8, 2); // Preis mit maximal 8 Stellen, davon 2 Nachkomma
            $table->boolean('Verrechnet');

            // unsigned ist notwendig bei Fremdschlüsseln!
            $table->integer('Wartungsvertraege_ID')->unsigned();
            $table->foreign('Wartungsvertraege_ID')->references('ID')->on('Wartungsvertraege');

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
		Schema::drop('Services');
	}

}
