<?php

namespace Database\Seeders;

use Buildix\Timex\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimexCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timexcategories = [
            ['value' => 'Procurement Officers', 'icon' => 'heroicon-o-clipboard', 'color' => 'primary'],
            ['value' => 'Managers', 'icon' => 'heroicon-o-bookmark', 'color' => 'secondary'],
            ['value' => 'Executives', 'icon' => 'heroicon-o-flag', 'color' => 'danger'],
            ['value' => 'Suppliers', 'icon' => 'heroicon-o-badge-check', 'color' => 'success'],
        ];

        foreach ($timexcategories as $timexcategory) {
            Category::create($timexcategory);
        }

    }
}
