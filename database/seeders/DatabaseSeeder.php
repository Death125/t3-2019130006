<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->seed(123);

        for ($i = 0; $i < 10; $i++) {
            Author::create([
                'id' => $faker->unique()->regexify('[A]{1}[0]{2}[0-9]{1}'),
                'nama' => $faker->firstName . ' ' .
                    $faker->lastName,
                'umur' => $faker->numberBetween(20, 90),
                'kota' => $faker->city,
                'negara' => $faker->country,
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            Book::create(
                [
                    'id' => $faker->unique()->regexify('[A-Z]{1}[0]{2}[0-9]{1}'),
                    'judul' => $faker->sentence,
                    'halaman' => $faker->unique()->numberBetween(10, 999),
                    'kategori' => $faker->randomElement(['Romance', 'Music', 'Adventure', 'Horror', 'Comedy', 'History', 'Education']),
                    'Penerbit' => $faker->randomElement(['Deepublish', ' Bukunesia', 'Gramedia', 'Grasindo', 'Inari', 'Bintang Media']),
                    'author_id' => $faker->randomElement(['A000', 'A001', 'A002', 'A003', 'A004', 'A005', 'A006', 'A007', 'A008', 'A009']),
                ]
            );
        }
    }
}
