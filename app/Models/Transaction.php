<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'Transactions';
        protected $fillable = [
        'order_number',
        'customer_id',
        'book_id',
        'total_amount',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Relasi ke tabel books
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}

