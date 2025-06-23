<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Halaman dashboard utama
    public function index()
    {
        $transactions = Transaction::all();
        $pemasukan = Transaction::where('type', 'in')->sum('amount');
        $pengeluaran = Transaction::where('type', 'out')->sum('amount');
        $saldo = $pemasukan - $pengeluaran;

        return view('index', compact('pemasukan', 'pengeluaran', 'saldo'));
    }

    // Routing dinamis berdasarkan tipe transaksi (in/out)
    public function list(Request $request, $type)
    {
        if ($type === 'in') {
            return $this->pemasukan($request);
        } elseif ($type === 'out') {
            return $this->pengeluaran($request);
        }

        abort(404);
    }

    // Daftar pemasukan
    public function pemasukan(Request $request)
    {
        $query = Transaction::with('category')->where('type', 'in');

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $incomes = $query->orderBy('date', 'asc')->get();

        return view('income', compact('incomes'));
    }

    // Daftar pengeluaran
    public function pengeluaran(Request $request)
    {
        $query = Transaction::with('category')->where('type', 'out');

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $expenses = $query->orderBy('date', 'asc')->get();

        return view('expense', compact('expenses'));
    }

    // Form tambah data
    public function create(Request $request)
    {
        $type = $request->query('type'); // ambil ?type=in / out dari URL
        $categories = Category::where('type', $type)->get();

        return view('create', compact('categories', 'type'));
    }
    // Simpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:in,out',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        Transaction::create($request->only('type', 'category_id', 'amount', 'date', 'description'));

        return redirect('/')->with('success', 'Data berhasil ditambahkan.');
    }

    // Form edit transaksi
    public function edit($id)
    {
        $data = Transaction::findOrFail($id);
        $categories = Category::all();
        return view('form', compact('data', 'categories'));
    }

    // Update transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:in,out',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        $data = Transaction::findOrFail($id);
        $data->update($request->only('type', 'category_id', 'amount', 'date', 'description'));

        return redirect('/')->with('success', 'Data berhasil diupdate.');
    }

    // Hapus transaksi
    public function destroy($id)
    {
        $data = Transaction::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
