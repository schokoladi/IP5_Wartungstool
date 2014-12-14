<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Eloquent::unguard();

        $this->call('KundenTableSeeder');
        $this->command->info('Kunden table seeded!');

        $this->call('WaehrungenTableSeeder');
        $this->command->info('Waehrungen table seeded!');

        $this->call('KontaktpersonenTableSeeder');
        $this->command->info('Kontaktpersonen table seeded!');

	}

}