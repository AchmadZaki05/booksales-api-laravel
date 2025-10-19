<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
         
        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $genres
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 4. response
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully!',
            'data' => $genre
        ], 201);
    }

     public function show(string $id)
{
    $genre = Genre::find($id);

    if (!$genre) {
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
        'data' => $genre
    ], 200);
}

public function destroy(string $id)
{
    $genre = Genre::find($id);

    if (!$genre) {
        return response()->json([
            'success' => false,
            'message' => 'Resource not found'
        ], 404);
    }

    $genre->delete();

    return response()->json([
        'success' => true,
        'message' => 'Delete resource successfully'
    ], 200);
}

public function update(Request $request, string $id)
{
    // 1. cari data genre berdasarkan id
    $genre = Genre::find($id);

    if (!$genre) {
        return response()->json([
            'success' => false,
            'message' => 'Resource not found'
        ], 404);
    }

    // 2. validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'description' => 'required|string',
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
        'description' => $request->description,
    ];

    // 4. update data ke database
    $genre->update($data);

    // 5. kirim response
    return response()->json([
        'success' => true,
        'message' => 'Resource updated successfully!',
        'data' => $genre
    ], 200);
}


}
