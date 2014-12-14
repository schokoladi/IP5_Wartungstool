<?php

class KontaktpersonenTableSeeder extends Seeder {

    public function run()
    {
        // Werte löschen
        DB::table('Kontaktpersonen')->delete();
        DB::table('Kontaktpersonen')->insert([
            [
                'Name' => 'Jossen',
                'Vorname' => 'Daniel',
                'Rolle' => 'CEO',
                'Typ' => 'Mitarbeiter',
                'Kunden_ID' => 5,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Name' => 'Jenny',
                'Vorname' => 'Manuel',
                'Rolle' => 'System Engineer',
                'Typ' => 'Mitarbeiter',
                'Kunden_ID' => 5,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Name' => 'Gysel',
                'Vorname' => 'Peter',
                'Rolle' => 'Dozent',
                'Typ' => 'Network',
                'Kunden_ID' => 7,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Name' => 'Page',
                'Vorname' => 'Larry',
                'Rolle' => 'Founder',
                'Typ' => 'typ',
                'Kunden_ID' => 6,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'Name' => 'Brin',
                'Vorname' => 'Sergey',
                'Rolle' => 'Founder',
                'Typ' => 'typ',
                'Kunden_ID' => 6,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ]);
    }

}