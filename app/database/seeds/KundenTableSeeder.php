<?php

class KundenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Kunden')->delete();
        $customer = new Customer;
        $customer->fill([
            'ID'       => 0,
            'Name'     => '--- select ---',
            'Strasse'  => 'foo',
            'Nr'       => 'bar',
            'PLZ'      => 'foo',
            'Ort'      => 'bar',
            'E-Mail'   => 'foo',
            'Telefon'  => 'bar',
            'order'	   => 0,
        ]);
        $customer->save();
    }

}