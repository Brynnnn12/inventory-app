<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Items;
use App\Models\ItemIn;
use App\Models\ItemOut;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // menghitung total barang
        $barang = Items::count();
        $barangMasuk = ItemIn::whereDate('created_at', now())->count();
        $barangKeluar = ItemOut::whereDate('created_at', now())->count();

        // Current month data
        $currentMonthIn = ItemIn::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $currentMonthOut = ItemOut::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Previous month data
        $prevMonth = Carbon::now()->subMonth();

        $prevMonthItemsCount = Items::whereDate('created_at', '<', $prevMonth->endOfMonth())->count();
        $prevMonthIn = ItemIn::whereMonth('created_at', $prevMonth->month)
            ->whereYear('created_at', $prevMonth->year)
            ->count();
        $prevMonthOut = ItemOut::whereMonth('created_at', $prevMonth->month)
            ->whereYear('created_at', $prevMonth->year)
            ->count();

        // Calculate percentage changes
        $itemsPercentChange = $prevMonthItemsCount > 0 ?
            round((($barang - $prevMonthItemsCount) / $prevMonthItemsCount) * 100, 1) : 12.5;

        $itemInPercentChange = $prevMonthIn > 0 ?
            round((($currentMonthIn - $prevMonthIn) / $prevMonthIn) * 100, 1) : 5.2;

        $newItemsOut = $currentMonthOut - $prevMonthOut;
        $newItemsOut = $newItemsOut > 0 ? $newItemsOut : 2; // Default to 2 if no change

        return view('dashboard', compact(
            'barang',
            'barangMasuk',
            'barangKeluar',
            'itemsPercentChange',
            'itemInPercentChange',
            'newItemsOut'
        ));
    }
}
