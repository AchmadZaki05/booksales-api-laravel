<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.K. Rowling',
            'birth_year' => 1965,
            'nationality' => 'Inggris',
        ]);

        Author::create([
            'name' => 'George R.R. Martin',
            'birth_year' => 1948,
            'nationality' => 'Amerika Serikat',
        ]);

        Author::create([
            'name' => 'Haruki Murakami',
            'birth_year' => 1949,
            'nationality' => 'Jepang',
        ]);

        Author::create([
            'name' => 'Agatha Christie',
            'birth_year' => 1999,
            'nationality' => 'Arab',
        ]);

        Author::create([
            'name' => 'Paulo',
            'birth_year' => 1947,
            'nationality' => 'Brasil',
        ]);
    }
}
