<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index (){
        $data = new Genre();
        $genres = $data -> allGenres();
        
        return view('genres', ['genres' => $genres]);
    }
}
