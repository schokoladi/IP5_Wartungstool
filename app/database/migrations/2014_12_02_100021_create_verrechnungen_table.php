<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerrechnungenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Verrechnungen', function(Blueprint $table)
		{
            $table->increments('ID');
            $table->string('Rechnungsnummer');
            $table->date('Datum');
            $table->text('Bemerkungen');

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
		Schema::drop('Verrechnungen');
	}

}
