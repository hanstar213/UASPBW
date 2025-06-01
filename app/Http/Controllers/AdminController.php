<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Pelaporan;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Hitung total pelaporan dan total donasi
        $totalPelaporan = Pelaporan::count();
        $totalDonasi = Donasi::sum('nominal');

        // Inisialisasi label bulan
        $labelsBulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Ambil jumlah pelaporan per bulan
        $pelaporanPerBulan = Pelaporan::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )->groupBy('bulan')->orderBy('bulan')->get();

        // Ambil jumlah donasi per bulan
        $donasiPerBulan = Donasi::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(nominal) as total')
        )->groupBy('bulan')->orderBy('bulan')->get();

        // Siapkan array data per bulan (default 0)
        $dataPelaporan = [];
        $dataDonasi = [];

        for ($i = 1; $i <= 12; $i++) {
            $pelaporan = $pelaporanPerBulan->firstWhere('bulan', $i);
            $donasi = $donasiPerBulan->firstWhere('bulan', $i);

            $dataPelaporan[] = $pelaporan ? $pelaporan->total : 0;
            $dataDonasi[] = $donasi ? $donasi->total : 0;
        }

        return view('admin.dashboard', compact(
            'totalPelaporan',
            'totalDonasi',
            'labelsBulan',
            'dataPelaporan',
            'dataDonasi'
        ));
    }
}
