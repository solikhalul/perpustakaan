<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;
use App\Models\LoanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoanController extends Controller
{
    // Menampilkan semua transaksi peminjaman
    public function index()
    {
        $loans = Loan::with(['member', 'user', 'details.book'])
            ->latest()
            ->get();

        return view('loans.index', compact('loans'));
    }

    // Menampilkan formulir peminjaman
    public function create()
    {
        $members = Member::where('status', 'aktif')
            ->orderBy('nama')
            ->get();

        $books = Book::where('stok', '>', 0)
            ->orderBy('judul')
            ->get();

        return view('loans.create', compact('members', 'books'));
    }

    // Menyimpan transaksi dan mengurangi stok buku
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date|after_or_equal:tanggal_pinjam',
            'details' => 'required|array|min:1',
            'details.*.book_id' => 'required|distinct|exists:books,id',
            'details.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            $member = Member::where('id', $validated['member_id'])
                ->where('status', 'aktif')
                ->firstOrFail();

            $loan = Loan::create([
                'member_id' => $member->id,
                'user_id' => auth()->id(),
                'tanggal_pinjam' => $validated['tanggal_pinjam'],
                'tanggal_jatuh_tempo' => $validated['tanggal_jatuh_tempo'],
                'status' => 'dipinjam',
            ]);

            foreach ($validated['details'] as $item) {
                $book = Book::where('id', $item['book_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($book->stok < $item['jumlah']) {
                    throw new \RuntimeException(
                        'Stok buku "' . $book->judul . '" tidak mencukupi.'
                    );
                }

                $book->decrement('stok', $item['jumlah']);

                LoanDetail::create([
                    'loan_id' => $loan->id,
                    'book_id' => $book->id,
                    'jumlah' => $item['jumlah'],
                    'jumlah_dikembalikan' => 0,
                ]);
            }
        });

        return redirect()
            ->route('loans.index')
            ->with('success', 'Transaksi peminjaman berhasil disimpan.');
    }

    // Menampilkan detail transaksi
    public function show(Loan $loan)
    {
        $loan->load(['member', 'user', 'details.book']);

        return view('loans.show', compact('loan'));
    }

    // Mencatat pengembalian dan menambah stok buku
    public function returnBook(Request $request, Loan $loan, LoanDetail $detail)
    {
        $validated = $request->validate([
            'jumlah_dikembalikan' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated, $loan, $detail) {
            $loan = Loan::whereKey($loan->id)
                ->lockForUpdate()
                ->firstOrFail();

            $detail = LoanDetail::whereKey($detail->id)
                ->where('loan_id', $loan->id)
                ->lockForUpdate()
                ->firstOrFail();

            $sisa = $detail->jumlah - $detail->jumlah_dikembalikan;
            $jumlahKembali = $validated['jumlah_dikembalikan'];

            if ($jumlahKembali > $sisa) {
                throw new \RuntimeException(
                    'Jumlah pengembalian melebihi jumlah buku yang belum dikembalikan.'
                );
            }

            $book = Book::whereKey($detail->book_id)
                ->lockForUpdate()
                ->firstOrFail();

            $detail->increment('jumlah_dikembalikan', $jumlahKembali);
            $book->increment('stok', $jumlahKembali);

            $loan->load('details');

            $semuaKembali = $loan->details->every(function ($item) {
                return $item->jumlah_dikembalikan >= $item->jumlah;
            });

            $adaPengembalian = $loan->details->contains(function ($item) {
                return $item->jumlah_dikembalikan > 0;
            });

            if ($semuaKembali) {
                $loan->update(['status' => 'dikembalikan']);
            } elseif ($adaPengembalian) {
                $loan->update(['status' => 'sebagian_dikembalikan']);
            }
        });

        return redirect()
            ->route('loans.show', $loan->id)
            ->with('success', 'Pengembalian buku berhasil dicatat.');
    }
}
