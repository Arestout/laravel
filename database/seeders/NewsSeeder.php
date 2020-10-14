<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::factory()->times(10)->create();
    }

    private function getData()
    {

        $faker = Faker::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(rand(3, 6)),
                'text' => $faker->realText(rand(200, 500)),
                'isPrivate' => $faker->boolean
            ];
        }

        return $data;
    }
}
