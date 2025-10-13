<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiksi',
            'description' => 'Cerita hasil imajinasi yang tidak sepenuhnya berdasarkan fakta'
        ],
        [
            'id' => 2,
            'name' => 'Romansa',
            'description' => 'Kisah yang berfokus pada hubungan dan perasaan cinta antar tokoh'
        ],
        [
            'id' => 3,
            'name' => 'Komedi',
            'description' => 'Cerita yang mengandung humor dan bertujuan menghibur'
        ],
        [
            'id' => 4,
            'name' => 'Misteri',
            'description' => 'Cerita yang penuh teka-teki dan intrik'
        ],
        [
            'id' => 5,
            'name' => 'Fantasi',
            'description' => 'Cerita yang melibatkan dunia magis atau supernatural'
        ],
    ];

    public function allGenres()
    {
        return $this->genres;
    }
}
