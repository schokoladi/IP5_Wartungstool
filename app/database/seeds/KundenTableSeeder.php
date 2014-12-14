<?php

class KundenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Kunden')->delete();
        DB::table('Kunden')->insert([
            [
                'Name' => '--- select ---',
                'Strasse' => '--- select ---',
                'Nr' => '--- select ---',
                'PLZ' => '--- select ---',
                'Ort' => '--- select ---',
                'E-Mail' => '--- select ---',
                'Telefon' => '--- select ---',
                'order' => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Name' => 'Amanox Solutions',
                'Strasse' => 'Falkenplatz',
                'Nr' => '11',
                'PLZ' => '3012',
                'Ort' => 'Bern',
                'E-Mail' => 'info@amanox.ch',
                'Telefon' => '031 320 10 80',
                'order' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Name' => 'Google',
                'Strasse' => 'Brandschenkestrasse',
                'Nr' => '110',
                'PLZ' => '8002',
                'Ort' => 'Zürich',
                'E-Mail' => 'info@google.ch',
                'Telefon' => '044 668 18 00',
                'order' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Name' => 'FHNW',
                'Strasse' => 'Bahnhofstrasse',
                'Nr' => '6',
                'PLZ' => '5210',
                'Ort' => 'Windisch',
                'E-Mail' => 'info@fhnw.ch',
                'Telefon' => '056 462 44 11',
                'order' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ]);
    }

}