<!-- layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MoneyGo - Sistem Keuangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            padding-bottom: 80px; /* Beri ruang untuk footer */
        }

        .navbar-custom {
            background: linear-gradient(to right, #ff6a00, #ee0979);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
            color: #fff !important;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffeb3b !important;
        }

        .main-container {
            padding-top: 90px;
        }

        .card-custom {
            border: none;
            border-radius: 1rem;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }

        .card-title,
        .card-text {
            color: #fff;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to right, #ee0979, #ff6a00);
            color: #fff;
            text-align: center;
            padding: 12px 0;
            font-size: 14px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">💸 MoneyGo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/transactions/in') }}">Pemasukan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/transactions/out') }}">Pengeluaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container main-container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer style="background: linear-gradient(to right, #ee0979, #ff6a00); padding: 15px 25px; color: white; display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
        <div>
            &copy; MoneyGo — Dibuat dengan ❤️ untuk memudahkan keuanganmu.
        </div>
        <div>
            <span id="live-clock" class="text-end"></span>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateClock() {
            const now = new Date();
            const jam = String(now.getHours()).padStart(2, '0');
            const menit = String(now.getMinutes()).padStart(2, '0');
            const detik = String(now.getSeconds()).padStart(2, '0');
            const hari = now.toLocaleDateString('id-ID', {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
            });
            
            document.getElementById('live-clock').textContent = `${hari}, ${jam}:${menit}:${detik}`;
        }

        setInterval(updateClock, 1000);
        updateClock(); // panggil sekali saat load
    </script>
</body>
</html>
