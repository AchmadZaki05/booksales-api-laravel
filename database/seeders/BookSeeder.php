<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               Book::create([
            'title' => 'The Silent Blade',
            'description' => 'Petualangan penuh aksi dan intrik di dunia fantasi.',
            'price' => 120000,
            'stock' => 10,
            'cover_photo' => 'silent_blade.jpg',
            
        ]);

        Book::create([
            'title' => 'Love in Autumn',
            'description' => 'Kisah romansa dua insan yang terpisah oleh waktu.',
            'price' => 95000,
            'stock' => 7,
            'cover_photo' => 'love_in_autumn.jpg',
            
        ]);

        Book::create([
            'title' => 'Laugh Out Loud',
            'description' => 'Kumpulan cerita komedi yang mengocok perut.',
            'price' => 80000,
            'stock' => 15,
            'cover_photo' => 'laugh_out_loud.jpg',
            
        ]);

        Book::create([
            'title' => 'Mystery of the Lost City',
            'description' => 'Petualangan menegangkan mencari kota yang hilang.',
            'price' => 110000,
            'stock' => 5,
            'cover_photo' => 'lost_city.jpg',
            
        ]);

        Book::create([
            'title' => 'Science of Tomorrow',
            'description' => 'Buku ilmiah populer tentang teknologi masa depan.',
            'price' => 130000,
            'stock' => 8,
            'cover_photo' => 'science_tomorrow.jpg',
    
        ]);

    }
}
