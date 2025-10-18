<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found!'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $authors
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'birth_year' => 'required|integer|min:1000|max:' . date('Y'),
            'nationality' => 'required|string|max:100'
        ]);

        // 2. jika gagal validasi
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. simpan data
        $author = Author::create([
            'name' => $request->name,
            'birth_year' => $request->birth_year,
            'nationality' => $request->nationality
        ]);

        // 4. response sukses
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully!',
            'data' => $author
        ], 201);
    }
}
