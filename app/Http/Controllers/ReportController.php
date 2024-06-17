<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }

    public function index()
    {
        $report = DB::table('orders_detail')
            ->join('products', 'products.id', 'orders_detail.id_produk')
            ->select(DB::raw('
            nama_barang, 
            count(*) as jumlah_dibeli, 
            harga,
            SUM(total) as pendapatan, 
            SUM(jumlah) as total_qty'))
            ->groupBy('id_produk', 'nama_barang', 'harga')
            ->get();

        return response()->json([
            'data' => $report
        ]);

    }
}
