<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-height {
            min-height: calc(100vh - 128px);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">
    <!-- Navbar Sederhana -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="ml-2 text-xl font-semibold text-gray-800">Sistem Inventory</span>
                </div>

                <!-- Tombol Login/Register -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-medium text-blue-600 hover:text-blue-800 transition">Login</a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="hero-height flex items-center justify-center">
        <div class="max-w-2xl mx-auto text-center px-4 py-12">
            <div class="mb-8">
                <svg class="h-16 w-16 mx-auto text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang</h1>
            <h2 class="text-2xl font-semibold text-blue-600 mb-6">Sistem Manajemen Inventory</h2>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('login') }}"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition shadow-md">
                    Masuk ke Sistem
                </a>

            </div>
        </div>
    </main>

    <!-- Footer Sederhana -->
    <footer class="bg-white border-t border-gray-200 py-4">
        <div class="max-w-6xl mx-auto px-4 text-center text-gray-500 text-sm">
            <p>&copy; <span id="year"></span> PT. Inventory Digital. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Auto update year in footer
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
