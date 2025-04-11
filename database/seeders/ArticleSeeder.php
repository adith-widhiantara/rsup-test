<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $articles = [];

        for ($i = 0; $i < 10; $i++) {
            $articles[] = [
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(3, true),
                'category' => $faker->randomElement(['Technology', 'Health', 'Education', 'Finance', 'Lifestyle']),
                'file_path' => null,
                'author_id' => 3, // pastikan user ID 3 ada
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('articles')->insert($articles);

    }
}
