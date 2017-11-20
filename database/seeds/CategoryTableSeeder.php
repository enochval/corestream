<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Wedding'
            ],
            [
                'name' => 'Birthday'
            ],
            [
                'name' => 'Anniversary'
            ],
            [
                'name' => 'Concert'
            ],
            [
                'name' => 'Sport'
            ],
            [
                'name' => 'Worship'
            ],
            [
                'name' => 'Education'
            ],
            [
                'name' => 'Cooperate'
            ],
            [
                'name' => 'Conference'
            ],
            [
                'name' => 'Music'
            ],
            [
                'name' => 'TV and Radio'
            ],
            [
                'name' => 'Fashion Show'
            ],
            [
                'name' => 'Live Performance'
            ],
            [
                'name' => 'Trade Fare'
            ],
            [
                'name' => 'Religious Activities'
            ],
            [
                'name' => 'Training Session'
            ],
            [
                'name' => 'Product Launch'
            ],
            [
                'name' => 'Comedy'
            ],
            [
                'name' => 'Entertainment'
            ],
            [
                'name' => 'Media'
            ],
            [
                'name' => 'Production'
            ],
            [
                'name' => 'ICT'
            ],
        ];

        foreach ($category as $key => $value)
        {
            Category::create($value);
        }
    }
}
