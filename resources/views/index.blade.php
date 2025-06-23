@extends('layout')

@section('content')
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #f3e5f5);
            min-height: 100vh;
        }

        .card-custom {
            border: none;
            border-radius: 1rem;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 0.5rem;
        }
    </style>

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">💸 MoneyGo Dashboard</h1>
        <p class="text-muted">Pantau arus kasmu dengan mudah dan rapi!</p>
    </div>

    <div class="row text-white text-center mb-5">
        <div class="col-md-4 mb-4">
            <div class="card card-custom bg-primary">
                <div class="card-body">
                    <div class="icon-box">💰</div>
                    <h5 class="card-title">Total Saldo</h5>
                    <p class="card-text fs-4">Rp {{ number_format($saldo, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card card-custom bg-success">
                <div class="card-body">
                    <div class="icon-box">⬆️</div>
                    <h5 class="card-title">Total Pemasukan</h5>
                    <p class="card-text fs-4">Rp {{ number_format($pemasukan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card card-custom bg-danger">
                <div class="card-body">
                    <div class="icon-box">⬇️</div>
                    <h5 class="card-title">Total Pengeluaran</h5>
                    <p class="card-text fs-4">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center flex-wrap gap-3">
        <a href="{{ route('create', ['type' => 'in']) }}" class="btn btn-success btn-lg shadow">+ Tambah Pemasukan</a>
        <a href="{{ route('create', ['type' => 'out']) }}" class="btn btn-danger btn-lg shadow">+ Tambah Pengeluaran</a>
        <a href="{{ url('/transactions/in') }}" class="btn btn-outline-success btn-lg shadow">📥 Lihat Pemasukan</a>
        <a href="{{ url('/transactions/out') }}" class="btn btn-outline-danger btn-lg shadow">📤 Lihat Pengeluaran</a>
    </div>

    <div class="mt-5">
        <h4 class="text-center text-dark mb-4">📊 Grafik Ringkasan Transaksi</h4>
        <canvas id="transactionChart" height="100"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('transactionChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pemasukan', 'Pengeluaran'],
                datasets: [{
                    label: 'Total Transaksi',
                    data: [{{ $pemasukan ?? 0 }}, {{ $pengeluaran ?? 0 }}],
                    backgroundColor: ['#198754', '#dc3545'],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw?.toLocaleString('id-ID') ?? 0;
                                return 'Rp ' + value;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
