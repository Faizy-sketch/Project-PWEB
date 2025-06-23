@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($data) ? 'Edit Transaksi' : 'Tambah Transaksi' }}</h2>

    <form action="{{ isset($data) ? route('update', $data->id) : route('store') }}" method="POST">
        @csrf
        @if(isset($data))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="type" class="form-label">Tipe Transaksi</label>
            <select name="type" id="type" class="form-select" required>
                <option value="in" {{ (isset($data) && $data->type == 'in') ? 'selected' : '' }}>Pemasukan</option>
                <option value="out" {{ (isset($data) && $data->type == 'out') ? 'selected' : '' }}>Pengeluaran</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ (isset($data) && $data->category_id == $cat->id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" name="amount" class="form-control" value="{{ $data->amount ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ $data->date ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Keterangan</label>
            <textarea name="description" class="form-control">{{ $data->description ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($data) ? 'Update' : 'Simpan' }}
        </button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection