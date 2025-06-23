@extends('layout')

@section('content')
<div class="text-center mb-4">
    <h2 class="fw-bold text-white">📥 Daftar Pemasukan</h2>
    <p class="text-light">Catatan semua uang yang masuk</p>
</div>

<div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <a href="{{ route('create', ['type' => 'in']) }}" class="btn btn-success">+ Tambah Data</a>

    <form action="{{ url('/transactions/in') }}" method="GET" class="d-flex flex-wrap align-items-center gap-2">
        <label for="date" class="text-white mb-0">Filter tanggal:</label>
        <input type="date" name="date" id="date" value="{{ request('date') }}" class="form-control" style="width: 200px;">
        <button type="submit" class="btn btn-light">Tampilkan</button>
        <a href="{{ url('/transactions/in') }}" class="btn btn-outline-light">Reset</a>
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
            @forelse ($incomes as $income)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $income->date }}</td>
                    <td>{{ $income->category->name ?? '-' }}</td>
                    <td>Rp {{ number_format($income->amount, 0, ',', '.') }}</td>
                    <td>{{ $income->description }}</td>
                    <td>
                        <a href="{{ route('edit', $income->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('destroy', $income->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-light">Belum ada data pemasukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
