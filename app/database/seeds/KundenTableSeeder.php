<?php

class KundenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Kunden')->delete();
        DB::table('Kunden')->insert([
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
        ]);
    }

}