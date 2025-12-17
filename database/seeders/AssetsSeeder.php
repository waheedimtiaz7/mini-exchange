<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssetsSeeder extends Seeder
{
    public function run(): void
    {
       
        $defaultAssets = [
            'BTC' => [
                'amount' => '0.50000000',
                'locked_amount' => '0.00000000',
            ],
            'ETH' => [
                'amount' => '10.00000000',
                'locked_amount' => '0.00000000',
            ],
        ];

        User::chunk(100, function ($users) use ($defaultAssets) {
            foreach ($users as $user) {
                foreach ($defaultAssets as $symbol => $balances) {
                    Asset::updateOrCreate(
                        [
                            'user_id' => $user->id,
                            'symbol'  => $symbol,
                        ],
                        [
                            'amount'        => $balances['amount'],
                            'locked_amount' => $balances['locked_amount'],
                        ]
                    );
                }
            }
        });
    }
}
