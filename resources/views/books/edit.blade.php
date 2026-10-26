<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Buku</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;

            /* BACKGROUND BIRU AGAK GELAP */
            background: linear-gradient(
                135deg,
                #1e3a5f,
                #244f78,
                #2d628f
            );

            min-height: 100vh;
            color: #172033;
        }

        /* =========================
           CONTAINER
        ========================= */

        .page-container {
            width: 92%;
            max-width: 1050px;
            margin: 45px auto;
        }


        /* =========================
           HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .header-left {
            color: white;
        }

        .small-title {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 3px;
            opacity: 0.75;
            margin-bottom: 8px;
        }

        .header-left h1 {
            margin: 0;
            font-size: 36px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .header-left p {
            margin: 8px 0 0;
            color: #dbeafe;
            font-size: 14px;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            text-decoration: none;

            color: white;
            background: rgba(255,255,255,0.12);

            border: 1px solid rgba(255,255,255,0.20);

            padding: 12px 17px;
            border-radius: 11px;

            font-size: 13px;
            font-weight: bold;

            backdrop-filter: blur(8px);

            transition: 0.2s;
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.20);
            transform: translateY(-2px);
        }


        /* =========================
           MAIN CARD
        ========================= */

        .form-card {
            background: white;
            border-radius: 22px;

            padding: 35px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.22);

            border: 1px solid rgba(255,255,255,0.5);
        }


        /* =========================
           BOOK INFO
        ========================= */

        .book-info {
            display: flex;
            align-items: center;
            gap: 17px;

            background: #f5f8fc;

            border: 1px solid #e6edf5;

            border-radius: 15px;

            padding: 17px 20px;

            margin-bottom: 28px;
        }

        .book-icon {
            width: 48px;
            height: 48px;

            border-radius: 13px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #dbeafe;

            color: #2563eb;

            font-size: 22px;
        }

        .book-info-text {
            flex: 1;
        }

        .book-info-label {
            font-size: 11px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .book-info-title {
            font-size: 16px;
            font-weight: bold;
            color: #172033;
        }

        .book-id {
            font-size: 12px;
            color: #94a3b8;
        }


        /* =========================
           ERROR
        ========================= */

        .error-box {
            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #be123c;

            border-radius: 13px;

            padding: 15px 18px;

            margin-bottom: 25px;

            font-size: 13px;
        }

        .error-box strong {
            display: block;
            margin-bottom: 7px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 3px;
        }


        /* =========================
           FORM
        ========================= */

        .section-title {
            font-size: 17px;
            font-weight: bold;
            color: #172033;

            margin-bottom: 5px;
        }

        .section-description {
            font-size: 13px;
            color: #94a3b8;

            margin-bottom: 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            margin-bottom: 2px;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            display: block;

            font-size: 13px;
            font-weight: bold;

            color: #334155;

            margin-bottom: 8px;
        }

        .required {
            color: #ef4444;
        }


        /* =========================
           INPUT
        ========================= */

        input,
        select {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #dbe2ea;

            border-radius: 11px;

            background: #f8fafc;

            color: #172033;

            font-size: 14px;

            outline: none;

            transition: 0.2s;
        }

        input::placeholder {
            color: #a1a9b5;
        }

        input:focus,
        select:focus {
            background: white;

            border-color: #3b82f6;

            box-shadow:
                0 0 0 3px rgba(59,130,246,0.12);
        }

        select {
            cursor: pointer;
        }


        /* =========================
           INPUT ICON / HINT
        ========================= */

        .input-hint {
            margin-top: 6px;

            color: #94a3b8;

            font-size: 11px;
        }


        /* =========================
           DIVIDER
        ========================= */

        .divider {
            height: 1px;

            background: #edf1f5;

            margin: 30px 0 25px;
        }


        /* =========================
           BUTTON AREA
        ========================= */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 11px;
        }

        .btn-cancel {
            text-decoration: none;

            padding: 12px 18px;

            border-radius: 11px;

            color: #64748b;

            background: #f1f5f9;

            font-size: 13px;

            font-weight: bold;

            transition: 0.2s;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-save {
            border: none;

            cursor: pointer;

            padding: 13px 21px;

            border-radius: 11px;

            background: #2563eb;

            color: white;

            font-size: 13px;

            font-weight: bold;

            box-shadow:
                0 8px 18px rgba(37,99,235,0.22);

            transition: 0.2s;
        }

        .btn-save:hover {
            background: #1d4ed8;

            transform: translateY(-2px);

            box-shadow:
                0 11px 22px rgba(37,99,235,0.28);
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 700px) {

            .page-container {
                width: 94%;
                margin: 25px auto;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .header-left h1 {
                font-size: 30px;
            }

            .form-card {
                padding: 23px;
                border-radius: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .full {
                grid-column: auto;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn-cancel,
            .btn-save {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="page-container">

    {{-- =========================
         HEADER
    ========================== --}}

    <div class="page-header">

        <div class="header-left">

            <div class="small-title">
                LIBRARY MANAGEMENT
            </div>

            <h1>
                Edit Buku
            </h1>

            <p>
                Perbarui informasi buku yang sudah tersimpan.
            </p>

        </div>


        <a
            href="{{ route('books.index') }}"
            class="btn-back"
        >
            ← Kembali
        </a>

    </div>


    {{-- =========================
         FORM CARD
    ========================== --}}

    <div class="form-card">


        {{-- INFO BUKU --}}

        <div class="book-info">

            <div class="book-icon">
                📚
            </div>

            <div class="book-info-text">

                <div class="book-info-label">
                    Sedang mengedit
                </div>

                <div class="book-info-title">
                    {{ $book->judul }}
                </div>

            </div>

            <div class="book-id">
                ID #{{ $book->id }}
            </div>

        </div>


        {{-- ERROR VALIDATION --}}

        @if ($errors->any())

            <div class="error-box">

                <strong>
                    Periksa kembali data yang dimasukkan:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- JUDUL SECTION --}}

        <div class="section-title">
            Informasi Buku
        </div>

        <div class="section-description">
            Ubah data buku sesuai dengan informasi terbaru.
        </div>


        {{-- FORM --}}

        <form
            action="{{ route('books.update', $book->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="form-grid">


                {{-- JUDUL --}}

                <div class="form-group full">

                    <label for="judul">
                        Judul Buku <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul', $book->judul) }}"
                        placeholder="Masukkan judul buku"
                        required
                    >

                    <div class="input-hint">
                        Masukkan judul lengkap buku.
                    </div>

                </div>


                {{-- PENULIS --}}

                <div class="form-group">

                    <label for="penulis">
                        Penulis <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="penulis"
                        name="penulis"
                        value="{{ old('penulis', $book->penulis) }}"
                        placeholder="Nama penulis"
                        required
                    >

                </div>


                {{-- TAHUN --}}

                <div class="form-group">

                    <label for="tahun_terbit">
                        Tahun Terbit <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="tahun_terbit"
                        name="tahun_terbit"
                        value="{{ old('tahun_terbit', $book->tahun_terbit) }}"
                        placeholder="Contoh: 2024"
                        min="1000"
                        max="{{ date('Y') }}"
                        required
                    >

                </div>


                {{-- STOK --}}

                <div class="form-group">

                    <label for="stok">
                        Stok Buku <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', $book->stok) }}"
                        placeholder="Jumlah stok"
                        min="0"
                        required
                    >

                </div>


                {{-- KATEGORI --}}

                <div class="form-group">

                    <label for="category_id">
                        Kategori <span class="required">*</span>
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                        required
                    >

                        <option value="">
                            Pilih kategori
                        </option>

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                    <div class="input-hint">
                        Pilih kategori yang sesuai dengan buku.
                    </div>

                </div>

            </div>


            {{-- DIVIDER --}}

            <div class="divider"></div>


            {{-- BUTTON --}}

            <div class="form-actions">

                <a
                    href="{{ route('books.index') }}"
                    class="btn-cancel"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn-save"
                >
                    ✓ Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>