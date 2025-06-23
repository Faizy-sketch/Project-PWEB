@extends('layout')

@section('content')
<style>
    .contact-section {
        background-color: rgba(0, 0, 0, 0.1);
        padding: 40px;
        border-radius: 1rem;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
        color: #fff;
        max-width: 700px;
        margin: auto;
    }

    .contact-section h2 {
        color: #ffe600;
        margin-bottom: 10px;
    }

    .contact-section p {
        color: #f1f1f1;
    }

    .form-label {
        color: #ffffff;
        font-weight: 500;
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(0, 0, 0, 0.1);
        color: #333;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
    }

    .form-control:focus {
        background-color: #fff;
        color: #000;
        box-shadow: 0 0 0 3px rgba(255, 106, 0, 0.3);
    }

    .form-control::placeholder {
        color: #666;
    }

    .btn-kontak {
        background: linear-gradient(to right, #ff6a00, #ee0979);
        color: #fff;
        border: none;
        transition: 0.3s ease;
        border-radius: 6px;
    }

    .btn-kontak:hover {
        background: linear-gradient(to right, #ee0979, #ff6a00);
        transform: scale(1.05);
    }
</style>

<div class="container contact-section mt-5 mb-5">
    <h2 class="text-center">📞 Kontak Kami</h2>
    <p class="text-center mb-4">Punya pertanyaan atau masukan? Kirimkan melalui form di bawah ini!</p>

    <form>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Nama lengkap kamu">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" placeholder="nama@email.com">
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" rows="4" placeholder="Tulis pesanmu di sini..."></textarea>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-kontak px-4 py-2">Kirim Pesan</button>
        </div>
    </form>
</div>
@endsection
