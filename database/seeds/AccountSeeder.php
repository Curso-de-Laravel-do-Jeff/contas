<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new \App\Account();

        $accounts = [
            [
                'type' => 'CC',
                'balance' => 15,
                'status' => true,
                'id_client' => 1
            ],

            [
                'type' => 'CC',
                'balance' => -266.58,
                'status' => true,
                'id_client' => 2
            ],

            [
                'type' => 'CC',
                'balance' => 388.45,
                'status' => true,
                'id_client' => 3
            ],

            [
                'type' => 'CC',
                'balance' => -2.88,
                'status' => true,
                'id_client' => 4
            ],

            [
                'type' => 'CC',
                'balance' => 57.85,
                'status' => true,
                'id_client' => 5
            ]
        ];

        foreach ($accounts as $account) {
            $model->create($account);
        }
    }
}
