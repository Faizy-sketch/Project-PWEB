@extends('layout')

@section('content')
<div class="text-center mb-4">
    <h2 class="fw-bold text-white">📤 Daftar Pengeluaran</h2>
    <p class="text-light">Catatan semua uang yang keluar</p>
</div>

<div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <a href="{{ route('create', ['type' => 'out']) }}" class="btn btn-success">+ Tambah Data</a>

    <form action="{{ url('/transactions/out') }}" method="GET" class="d-flex flex-wrap align-items-center gap-2">
        <label for="date" class="text-white mb-0">Filter tanggal:</label>
        <input type="date" name="date" id="date" value="{{ request('date') }}" class="form-control" style="width: 200px;">
        <button type="submit" class="btn btn-light">Tampilkan</button>
        <a href="{{ url('/transactions/out') }}" class="btn btn-outline-light">Reset</a>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered text-white align-middle" style="background-color: rgba(255,255,255,0.05);">
        <thead class="table-light text-dark">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($expenses as $expense)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->category->name ?? '-' }}</td>
                    <td>Rp {{ number_format($expense->amount, 0, ',', '.') }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>
                        <a href="{{ route('edit', $expense->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('destroy', $expense->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-light">Belum ada data pengeluaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
