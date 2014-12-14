<?php

class WaehrungenTableSeeder extends Seeder {

    public function run()
    {
        // Werte löschen
        DB::table('Waehrungen')->delete();
        DB::table('Waehrungen')->insert([
            [
                'Waehrung' => 'CHF',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Waehrung' => 'EUR',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Waehrung' => 'USD',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Waehrung' => 'GBP',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Waehrung' => 'CNY',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Waehrung' => 'JPY',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ]);
    }

}