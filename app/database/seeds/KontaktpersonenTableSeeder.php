<?php

class KontaktpersonenTableSeeder extends Seeder {

    public function run()
    {
        // Werte löschen
        DB::table('Kontaktpersonen')->delete();
        DB::table('Kontaktpersonen')->insert(
            [
                'Name' => 'Jossen',
                'Vorname' => 'Daniel',
                'Rolle' => 'CEO',
                'Typ' => 'Mitarbeiter',
                'Kunden_ID' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );
    }

}