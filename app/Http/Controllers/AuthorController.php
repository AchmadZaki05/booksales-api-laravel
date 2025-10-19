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

         public function show(string $id)
{
    $author = Author::find($id);

    if (!$author) {
        // jika data tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'Resource not found'
        ], 404); 
    }

    // jika data ditemukan
    return response()->json([
        'success' => true,
        'message' => 'Get detail resource',
        'data' => $author
    ], 200);
}

public function destroy(string $id)
{
    $author = Author::find($id);

    if (!$author) {
        return response()->json([
            'success' => false,
            'message' => 'Resource not found'
        ], 404);
    }

    $author->delete();

    return response()->json([
        'success' => true,
        'message' => 'Delete resource successfully'
    ], 200);
}

public function update(Request $request, string $id)
{
    // 1. cari data author berdasarkan id
    $author = Author::find($id);

    if (!$author) {
        return response()->json([
            'success' => false,
            'message' => 'Resource not found'
        ], 404);
    }

    // 2. validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'birth_year' => 'required|integer|min:1000|max:' . date('Y'),
        'nationality' => 'required|string|max:100'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => $validator->errors()
        ], 422);
    }

    // 3. siapkan data untuk diupdate
    $data = [
        'name' => $request->name,
        'birth_year' => $request->birth_year,
        'nationality' => $request->nationality,
    ];

    // 4. update data ke database
    $author->update($data);

    // 5. kirim response sukses
    return response()->json([
        'success' => true,
        'message' => 'Resource updated successfully!',
        'data' => $author
    ], 200);
}

}
