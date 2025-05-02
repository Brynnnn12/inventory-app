@php
    // Total jumlah stok semua item
    $total = $items->sum('stock');

    // Kategori stok
    $lowStock = $items->where('stock', '<', 10)->count(); // stok rendah
    $outStock = $items->where('stock', '=', 0)->count(); // stok habis
    $overStock = $items->where('stock', '>', 100)->count(); // stok berlebih

    // Barang yang masih tersedia dan tidak termasuk kategori di atas
    $inStock = $items
        ->filter(function ($item) {
            return $item->stock >= 10 && $item->stock <= 100;
        })
        ->count();

    // Total semua item dihitung dari jumlah item (bukan jumlah stok)
    $totalItems = $items->count() ?: 1; // Hindari div 0

    // Fungsi persentase
    $percent = fn($val) => number_format(($val / $totalItems) * 100, 1);
@endphp

<div class="bg-white p-6 rounded-xl shadow-sm card">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Stock Levels</h3>
    <div class="space-y-4">
        <div>
            <div class="flex justify-between text-sm mb-1">
                <span class="font-medium">In Stock</span>
                <span>{{ $inStock }} items ({{ $percent($inStock) }}%)</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill bg-green-500" style="width: {{ $percent($inStock) }}%"></div>
            </div>
        </div>
        <div>
            <div class="flex justify-between text-sm mb-1">
                <span class="font-medium">Low Stock</span>
                <span>{{ $lowStock }} items ({{ $percent($lowStock) }}%)</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill bg-yellow-500" style="width: {{ $percent($lowStock) }}%"></div>
            </div>
        </div>
        <div>
            <div class="flex justify-between text-sm mb-1">
                <span class="font-medium">Out of Stock</span>
                <span>{{ $outStock }} items ({{ $percent($outStock) }}%)</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill bg-red-500" style="width: {{ $percent($outStock) }}%"></div>
            </div>
        </div>
        <div>
            <div class="flex justify-between text-sm mb-1">
                <span class="font-medium">Overstock</span>
                <span>{{ $overStock }} items ({{ $percent($overStock) }}%)</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill bg-purple-500" style="width: {{ $percent($overStock) }}%"></div>
            </div>
        </div>
    </div>
</div>
