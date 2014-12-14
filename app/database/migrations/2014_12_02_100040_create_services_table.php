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
            $table->text('Beschreibung')->nullable();

            // Noch nicht sicher, eventuell anderer Typ
            $table->date('Kaufdatum')->nullable();

            // Preis mit maximal 10 Stellen, davon 2 Nachkomma
            $table->decimal('Preis', 10, 2);

            $table->integer('Waehrungen_ID')->unsigned();
            $table->foreign('Waehrungen_ID')->references('ID')->on('Waehrungen');

            $table->boolean('Verrechnet')->default(FALSE);

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
