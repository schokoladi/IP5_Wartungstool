<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWartungsvertraegeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Wartungsvertraege', function(Blueprint $table)
		{
            $table->increments('ID');
            $table->string('Vertragsnummer');
            $table->string('Titel');
            $table->text('Beschreibung');
            $table->boolean('Status');

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
		Schema::drop('Wartungsvertraege');
	}

}
