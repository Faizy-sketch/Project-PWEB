@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-white mb-4">Tambah Transaksi {{ $type == 'in' ? 'Pemasukan' : 'Pengeluaran' }}</h2>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">

        {{-- Pilih Kategori --}}
        <div class="mb-3">
            <label for="category_id" class="form-label text-white">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Jumlah --}}
        <div class="mb-3">
            <label for="amount" class="form-label text-white">Jumlah (Rp)</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="date" class="form-label text-white">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        {{-- Keterangan --}}
        <div class="mb-3">
            <label for="description" class="form-label text-white">Keterangan</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        {{-- Tombol Submit --}}
        <div class="d-flex justify-content-between">
            <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
