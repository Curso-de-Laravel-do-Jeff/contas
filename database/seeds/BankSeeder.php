<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new \App\Bank();

        $banks = [
            ['name' => 'Nubank'],
            ['name' => 'Bradesco'],
            ['name' => 'Itaú'],
            ['name' => 'Santander'],
            ['name' => 'Citybank'],
            ['name' => 'Intermedium']
        ];

        foreach ($banks as $bank) {
            $model->create($bank);
        }
    }
}
