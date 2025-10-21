<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();
         
        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $transactions
        ], 200);
    }

    public function store(Request $request)
{
    // 1. validator & cek validator
    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,id',
        'quantity' => 'required|integer|min:1'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ], 422);
    }

    // 2. generate orderNumber -> unique | contoh: ORD-023948302
    $uniqueCode = "ORD-" . strtoupper(uniqid());

    // 3. ambil user yang sedang login & cek login (apakah ada data user?)
    $user = auth('api')->user();

    if (!$user) {
    return response()->json([
        'success' => false,
        'message' => 'Unauthorized!'
    ], 401);
}

// 4. mencari data buku dari request
$book = Book::find($request->book_id);

// 5. cek stok buku
if ($book->stock < $request->quantity) {
    return response()->json([
        'success' => false,
        'message' => 'Stok barang tidak cukup!'
    ], 400);
}

// 6. hitung total harga = price * quantity
$totalAmount = $book->price * $request->quantity;

// 7. kurangi stok buku (update)
$book->stock -= $request->quantity;
$book->save();

// 8. simpan data transaksi
$transactions = Transaction::create([
    'order_number' => $uniqueCode,
    'customer_id' => $user->id,
    'book_id' => $request->book_id,
    'total_amount' => $totalAmount
]);

return response()->json([
    'success' => true,
    'message' => 'Transaction created successfully!',
    'data' => $transactions
], 201);
}
 //  Menampilkan transaksi berdasarkan ID
    public function show($id)
    {
        $transaction = Transaction::with('user', 'book')->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get transaction detail',
            'data' => $transaction
        ], 200);
    }

    public function update(Request $request, $id)
{
    // 1️⃣ Cari transaksi
    $transaction = Transaction::find($id);
    if (!$transaction) {
        return response()->json([
            'success' => false,
            'message' => 'Transaction not found!'
        ], 404);
    }

    // 2️⃣ Validasi input
    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,id',
        'quantity' => 'required|integer|min:1'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ], 422);
    }

    // 3️⃣ Ambil data buku baru
    $book = Book::find($request->book_id);

    // 4️⃣ Hitung ulang total harga
    $totalAmount = $book->price * $request->quantity;

    // 5️⃣ Update transaksi
    $transaction->update([
        'book_id' => $book->id,
        'total_amount' => $totalAmount,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Transaction updated successfully!',
        'data' => $transaction
    ], 200);
}

    //  Hapus transaksi
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully!'
        ], 200);
    }
}

