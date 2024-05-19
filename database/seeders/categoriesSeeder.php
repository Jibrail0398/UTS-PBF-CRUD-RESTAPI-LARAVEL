<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //input categories
        Categories::create(
            [
                'name' =>'foods',
            ]
        );
        Categories::create(
            [
                'name' =>'drinks',
            ]
        );
        Categories::create(
            [
                'name' =>'clothes',
            ]
        );
        Categories::create(
            [
                'name' =>'drugs',
            ]
        );
    }
}
