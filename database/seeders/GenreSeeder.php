<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Genre yang menampilkan adegan laga, pertarungan, dan ketegangan tinggi.',
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre yang berfokus pada hubungan dan perasaan cinta antar tokoh.',
        ]);

        Genre::create([
            'name' => 'Comedy',
            'description' => 'Genre yang bertujuan menghibur penonton dengan humor dan situasi lucu.',
        ]);

        Genre::create([
            'name' => 'Mystery',
            'description' => 'Genre yang berisi teka-teki dan penyelidikan terhadap peristiwa misterius.',
        ]);

        Genre::create([
            'name' => 'Science Fiction',
            'description' => 'Genre yang mengeksplorasi teknologi, ruang angkasa, dan masa depan imajinatif.',
        ]);
    }
}
