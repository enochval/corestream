<?php

use Illuminate\Database\Seeder;
use App\Package;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Owambe',
                'period' => 'Per Hour',
                'amount' => 2000,
            ],
            [
              'name' => 'Regular',
              'period' => 'Per Hour',
              'amount' => 4000,
            ],
            [
              'name' => 'VIP',
              'period' => 'Per Hour',
              'amount' => 8000,
            ],
            [
              'name' => 'VVIP',
              'period' => 'Per Hour',
              'amount' => 12000,
            ],
        ];

        foreach ($packages as $key => $package)
        {
            Package::create($package);
        }
    }
}
