<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = [
            ['entity' => 'Governmental Institution '],
            ['entity' => 'Private Institution'],
        ];

        foreach ($entities as $entity) {
            Entity::create($entity);
        }
    }
}
