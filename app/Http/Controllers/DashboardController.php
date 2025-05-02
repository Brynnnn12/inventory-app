<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $items = Items::all();
        $itemsin = Items::where('stock', '>', 0)->get();
        $itemsout = Items::where('stock', '=', 0)->get();

        return view('dashboard', compact('items', 'itemsin', 'itemsout'));
    }
}
