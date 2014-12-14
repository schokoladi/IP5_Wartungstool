<?php

class KundenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Kunden')->delete();
        $customer = new Customer;
        $customer->fill([
            'Name'     => '--- select ---',
            'order'	   => 0,
        ]);
        $customer->save();
    }

}