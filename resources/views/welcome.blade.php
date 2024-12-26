<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Warung Makan Serba Ada</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li>
                            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="text-decoration: none; color: black;">Log in</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="mx-2 ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="text-decoration: none; color: black;">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <header class="bg-primary text-white text-center py-5">
            <div class="container">
                <h1 class="display-4">Selamat Datang di Warung Makan Serba Ada</h1>
            </div>
        </header>
        
        <section id="about" class="py-5 text-center">
            <div class="container">
                <img src="{{ asset('/warung.jpg') }}" alt="Warung makan serba ada" style="width: 500px; height: auto;">
                <h2 class="text-center">Tentang Kami</h2>
                <p class="text-center">Warung Makan Serba Ada menyediakan beragam pilihan menu mulai dari makanan ringan hingga makanan berat. Kami selalu menggunakan bahan segar dan berkualitas untuk memastikan kepuasan pelanggan. Dengan suasana yang nyaman, tempat kami cocok untuk makan bersama keluarga atau teman.</p>
            </div>
        </section>
    
        <section id="menu" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center">Menu Kami</h2>
                <div class="row mt-4">
                    @foreach ($menus as $menu)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                                <p class="card-text">Harga: Rp{{ number_format($menu->harga_menu, 0, ',', '.') }}</p>
                                <img src="{{ asset('images/' . $menu->gambar_menu) }}" alt="Product Image" width="200">
                                <p class="card-text">Nikmati hidangan kami yang selalu dibuat dengan cinta.</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    
        <section id="contact" class="py-5">
            <div class="container">
                <h2 class="text-center">Kontak Kami</h2>
                <p class="text-center">Alamat: Jl. Makan Enak No. 123, Kota Lezat</p>
                <p class="text-center">Telepon: 0812-3456-7890</p>
                <p class="text-center">Email: info@warungserbaada.com</p>
            </div>
        </section>
    
        <footer class="bg-dark text-white text-center py-3">
            <p>&copy; 2024 Warung Makan Serba Ada. All Rights Reserved.</p>
        </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>
</html>
