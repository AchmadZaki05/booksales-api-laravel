<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'J.K. Rowling',
            'birth_year' => 1965,
            'nationality' => 'Inggris'
        ],
        [
            'id' => 2,
            'name' => 'George R.R. Martin',
            'birth_year' => 1948,
            'nationality' => 'Amerika'
        ],
        [
            'id' => 3,
            'name' => 'Agatha Christie',
            'birth_year' => 1890,
            'nationality' => 'Inggris'
        ],
        [
            'id' => 4,
            'name' => 'Haruki Murakami',
            'birth_year' => 1949,
            'nationality' => 'Jepang'
        ],
        [
            'id' => 5,
            'name' => 'Paulo Coelho',
            'birth_year' => 1947,
            'nationality' => 'Brasil'
        ],
    ];

    public function allAuthors()
    {
        return $this->authors;
    }
}
