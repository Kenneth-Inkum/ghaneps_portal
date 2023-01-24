<?php

namespace Database\Seeders;

use App\Models\EntityCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity_categories = [
            ['entity_id' => 1, 'entity_category' => 'Procurement Officer'],
            ['entity_id' => 1, 'entity_category' => 'Executive'],
            ['entity_id' => 2, 'entity_category' => 'Manager'],
            // ['entity_id' => null, 'entity_category' => 'Supplier'],
        ];

        foreach ($entity_categories as $entity_category) {
            EntityCategory::create($entity_category);
        }


    }
}
